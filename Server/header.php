<!-- Navigation Bar -->
<header>
	<div id="logo">
		<a href="index.php"><img src="img/logo_1.png" class="logo"></a>
	</div>
	<!-- Icon Menu when resized-->
	<?php
		echo "
			<div  id='icon_menu' class='btn-responsive-menu'>
		        <span class='icon-bar'></span>
		        <span class='icon-bar'></span>
		        <span class='icon-bar'></span>
	    	</div>";

    ?>
    <?php
    	echo "
		<script>
			var status_menu = false;
			window.onload = function(){
				icon = document.getElementById('icon_menu');
				menu = document.getElementById('menu');
				
				icon.addEventListener('click', function(){
					status_menu = (status_menu) ? false : true;
					menu.className = (status_menu) ? 'active' : '';
				},false);

				menu.addEventListener('click', function(){
					status_menu = (status_menu) ? false : true;
					menu.className = (status_menu) ? 'active' : '';
				},false);

				menu.className = '';

			}
		</script>
	";
    ?>

	<?php 
			#Navigation Bar for the Home
			echo "
			<!-- Navigation Menu -->
				<ul id='menu' class=''>
				";
				if (($dom==1)||($pro==1)) {
					echo "
					<li><b><a href='home.php#b0'>".$b0."</a></b></li>
					<li><b><a href='home.php#b1'>".$b1."</a></b></li>
					<li><b><a href='home.php#b2'>".$b2."<img id='nav_alert' style='display:none' class='inav_alert' src=''></a></b></li>
					<li><b><a href='home.php#b3'>".$b3."</a></b></li>
					<li><b><a href='home.php#b4'>".$b4."</a></b></li>
					<li><a href='profile.php'>".$l0.", <b id='welcome'>" .$login_session."</b></a></li>
					<li><b id='logout'><a href='logout.php'>".$log_o."</a></b></li>
					";
				} else {
					echo "<li><b id='login'><a href='index.php'>".$l_page."</a></b></li>";
				}
				echo "
				</ul>
			";
	?>
</header>