<?php
	include('config/database.php');
	if (isset($_COOKIE['lang'])) {
		$lang = $_COOKIE['lang'];
		if ($lang == "EN") {
			include 'inc/lang/en.php';
		} 
		elseif ($lang == "IT") {
			include 'inc/lang/it.php';
		}
	} else{
		$sql = "SELECT lang FROM users WHERE username='".$login_session."'";
		$s_lang = mysqli_query($conn, $sql);

		$row = mysqli_fetch_assoc($s_lang);
		
		$lang =$row['lang'];

		$c_name = "lang";
		setcookie($c_name, $lang, time() + (86400 * 5), "/"); // 86400 = 1 day
		if ($lang == "EN") {
			include 'inc/lang/en.php';
		} 
		elseif ($lang == "IT") {
			include 'inc/lang/it.php';
		}
	}
?>