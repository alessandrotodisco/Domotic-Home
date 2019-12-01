/* C Socket Server - By
   Amedeo Arch <ingamedeo[at]gmail[dot]com 
   Alessandro Todisco <todisco.ale[at]gmail[dot]com
*/

#include <stdio.h>
#include <stdlib.h>
#include <errno.h>
#include <string.h>
#include <sys/types.h>
#include <sys/socket.h>
#include <sys/un.h>
#include <errno.h>
#include <termios.h>
#include <unistd.h>
#include <fcntl.h>
#include <time.h>

#define SOCK_PATH "/tmp/socket.sock"
#define MAX_CONN 5
#define t_req 1 //Time needed for the next request.

char *portname = "/dev/ttyACM0";
int check=0;
int set_interface_attribs (int fd, int speed, int parity) {
   struct termios tty;
   memset (&tty, 0, sizeof tty);
   if (tcgetattr (fd, &tty) != 0) {
      printf("error %d from tcgetattr", errno);
      return -1;
   }

   cfsetospeed (&tty, speed);
   cfsetispeed (&tty, speed);

   tty.c_cflag = (tty.c_cflag & ~CSIZE) | CS8;     // 8-bit chars
   // disable IGNBRK for mismatched speed tests; otherwise receive break
   // as \000 chars
   tty.c_iflag &= ~IGNBRK;         // disable break processing
   tty.c_lflag = 0;                // no signaling chars, no echo,
                                  // no canonical processing
   tty.c_oflag = 0;                // no remapping, no delays
   tty.c_cc[VMIN]  = 0;            // read doesn't block
   tty.c_cc[VTIME] = 5;            // 0.5 seconds read timeout

   tty.c_iflag &= ~(IXON | IXOFF | IXANY); // shut off xon/xoff ctrl

   tty.c_cflag |= (CLOCAL | CREAD);// ignore modem controls,
                                  // enable reading
   tty.c_cflag &= ~(PARENB | PARODD);      // shut off parity
   tty.c_cflag |= parity;
   tty.c_cflag &= ~CSTOPB;
   tty.c_cflag &= ~CRTSCTS;

   if (tcsetattr (fd, TCSANOW, &tty) != 0) {
      printf ("error %d from tcsetattr", errno);
      return -1;
   }
   return 0;
}

void set_blocking (int fd, int should_block) {
   struct termios tty;
   memset (&tty, 0, sizeof tty);
   if (tcgetattr (fd, &tty) != 0)
   {
      printf ("error %d from tggetattr", errno);
      return;
   }

   tty.c_cc[VMIN]  = should_block ? 1 : 0;
   tty.c_cc[VTIME] = 5;            // 0.5 seconds read timeout

   if (tcsetattr (fd, TCSANOW, &tty) != 0)
      printf ("error %d setting term attributes", errno);
}

int main(void) {
   int s, s2, t, len;
   struct sockaddr_un local, remote;
   char socketBuffer[4];
   char serialBuffer[65];

   time_t start, end;
   int elapsed;
   time(&start);    // start the timer 

   int fd = open (portname, O_RDWR | O_NOCTTY | O_SYNC);
   if (fd < 0) {
      printf ("Error %d while opening %s: %s", errno, portname, strerror(errno));
      exit(1);
   }

   set_interface_attribs (fd, B9600, 0); //9600 8N1
   set_blocking (fd, 0);

   if ((s = socket(AF_UNIX, SOCK_STREAM, 0)) == -1) { //int socket(int domain, int type, int protocol);
      //Specifying a protocol of 0 causes socket() to use an unspecified default protocol appropriate for the requested socket type.
      perror("Can't open socket, maybe out of space?");
      exit(1);
   }

   local.sun_family = AF_UNIX; //Set socket family to AF_UNIX
   strcpy(local.sun_path, SOCK_PATH);
   unlink(local.sun_path);
   len = strlen(local.sun_path) + sizeof(local.sun_family);
   mode_t umask_ = umask(0000);
   if (bind(s, (struct sockaddr *)&local, len) == -1) { //s is a socket descriptor (nothing more than a simply file descriptor)
      perror("Something went wrong.");
      exit(1);
   }
   umask(umask_);

   if (listen(s, MAX_CONN) == -1) { //Listen on s (Socket Descriptor) for max 5 connections.
      perror("listen");
      exit(1);
   }

   for(;;) { /* Loop, this program is a C daemon */
      int n;

      printf("Waiting for a connection...\n");
      t = sizeof(remote);
      if ((s2 = accept(s, (struct sockaddr *)&remote, &t)) == -1) {
        perror("Can't accept connection.");
        exit(1);
      }
      printf("Connected.\n");

      //////////////////////////////////////////////////////////////////////////////

      time(&end);    //Partial  time 

      elapsed = difftime(end, start);  //Difference btw start and partial

      if(elapsed > t_req) {                            //IT'S TIME TO REQUEST THE DATA
         printf("Reading Arduino status.\n");
         write(fd, "1000\n", 5);                                        //SERIAL WRITE

         //sleep (1);  //Delay needed for Arduino
         //usleep (10*100 + 2*10*1000); //Wait 100uS * 5 + Extra time to read the serial buffer (Arduino is fuckin slow)
    usleep (150000);
         memset(&serialBuffer[0], 0, sizeof(serialBuffer));       //Clean serialBuffer
         int check = read(fd, serialBuffer, sizeof serialBuffer);        //SERIAL READ

         time(&start);  //Reset Timer
      }

      memset(&socketBuffer[0], 0, sizeof(socketBuffer));          //Clean socketBuffer
      n = recv(s2, socketBuffer, sizeof socketBuffer, 0);                   //PHP READ

      if (strstr(socketBuffer, "1000") == NULL) {
         
         if (n < 0) {
           perror("Failed to read local socket?!");
         }

         if (n > 0) {
            
            socketBuffer[4]= '\0';
            printf("Got PHP: %s \r\n", socketBuffer);

            write(fd, socketBuffer, 5);      //SERIAL WRITE
            usleep(15000);
            printf("Got Arduino: %s \r\n", serialBuffer);
         }
      } else {
         //PRINTING ON PHP
         if (send(s2, serialBuffer, strlen(serialBuffer), 0) < 0) {        //PHP WRITE
            perror("send");
         }
      }
      close(s2);   
   } //FOR END
   return 0;
}
