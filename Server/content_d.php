<div id="wrapper">

	<div class="c_box" id="b1">		<!-- LIGHTS -->
		<h3><?php echo $b1;?></h3>
		<a href="home.php#b0"><img class="img_box" style="opacity:0.7;" src="img/box/led_off.png" id="sc1"></a>
		<hr>
		<?php echo $b1_d;?>
		<ul class="flex-container">
			<ul class="flex-item">   <!-- Led 13 -->
				<span><?php echo $b1_r1;?></span>
		        <center><input type="image" id='l1_1' onclick='led_1(this)' src="img/box/middle.png" class="turn"></center>
		        <center><input type="image" id='l2_1' onclick='led_1(this)' src="" style="display:none"; class="turn"></center>
	    	</ul>

		    <ul class="flex-item">   <!-- Led 12 -->
		    	<span><?php echo $b1_r2;?></span>
		        <center><input type="image" id='l1_2' onclick='led_2(this)' src="img/box/middle.png" class="turn"></center>
		        <center><input type="image" id='l2_2' onclick='led_2(this)' src="" style="display:none"; class="turn"></center>
		    </ul>

		    <ul class="flex-item">   <!-- Led 11 -->
		    	<span><?php echo $b1_r3;?></span>
		        <center><input type="image" id='l1_3' onclick='led_3(this)' src="img/box/middle.png" class="turn"></center>
		        <center><input type="image" id='l2_3' onclick='led_3(this)' src="" style="display:none"; class="turn"></center>
		    </ul>


		    <ul class="flex-item">   <!-- Led 10 -->
		    	<span><?php echo $b1_r4;?></span>
		        <center><input type="image" id='l1_4' onclick='led_4(this)' src="img/box/middle.png" class="turn"></center>
		        <center><input type="image" id='l2_4' onclick='led_4(this)' src="" style="display:none"; class="turn"></center>
		    </ul>

		    <ul class="flex-item">   <!-- Led 9 -->
		    	<span><?php echo $b1_r5;?></span>
		        <center><input type="image" id='l1_5' onclick='led_5(this)' src="img/box/middle.png" class="turn"></center>
		        <center><input type="image" id='l2_5' onclick='led_5(this)' src="" style="display:none"; class="turn"></center>
		    </ul>

		    <ul class="flex-item">   <!-- Led 8 -->
		    	<span><?php echo $b1_r6;?></span>
		        <center><input type="image" id='l1_6' onclick='led_6(this)' src="img/box/middle.png" class="turn"></center>
		        <center><input type="image" id='l2_6' onclick='led_6(this)' src="" style="display:none"; class="turn"></center>
		    </ul>
		</ul>
			<hr class="hr_1">
		<ul class="flex-container">
			<ul class="flex-item2">   <!-- ALL OFF -->
				<span><?php echo $b1_r7;?></span>
		        <center><input type="image" id='l1_00' onclick='led_a(this)' src="img/box/middle.png" class="turn"></center>
		        <center><input type="image" id='l2_00' onclick='led_a(this)' src="" style="display:none"; class="turn"></center>
	    	</ul>

		    <ul class="flex-item2">   <!-- AUTO -->
		    	<span><?php echo $b1_r8;?></span>
		        <center><input type="image" id='l1_01' onclick='led_auto(this)' src="img/box/middle.png" class="turn"></center>
		        <center><input type="image" id='l2_01' onclick='led_auto(this)' src="" style="display:none"; class="turn"></center>
		    </ul>
		</ul>
	</div>
	
	<div class="c_box" id="b2">		<!-- ALARM -->
		<h3><?php echo $b2;?></h3>
		<a href="home.php#b0"><img class="img_box" style="opacity:0.7;" src="img/box/unlock.png" id="sc2"></a>
		<hr>
		<?php echo $b2_d;?>
		<ul class="flex-container">
			<ul class="flex-item">   <!-- Status -->
				<span><?php echo $b2_r1;?></span>
		        <center><input type="image" id='a1_1' onclick='alarm_1(this)' src="img/box/middle.png" class="turn"></center>
		        <center><input type="image" id='a2_1' onclick='alarm_1(this)' src="" style="display:none"; class="turn"></center>
	    	</ul>

		    <ul class="flex-item">   <!-- Partial -->
		    	<span><?php echo $b2_r2;?></span>
		        <center><input type="image" id='a1_2' onclick='alarm_2(this)' src="img/box/middle.png" class="turn"></center>
		        <center><input type="image" id='a2_2' onclick='alarm_2(this)' src="" style="display:none"; class="turn"></center>
		    </ul>
		</ul><br>

		<h2><?php echo $b2_s;?></h2>
		<hr class="hr_1">
		
		<h3><?php echo $b2_p;?></h3>	<img id="b3_p" src="" class="value_b0"><br>
		<h3><?php echo $b2_m1;?></h3>	<img id="b3_m1" src="" class="value_b0"><br>
		<h3><?php echo $b2_m2;?></h3>	<img id="b3_m2" src="" class="value_b0"><br>
		<h3><?php echo $b2_m3;?></h3>	<img id="b3_m3" src="" class="value_b0"><br>
	</div>


	<div class="c_box" id="b3">		<!-- IRRIGATION -->
		<h3><?php echo $b3;?></h3>
		<a href="home.php#b0"><img class="img_box" style="opacity:0.7;" src="img/box/irr.png" id="sc3"></a>
		<hr>
		<?php echo $b3_d;?>
		<br>
		<ul class="flex-container">
			<ul class="flex-item">   <!-- Status -->
				<span><?php echo $b3_r1;?></span>
		        <center><input type="image" id='i1_1' onclick='irrigation(this)' src="img/box/middle.png" class="turn"></center>
		        <center><input type="image" id='i2_1' onclick='irrigation(this)' src="" style="display:none"; class="turn"></center>
	    	</ul>

		    <ul class="flex-item">   <!-- Auto?! -->
		    	<span><?php echo $b3_r2;?></span>
		        <center><input type="image" id='i1_2' onclick='' src="img/box/middle.png" class="turn"></center>
		        <center><input type="image" id='i2_2' onclick='' src="" style="display:none"; class="turn"></center>
		    </ul>
		</ul><br>
		<hr class="hr_1">
		<h3><?php echo $b3_h;?>:</h3>	<h3 id="b3_h" class="value_b0">--%</h3>
	</div>

	<div class="c_box" id="b4">		<!-- CONTROL -->
		<h3><?php echo $b4;?></h3>
		<a href="home.php#b0"><img class="img_box" style="opacity:0.7;" src="img/box/gear.png" id="sc4"></a>
		<hr>
		<?php echo $b4_d;?>
		<ul class="flex-container">
			<ul class="flex-item">   <!-- Status FAN -->
				<span><?php echo $b4_r1;?></span>
		        <center><input type="image" id='c1_1' onclick='fan(this)' src="img/box/middle.png" class="turn"></center>
		        <center><input type="image" id='c2_1' onclick='fan(this)' src="" style="display:none"; class="turn"></center>
	    	</ul>

		    <ul class="flex-item">   <!-- Status BOX -->
		    	<span><?php echo $b4_r2;?></span>
		        <center><input type="image" id='c1_2' onclick='gate(this)' src="img/box/middle.png" class="turn"></center>
		        <center><input type="image" id='c2_2' onclick='gate(this)' src="" style="display:none"; class="turn"></center>
		    </ul>
		</ul>
	</div>

	<div class="c_box" id="b0">		<!-- GENERAL -->
		<h3><?php echo $b0;?></h3>
		<a href="home.php#b0"><img class="img_box" src="img/box/home.png" id="sc0"></a>
		<hr>
		<div style="display:flex;">
			<a href="home.php#b1"><img id="light" class="box_nav_bar" style="opacity:0.7;" alt="light" src="img/bar/light_off.png"></a>
			<a href="home.php#b2"><img id="alarm" class="box_nav_bar" style="opacity:0.7;" src="img/bar/unlock.png"></a>
			<a href="home.php#b3"><img id="irr" class="box_nav_bar" style="opacity:0.7;" src="img/bar/irr_off.png"></a>
			<a href="home.php#b4"><img id="gear" class="box_nav_bar" style="opacity:0.7;" src="img/bar/gear.png"></a>
			<a href="profile.php"><img id="profile" class="box_nav_bar" src="img/bar/profile.png"></a>
		</div><br>
		<div>
			<h2><?php echo $b0_s;?></h2>
			<hr class="hr_1">
			
			<h3><?php echo $b0_t;?>:</h3>	<h3 id="b0_t" class="value_b0">--°C</h3><br>
			<h3><?php echo $b0_h;?>:</h3>	<h3 id="b0_h" class="value_b0">--%</h3><br>
			<h3><?php echo $b0_g;?>:</h3>	<h3 id="b0_g" class="value_b0">--</h3><img id="b0_gi" style="width: 35px;" src="" class="value_b0"><br>
		</div>
	</div>
	
</div>