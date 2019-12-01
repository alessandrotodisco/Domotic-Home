<?php
	include('config/session.php');
?>

<!DOCTYPE html>
<html lang='en'>
	<head>
		<?php 
			include 'inc.php';
			$page=$h_page;
			$dom = 1;
			include 'head.php'; 
		?>
	</head>
	<body>
		<div id="container">
			<?php 
				include 'header.php';
			?>
			<div class="cont_nav">
				<div id='content'>
					<?php
						include 'content_d.php';
						include 'content_m.php'; 
					?>
				</div>
			</div>
		</div>
		
			<?php
				//  include '../footer.php'; 
			?>
	</body>
</html>