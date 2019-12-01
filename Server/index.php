<?php
	if (isset($_COOKIE['lang'])) {
		$lang = $_COOKIE['lang'];
	}else{
		$lang = "EN";
	}
	
	include('login.php'); // Includes Login Script

	if(isset($_SESSION['login_user'])){
		header("location: home.php");
	}

?>

<!DOCTYPE html>
<html lang='en'>
	<head>
		<?php 
			include 'inc.php';
			$page=$h_page;
			$log = 1;
			include 'head.php'; 
		?>
	</head>
	<body>
		<?php include 'header.php'; ?>
			<div id="space">
			<div id="cont_log">
			    <!-- wraper begin -->
			    <div id="web_log">
					<h3><?php echo $title_app." ".$l_page ?></h3>
					<form action="" method="post">
						<label><?php echo $usr;?>:</label><br>
						<input id="name" name="username" placeholder="Username" type="text" required autocomplete="off">
						<br>
						<label><?php echo $psw;?>:</label><br>
						<input id="password" name="password" placeholder="******" type="password" required autocomplete="off">
						<br>
						<span><?php echo $error; ?></span>
						<br>
						<input class="sub" name="submit" type="submit" value=" Login "><br>
						
					</form>
			    </div>
			</div>
			</div>
	</body>
</html>