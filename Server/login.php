<?php
	require ("config/database.php");

	session_start(); // Starting Session
	
	$error=''; // Variable To Store Error Message
	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = $fill_all;
		}
		else{
			// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			// To protect mysqli injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($conn,$username);
			$password = mysqli_real_escape_string($conn,$password);

            $password = md5($password);

			// SQL query to fetch information of registerd users and finds user match.
			$query = mysqli_query($conn,"SELECT * from users where password='$password' AND username='$username'");
			$rows = mysqli_num_rows($query);
			if ($rows == 1) {
				$_SESSION['login_user']=$username; // Initializing Session
				header("location: home.php"); // Redirecting To Other Page
			}else {
				$error = $complete_form;
			}
			mysqli_close($conn); // Closing Connection
		}
	}
?>