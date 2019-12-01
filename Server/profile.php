<?php
	include('config/session.php');
	require ('config/database.php');
	include 'inc.php';
	
	$box= 'sum';
	$error_a = "";
	$error_r = "";
	$ser_usr = "";

	if(isset($_GET['page'])){
		$box = $_GET['page'];
	}

	//UPDATE USER NAME
	if (isset($_POST['usr'])) {
		$f_usr = $_POST['usr'];
		$sql = "UPDATE users SET username='".$f_usr."' WHERE username='".$login_session."'";
		mysqli_query($conn, $sql);
		header("Location: logout.php"); // Redirecting To Home Page
	}

	//UPDATE USER PASSWORD 
	if (isset($_POST['psw'])) {
		$f_psw = $_POST['psw'];
		$f_psw = md5($f_psw);
		$sql = "UPDATE users SET password='".$f_psw."' WHERE username='".$login_session."'";
		mysqli_query($conn, $sql);
	}

	//UPDATE USER EMAIL 
	$sql=mysqli_query($conn, "SELECT email FROM users WHERE username='$user_check'");
	$row = mysqli_fetch_assoc($sql);
	if (isset($row['email'])) {
		$email = $row['email'];
	} else {
		$email = $fill_all;
	}

	if (isset($_POST['email'])) {
		$f_email = $_POST['email'];
		$sql = "UPDATE users SET email='".$f_email."' WHERE username='".$login_session."'";
		mysqli_query($conn, $sql);
		header("Location: profile.php?page=sum");
	}

	//UPDATE USER LANGUAGE
	$lang= $_COOKIE['lang'];
	if (isset($_POST['lang'])) {
		$f_lang = $_POST['lang'];
		$sql = "UPDATE users SET lang='".$f_lang."' WHERE username='".$login_session."'";
		mysqli_query($conn, $sql);
		$c_name = "lang";
		$c_value = $f_lang;
		setcookie($c_name, $c_value, time() + (86400 * 5), "/"); // 86400 = 1 day
		$lang = $f_lang;
		header("Location: profile.php?page=sum");
	}

	//ADD NEW USER
	if ((isset($_POST['usr_a']))&&(isset($_POST['psw_a']))&&(isset($_POST['email_a']))&&(isset($_POST['lang_a']))) {
		$usr_a = $_POST['usr_a'];
		$psw_a = $_POST['psw_a'];
		$psw_a = md5($psw_a);
		$email_a = $_POST['email_a'];
		$lang_a = $_POST['lang_a'];

		$sql = mysqli_query($conn,"SELECT * from users WHERE username='".$usr_a."'");
		$rows = mysqli_num_rows($sql);
		if ($rows == 0) {
			$sql = "INSERT INTO users (username, password, email, lang, _group) values ( '".$usr_a."', '".$psw_a."', '".$email_a."', '".$lang_a."', '0');";
			mysqli_query($conn,$sql);
			$error_a = $done;
		}
		else{
			$error_a = $not_done;
		}
	} else{
		//$error_a = $ciao;
	}

	//DELETE USER
	if(isset($_POST['usr_r'])){
		$usr_r = $_POST['usr_r'];
		if ($usr_r != $login_session) {
			$sql = mysqli_query($conn,"SELECT * from users WHERE username='".$usr_r."'");
			$rows = mysqli_num_rows($sql);
			if ($rows > 0) {
				$sql = "DELETE FROM users WHERE username='".$usr_r."'";
				mysqli_query($conn,$sql);
				$error_r="Done";
			}
		} else{
			$error_r = $same_usr;
		}
	}
	//DISPLAY USERS
	if(isset($_POST['s_usr'])){
		$sql = mysqli_query($conn,"SELECT username from users");
		$rows = mysqli_num_rows($sql);
		while($rows != 0){
			$rows--;
			$row = mysqli_fetch_assoc($sql);
			$ser_usr = $ser_usr."[".$row['username']."] ";
		}
	}

	//ADD NEW KEY
	if (isset($_POST['key_a'])) {
		$key_a = $_POST['key_a'];

		$sql = mysqli_query($conn,"UPDATE RFID SET Access = 1 WHERE UID = '".$key_a."'");
	}

	//REMOVE A KEY
	if (isset($_POST['key_r'])) {
		$key_r = $_POST['key_r'];

		$sql = mysqli_query($conn,"UPDATE RFID SET Access = 0 WHERE UID = '".$key_r."'");
	}

	//REMOVE ALL KEY
	if (isset($_POST['rem_k'])) {
		$sql = mysqli_query($conn,"DROP TABLE RFID;");
	}
	

?>
<!DOCTYPE html>
<html lang='en'>
	<head>
		<?php 
			$page=$h_page;
			$pro = 1;
			include 'head.php'; 
		?>
		<script>
			$('table tr').each(function(){
			  $(this).find('th').first().addClass('first');
			  $(this).find('th').last().addClass('last');
			  $(this).find('td').first().addClass('first');
			  $(this).find('td').last().addClass('last');
			});

			$('table tr').first().addClass('row-first');
			$('table tr').last().addClass('row-last');
		</script>
	</head>
	<body>
		<div id="container">
			<?php 
				include 'header.php';
			?>
			<div class="cont_nav">
				<?php
					include 'content_p.php';
				?>
			</div>
		</div>
		
			<?php
				//  include '../footer.php'; 
			?>
	</body>
</html>