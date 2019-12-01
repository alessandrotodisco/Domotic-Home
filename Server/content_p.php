<div id="p_nav">
	<div id="p_title">
		<h3><?php echo $p1;?></h3>
		<a href="home.php#b0"><img class="img_box" src="img/box/profile.png"></a>
		<hr>
	</div>
	<div id="pro">
		<div id="p_menu">
			<ul>
				<a href="?page=sum"><li <?php if($box=="sum") echo "class='p_active'";?>><?php echo $p_menu0?></li></a>
				<a href="?page=set"><li <?php if($box=="set") echo "class='p_active'";?>><?php echo $p_menu1?></li></a>
			</ul>
			<!--<hr class="hr_1">-->
		</div>
		<div id="p_cont">
			<?php
				switch ($box) {
					case 'sum':
						echo "
							".$usr.":<br>
							<div id='usr_text'>
								".$login_session."<span class='p_edit_r' onClick='usr()'>".$edit."</span>
							</div>
							<div id='usr_input' style='display:none;'>
								<form action='' method='POST'>
									<input type='text' name='usr' required class='white' placeholder='".$p_input_usr_ph."'>
									<input type='submit' value='".$submit."' class='white_s'>
								</form>
							</div>
							<hr>

							".$psw.":<br>
							<div id='psw_text'>
								********<span class='p_edit_r' onClick='psw()'>".$edit."</span>
							</div>
							<div id='psw_input' style='display:none;'>
								<form action='' method='POST'>
									<input type='password' name='psw' required class='white' placeholder='".$p_input_psw_ph."'>
									<input type='submit' value='".$submit."' class='white_s'>
								</form>
							</div>
							<hr>
							Email:<br>
							<div id='email_text'>
								".$email."<span class='p_edit_r' onClick='email()'>".$edit."</span>
							</div>
							<div id='email_input' style='display:none;'>
								<form action='' method='POST'>
									<input type='email' name='email' required class='white' autocomplete='off' placeholder='".$p_input_em_ph."'>
									<input type='submit' value='".$submit."' class='white_s'>
								</form>
							</div>
									<hr>
							".$lan.":<br>
							<div id='lang_text'>
								".$lang." <span class='p_edit_r' onClick='lan()'>".$edit."</span>
							</div>
							<div id='lang_input' style='display:none;'>
								<form action='' method='POST'>
									<select name='lang'>
										<option disabled selected value=''>[".$p_select."]</option>
										<option value='IT'>Italiano</option>
										<option value='EN'>English</option>
									</select>
									<input type='submit' value='".$submit."' class='white_s'>
								</form>
							</div>
							<hr>

						";
						break;
					case 'set':
						echo "
							".$add_usr.":
							<span class='p_edit_r' id='sp_1' onClick='add_usr()'>".$add."</span>
							<span class='p_edit_r' style='display:none;' id='sp_1_h' onClick='add_usr_h()'>".$hide."</span>
							<hr>
							<div id='add_usr' style='display:none;margin-bottom:5px;'>
							".$error_a."
								<form action='' method='POST'>
					<!-- NEEDED FOR DISABLE AUTOCOMPLETE IN CHROME -->
					<input style='display:none'>
					<input type='password' style='display:none'>
									<label>".$usr.":</label><br>
									<input type='text' name='usr_a' required class='white_r' autocomplete='off' placeholder='".$p_input_usr_ph."'>
									<label>".$psw.":</label><br>
									<input type='password' name='psw_a' required class='white_r' autocomplete='off' placeholder='".$p_input_psw_ph."'>
									Email:<br>
									<input type='email' name='email_a' required class='white_r' autocomplete='off' placeholder='".$p_input_em_ph."'>
									<label>".$lan.":</label><br>
									<select class='white_r'name='lang_a' required>
										<option disabled selected value=''>[".$p_select."]</option>
										<option value='IT'>Italiano</option>
										<option value='EN'>English</option>
									</select>
									<input type='submit' value='".$submit."' class='white_sr'>
								</form>
							</div>
							<br>

							".$rem_usr.":
							<span class='p_edit_r' id='sp_2' onClick='rem_usr()'>".$rem."</span>
							<span class='p_edit_r' style='display:none;' id='sp_2_h' onClick='rem_usr_h()'>".$hide."</span>
							<hr>
							<div id='rem_usr' style='display:none;margin-bottom:5px;'>
							".$error_r."
								<form action='' method='POST'>
									<label>".$usr_r.":</label><br>
									<input type='text' name='usr_r' required class='white_r' placeholder='".$p_input_usr_ph."'>
									<input type='submit' value='".$submit."' class='white_sr'>
								</form>

								".$dis_usr."
								<form action='' method='POST'>
									".$ser_usr."<br>
									<input type='submit' name='s_usr' value='".$submit."' class='white_sr'>
								</form>
							</div>
							<br>

							".$key_m.":
							<span class='p_edit_r' id='sp_3' onClick='key_m()'>".$edit."</span>
							<span class='p_edit_r' style='display:none;' id='sp_3_h' onClick='key_h()'>".$hide."</span>
							<hr>
							<div id='key' style='display:none;margin-bottom:5px;'>
							".$error_k."

								
								    
								<div class='table_css3'> 
									<label>".$keyt_a.":</label><br><br>
									<form action='' method='POST'>
										<table class='noselect'>
										  <thead>
										    <tr>
										      <th>UID</th>
										      <th>Access</th>
										      <th>Last Scan</th>
										    </tr>
										  </thead>
										  <tbody>
											";
											$sql = mysqli_query($conn,"SELECT * from RFID;");
							                $rows = mysqli_num_rows($sql);
											for ($i=1; $i<=$rows; $i++){
												$sql = mysqli_query($conn,"SELECT * from RFID WHERE ID='$i';");
							                	$uid = mysqli_fetch_assoc($sql);
												if($uid["Access"]==1){
													echo "
													<tr class='noselect' >
												      <td><input type='checkbox' disabled name='key_a' id='i".$i."' value=".$uid["UID"]."><label for='i".$i."'> ".$uid["UID"]."</label></td>
												      <td>";
												      if($uid['Access']==0) echo $no;
												      else echo $yes;
												      echo "</td>
												      <td>".$uid['last_scan']."</td>
												    </tr>
												    ";
												} else{
													echo "
													<tr class='noselect' >
												      <td><input type='checkbox' name='key_a' id='i".$i."' value=".$uid["UID"]."><label for='i".$i."'> ".$uid["UID"]."</td></label>
												      <td>";
												      if($uid['Access']==0) echo $no;
												      else echo $yes;
												      echo "</td>
												      <td>".$uid['last_scan']."</td>
												    </tr>
												    ";												
												}
											}
											echo "

										  </tbody>
										</table>
										<br>
										<input type='submit' value='".$submit."' style='float: right;' class='white_sr'>
									</form>
								</div>

								<div class='table_css3'>
									<label>".$keyt_r.":</label><br><br>
									<form action='' method='POST'>
										<table>
										  <thead>
										    <tr>
										      <th>UID</th>
										      <th>Access</th>
										      <th>Last Scan</th>
										    </tr>
										  </thead>
										  <tbody>
											";
											$sql = mysqli_query($conn,"SELECT * from RFID;");
							                $rows = mysqli_num_rows($sql);
											for ($f=1; $f<=$rows; $f++){
												$sql = mysqli_query($conn,"SELECT * from RFID WHERE ID='$f';");
							                	$uid = mysqli_fetch_assoc($sql);
												if($uid["Access"]==0){
													echo "
													<tr class='noselect' >
												      <td><input type='checkbox' disabled name='key_r' id='f".$f."' value=".$uid["UID"]."><label for='f".$f."'> ".$uid["UID"]."</label></td>
												      <td>";
												      if($uid['Access']==0) echo $no;
												      else echo $yes;
												      echo "
												      </td>
												      <td>".$uid['last_scan']."</td>
												    </tr>
												    ";
												} else{
													echo "
													<tr class='noselect' >
												      <td><input type='checkbox' name='key_r' id='f".$f."' value=".$uid["UID"]."><label for='f".$f."'> ".$uid["UID"]."</label></td>
												      <td>";
												      if($uid['Access']==0) echo $no;
												      else echo $yes;
												      echo "</td>
												      <td>".$uid['last_scan']."</td>
												    </tr>
												    ";												
												}
											}
											echo "

										  </tbody>
										</table>
										<br>
										<input type='submit' value='".$submit."' style='float: right;' class='white_sr'>
										<br>
										<br>
									</form>
									<form method='POST' action=''>
										<input type='submit' value='REM' name='rem_k' style='float: right;' class='white_sr'>
									</form>
								</div>
							</div>

						";
						break;
					
					
				}
			?>
		</div>
	</div>
</div>