<?php
session_start();
include "includes/dbconnect.php";

if ($_GET['req']=='new'){
	$username = $_POST['username'];
	$pw = $_POST['password'];
	$conf_password = $_POST['conf_password'];
	$zipcode = $_POST['zipcode'];
	$sex = $_POST['sex'];
	
	$get_id = mysql_query("SELECT * FROM user_cred WHERE username = '".$username."'");
	
	#LAST MINUTE CHECK IF USERNAME EXISTS
	if (mysql_num_rows($get_id) == 0){
		$prep = mysql_query("INSERT INTO user_cred SET username = '".$username."', password = '".$pw."', zipcode = '".$zipcode."', sex = '".$sex."' ");
		
	
		$_SESSION['username'] = $username;
		
	}else{
		//$error = 'username is taken';
	}
	
	#GET RESULTANT USER ID AFTER ASSIGNMENT
	$get_id = mysql_query("SELECT uid FROM user_cred WHERE username = '".$username."'");
	$user_id = mysql_fetch_array($get_id);
	$user_id = $user_id['uid'];
	
	if (mysql_error()){
		$notify = "<div class='notify'>".mysql_error()."</div>";
	}else{
		
	}

	
	
}elseif ($_GET['req']=='login'){
	$username = $_POST['username'];
	$pw = $_POST['password'];
	
	$get_details = mysql_query("SELECT * FROM user_cred WHERE username = '".$username."' AND  password = '".$pw."'");
	$det = mysql_fetch_array($get_details);
	$sex = $det['sex'];
	$zipcode = $det['zipcode'];
	
	$_SESSION['username'] = $username;
	
	if( mysql_num_rows($get_details) == 0 ){
		$debug = "fucker";
	}
}elseif ($_GET['req']=='submit'){

	#GET RESULTANT USER ID AFTER ASSIGNMENT
	$get_id = mysql_query("SELECT * FROM user_cred WHERE username = '".$_POST['username']."'");
	$user = mysql_fetch_array($get_id);
	$uid = $user['uid'];
	
	$_SESSION['username'] = $username;
	$_SESSION['user_id'] = $uid;
	
	$user_id = $user['uid'];
	$username = $user['username'];
	$sex = $user['sex'];
	$username = $user['username'];
	
	
  include 'includes/newprofile_proc.php';

}


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="stylesheet" href="style.css" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
 <script src="js/simple-slider.js"></script>
 <link rel="stylesheet" href="css/simple-slider.css" type="text/css">
<script type='text/javascript'>

//	INDEX PAGE NAV TOGGLE
function showpage(thechosenone) {
	$('div[name|="page"]').each(function(index) {
		if ($(this).attr("id") == thechosenone) {
			$(this).slideDown(300);
		}
		else {
			$(this).slideUp(300);
		}
	});
}

//	INDEX PAGE NAV TOGGLE
function showpage(thechosenone) {
	$('div[name|="question"]').each(function(index) {
		if ($(this).attr("id") == thechosenone) {
			$(this).fadeIn(300);
		}
		else {
			$(this).fadeOut(000);
		}
	});
}
</script>
<title></title>
<style>

</style>
</head>
<body>

<?php
echo $debug;

?>

				<div class='shadow center' style='position:relative; top:50px; width:800px;'>
					<div class='tile softpad heading' >Profile Development</div>
					<div class='grey softpad' >
					
						<form ACTION='?req=submit' METHOD='POST'  enctype='multipart/form-data'>
						
						
						
						
							
					
				
							<?php
							
						echo "<input type='hidden' name='user_id' value='".$user_id."'>
								<input type='hidden' name='username' value='".$username."'>
								<input type='hidden' name='sex' value='".$sex."'>";	
								
					#-----------------------------------#
	########################################################################################################################						
					$male = "<div class='' name='question' id='mmc_stat' >
							<div class='link_buffer'>	
								<div class='sunk_wrap split'>
									Take the time to flesh out your details.  You will be much more interesting and attractive to other people with more 
									information in your profile.  We're not going to stop hounding you until fill all this stuff out, so you might as well do it now.
									<br>
								</div>
								<div class='sunk_wrap' style='width:46%; display:inline-block;margin-right:10px;'>
									
									<table style='width:100%'>
										<tr>
										<td>
											What year were you born in?
										</td>
										<td class='right'>
											<select class='in_select med' name='p1_age'>
												<option value=''></option>";
												
											for($y=1996;$y>1929;$y--){
													$male .= "<option value='".$y."'>".$y."</option>";
												}
					$male .= "				</select>
										</td>
										</tr>
										<tr>
										<td>
										Height
										</td>
										<td class='right'>
											<select class='in_select short' name='p1_ht_ft'>
												
												<option value=''>ft</option>
												<option value='3'>3'</option>
												<option value='4'>4'</option>
												<option value='5'>5'</option>
												<option value='6'>6'</option>
												<option value='7'>7'</option>
											</select>
											<select class='in_select short' name='p1_ht_in'>
											
												<option value=''>in</option>
												<option value='0'>0\"</option>
												<option value='1'>1\"</option>
												<option value='2'>2\"</option>
												<option value='3'>3\"</option>
												<option value='4'>4\"</option>
												<option value='5'>5\"</option>
												<option value='6'>6\"</option>
												<option value='7'>7\"</option>
												<option value='8'>8\"</option>
												<option value='9'>9\"</option>
												<option value='10'>10\"</option>
												<option value='11'>11\"</option>
												
											</select>
										</td>
										</tr><tr>
										<td>
											Weight
										</td>
										<td class='right'>
										<input type='text' name='p1_wt' class='in_text short' style='width:103px;'> 
										</td>
										</tr>
										</table>
								</div>
								
							
							</div>&nbsp;
							
							<a href=\"javascript:showpage('image');\" class='next_link' >Next >></a>	
								
							</div>
	<!---------------------><div class='question_wrap' name='question' id='image'>
							
							<div class='link_buffer'>
							
								<div class='sunk_wrap'>
									Please upload an image to use as your avatar.  Keep in mind that you will be making a first impression with the image you choose, make it count.
								</div>
								<div class='sunk_wrap'>
									<input type='file' name='image'> 
								</div>
							</div>
							<a href=\"javascript:showpage('mmc_stat');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('interest');\" class='next_link'>Next >></a>	
							</div>
	<!---------------------><div class='question_wrap' name='question' id='interest'>
							
							<div class='link_buffer'>
							
								<div class='sunk_wrap'>
									Who are you interested in meeting?
								</div>
								<div class='sunk_wrap'>
									<input type='checkbox' name='interest[]' value='M'> Single Men<br>
									<input type='checkbox' name='interest[]' value='F'> Single Women<br>
									<input type='checkbox' name='interest[]' value='MFC'> Male/Female Couples<br>
									<input type='checkbox' name='interest[]' value='FFC'> Female/Female Couples<br>
									<input type='checkbox' name='interest[]' value='MMC'> Male/Male Couples<br>
								</div>
							</div>
							<a href=\"javascript:showpage('image');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_drink');\" class='next_link'>Next >></a>	
							</div>
	<!---------------------><div class='question_wrap' name='question' id='mmc_drink' >
							<div class='link_buffer'>	
								<div class='sunk_wrap'>
									How much do you drink?
								</div>
								<div class='sunk_wrap'>
									
									<input type='radio' name='p1_drink' value='no'> I don't drink at all.<br>
									<input type='radio' name='p1_drink' value='soc'> I drink socially.<br>
									
									<input type='radio' name='p1_drink' value='yes'> I sleep with a bottle of brandy under my pillow.<br>
									
								</div>
							
							</div>
							<a href=\"javascript:showpage('interest');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_other_drink');\" class='next_link' >Next >></a>	
								
							</div>
							
	<!---------------------><div class='question_wrap' name='question' id='mmc_other_drink'>
							<div class='link_buffer'>
								<div class='sunk_wrap'>
									How do you feel about other people drinking?
								</div>
								<div class='sunk_wrap'>
								
									<input type='radio' name='drink_other' value='no'> They're all drunks, We don't like them<br>
									<input type='radio' name='drink_other' value='ambig'> We don't care<br>
									<input type='radio' name='drink_other' value='yes'> We don't trust people who don't drink.<br>
								</div>
								
							</div>
							<a href=\"javascript:showpage('mmc_drink');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_smoke');\" class='next_link'>Next >></a>	
								
							</div>
							
	<!---------------------><div class='question_wrap' name='question' id='mmc_smoke'>
							<div class='link_buffer'>	
								<div class='sunk_wrap'>
									Do you smoke?
								</div>
								<div class='sunk_wrap'>
									
									<input type='radio' name='p1_smoke' value='no'>No.<br>
									<input type='radio' name='p1_smoke' value='yes'>Yes, cough.<br>
									
								</div>
							
							</div>
							<a href=\"javascript:showpage('mmc_other_drink');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_other_smoke');\" class='next_link'>Next >></a>	
								
							</div>
							
	<!---------------------><div class='question_wrap' name='question' id='mmc_other_smoke'>
							<div class='link_buffer'>
								<div class='sunk_wrap'>
									How do you feel about other people smoking?
								</div>
								<div class='sunk_wrap'>
									<input type='radio' name='smoke_other' value='yes'> We prefer to be around other smokers<br>
									<input type='radio' name='smoke_other' value='ambig'> We don't care<br>
									<input type='radio' name='smoke_other' value='no'> Uh, Its fucking gross...<br>
								</div>
								
							</div>
							<a href=\"javascript:showpage('mmc_smoke');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_kinsey');\" class='next_link'>Next >></a>	
								
							</div>
							
	<!---------------------><div class='question_wrap' name='question' id='mmc_kinsey' >
							<div class='link_buffer'>
								<div class='sunk_wrap'>
									Where does your sexuality fall on a scale from 0 (Exclusively Heterosexual) to 6 (Exclusively Homosexual)?
								</div>
								
								<div class='sunk_wrap'>
									
									<input type='text' name='p1_kinsey' data-slider='true' data-slider-range='0,6' data-slider-step='1' data-slider-snap='true' data-slider-highlight='true'><br>
									
								</div>
							</div>
							<a href=\"javascript:showpage('mmc_other_smoke');\" class='prev_link'><< Previous</a>
							<input type='submit' class='in_submit' value='Create Profile'>
							</div>";			
											#-----------------------------------#
	########################################################################################################################						
					$fem = "<div class='' name='question' id='mmc_stat' >
							<div class='link_buffer'>	
								<div class='sunk_wrap split'>
									Take the time to flesh out your details.  You will be much more interesting and attractive to other people with more 
									information in your profile.  We're not going to stop hounding you until fill all this stuff out, so you might as well do it now.
									<br>
								</div>
								
								<div class='sunk_wrap split' style='width:46%; display:inline-block;'>
									
										<table style='width:100%;'>
										<tr>
										<td>
										What year were you born in?
										</td>
										<td class='right'>
										<select class='in_select med' name='p2_age'>
											<option value=''></option>
									";
										for($y=1996;$y>1929;$y--){
											$fem .= "<option value='".$y."'>".$y."</option>";
										}
		
					$fem .= "			</select>
										</td>
										</tr><tr>
										<td>
										Height
										</td>
										</td>
										<td class='right'>									
										<select class='in_select short' name='p2_ht_ft'>
											<option value=''>ft</option>
											<option value='3'>3'</option>
											<option value='4'>4'</option>
											<option value='5'>5'</option>
											<option value='6'>6'</option>
											<option value='7'>7'</option>
										</select>
										<select class='in_select short' name='p2_ht_in'>
										
											<option value=''>in</option>
											<option value='0'>0\"</option>
											<option value='1'>1\"</option>
											<option value='2'>2\"</option>
											<option value='3'>3\"</option>
											<option value='4'>4\"</option>
											<option value='5'>5\"</option>
											<option value='6'>6\"</option>
											<option value='7'>7\"</option>
											<option value='8'>8\"</option>
											<option value='9'>9\"</option>
											<option value='10'>10\"</option>
											<option value='11'>11\"</option>
											
										</select>
										</td>
										</tr><tr>
										<td>
										Weight
										</td>
										<td class='right'>
										<input type='text' name='p2_wt' class='in_text' style='width:103px;'> 
										</td>
										</tr>
									</table>
								</div>
							
							</div>&nbsp;
							
							<a href=\"javascript:showpage('image');\" class='next_link' >Next >></a>	
								
							</div>
	<!---------------------><div class='question_wrap' name='question' id='image'>
							
							<div class='link_buffer'>
							
								<div class='sunk_wrap'>
									Please upload an image to use as your avatar.  Keep in mind that you will be making a first impression with the image you choose, make it count.
								</div>
								<div class='sunk_wrap'>
									<input type='file' name='image'> 
								</div>
							</div>
							<a href=\"javascript:showpage('mmc_stat');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('interest');\" class='next_link'>Next >></a>	
							</div>
	<!---------------------><div class='question_wrap' name='question' id='interest'>
							
							<div class='link_buffer'>
							
								<div class='sunk_wrap'>
									Who are you interested in meeting?
								</div>
								<div class='sunk_wrap'>
									<input type='checkbox' name='interest[]' value='M'> Single Men<br>
									<input type='checkbox' name='interest[]' value='F'> Single Women<br>
									<input type='checkbox' name='interest[]' value='MFC'> Male/Female Couples<br>
									<input type='checkbox' name='interest[]' value='FFC'> Female/Female Couples<br>
									<input type='checkbox' name='interest[]' value='MMC'> Male/Male Couples<br>
								</div>
							</div>
							<a href=\"javascript:showpage('image');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_drink');\" class='next_link'>Next >></a>	
							</div>
	<!---------------------><div class='question_wrap' name='question' id='mmc_drink' >
							<div class='link_buffer'>	
								<div class='sunk_wrap'>
									How much do you drink?
								</div>
								<div class='sunk_wrap'>
									
									
									<input type='radio' name='p2_drink' value='no'> I don't drink at all.<br>
									<input type='radio' name='p2_drink' value='soc'> I drink socially.<br>
									
									<input type='radio' name='p2_drink' value='yes'> I sleep with a bottle of brandy under my pillow.<br>
								</div>
							
							</div>
							<a href=\"javascript:showpage('interest');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_other_drink');\" class='next_link' >Next >></a>	
								
							</div>
							
	<!---------------------><div class='question_wrap' name='question' id='mmc_other_drink'>
							<div class='link_buffer'>
								<div class='sunk_wrap'>
									How do you feel about other people drinking?
								</div>
								<div class='sunk_wrap'>
								
									<input type='radio' name='drink_other' value='no'> They're all drunks, We don't like them<br>
									<input type='radio' name='drink_other' value='ambig'> We don't care<br>
									<input type='radio' name='drink_other' value='yes'> We don't trust people who don't drink.<br>
								</div>
								
							</div>
							<a href=\"javascript:showpage('mmc_drink');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_smoke');\" class='next_link'>Next >></a>	
								
							</div>
							
	<!---------------------><div class='question_wrap' name='question' id='mmc_smoke'>
							<div class='link_buffer'>	
								<div class='sunk_wrap'>
									Do you smoke?
								</div>
								<div class='sunk_wrap'>
									
								
									<input type='radio' name='p2_smoke' value='no'>No.<br>
									<input type='radio' name='p2_smoke' value='yes'>Yes, cough.<br>
								</div>
							
							</div>
							<a href=\"javascript:showpage('mmc_other_drink');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_other_smoke');\" class='next_link'>Next >></a>	
								
							</div>
							
	<!---------------------><div class='question_wrap' name='question' id='mmc_other_smoke'>
							<div class='link_buffer'>
								<div class='sunk_wrap'>
									How do you feel about other people smoking?
								</div>
								<div class='sunk_wrap'>
									<input type='radio' name='smoke_other' value='yes'> We prefer to be around other smokers<br>
									<input type='radio' name='smoke_other' value='ambig'> We don't care<br>
									<input type='radio' name='smoke_other' value='no'> Uh, Its fucking gross...<br>
								</div>
								
							</div>
							<a href=\"javascript:showpage('mmc_smoke');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_kinsey');\" class='next_link'>Next >></a>	
								
							</div>
							
	<!---------------------><div class='question_wrap' name='question' id='mmc_kinsey' >
							<div class='link_buffer'>
								<div class='sunk_wrap'>
									Where does your sexuality fall on a scale from 0 (Exclusively Heterosexual) to 6 (Exclusively Homosexual)?
								</div>
								
								<div class='sunk_wrap'>
									
								
									<input type='text' name='p2_kinsey' data-slider='true' data-slider-range='0,6' data-slider-step='1' data-slider-snap='true' data-slider-highlight='true'><br>
									
								</div>
							</div>
							<a href=\"javascript:showpage('mmc_other_smoke');\" class='prev_link'><< Previous</a>
							<input type='submit' class='in_submit' value='Create Profile'>
							</div>";			
											#-----------------------------------#
	########################################################################################################################						
					$mfc = "<div class='' name='question' id='mmc_stat' >
							<div class='link_buffer'>	
								<div class='sunk_wrap split'>
									Take the time to flesh out your details.  You will be much more interesting and attractive to other people with more 
									information in your profile.  We're not going to stop hounding you until fill all this stuff out, so you might as well do it now.
									<br>
								</div>
								<div class='sunk_wrap' style='width:46%; display:inline-block;margin-right:10px;'>
									<div class='quest_head'>Dude</div><br>
									<table style='width:100%'>
										<tr>
										<td>
											What year were you born in?
										</td>
										<td class='right'>
											<select class='in_select med' name='p1_age'>
												<option value=''></option>";		
												for($y=1996;$y>1929;$y--){
													$mfc .= "<option value='".$y."'>".$y."</option>";
												}
					$mfc .= "				</select>
										</td>
										</tr>
										<tr>
										<td>
										Height
										</td>
										<td class='right'>
											<select class='in_select short' name='p1_ht_ft'>
												
												<option value=''>ft</option>
												<option value='3'>3'</option>
												<option value='4'>4'</option>
												<option value='5'>5'</option>
												<option value='6'>6'</option>
												<option value='7'>7'</option>
											</select>
											<select class='in_select short' name='p1_ht_in'>
											
												<option value=''>in</option>
												<option value='0'>0\"</option>
												<option value='1'>1\"</option>
												<option value='2'>2\"</option>
												<option value='3'>3\"</option>
												<option value='4'>4\"</option>
												<option value='5'>5\"</option>
												<option value='6'>6\"</option>
												<option value='7'>7\"</option>
												<option value='8'>8\"</option>
												<option value='9'>9\"</option>
												<option value='10'>10\"</option>
												<option value='11'>11\"</option>
												
											</select>
										</td>
										</tr><tr>
										<td>
											Weight
										</td>
										<td class='right'>
										<input type='text' name='p1_wt' class='in_text short' style='width:103px;'> 
										</td>
										</tr>
										</table>
								</div>
								<div class='sunk_wrap split' style='width:46%; display:inline-block;'>
									<div class='quest_head'>Chick</div><br>
										<table style='width:100%;'>
										<tr>
										<td>
										What year were you born in?
										</td>
										<td class='right'>
										<select class='in_select med' name='p2_age'>
											<option value=''></option>
									";
										for($y=1996;$y>1929;$y--){
											$mfc .= "<option value='".$y."'>".$y."</option>";
										}
		
					$mfc .= "			</select>
										</td>
										</tr><tr>
										<td>
										Height
										</td>
										</td>
										<td class='right'>									
										<select class='in_select short' name='p2_ht_ft'>
											<option value=''>ft</option>
											<option value='3'>3'</option>
											<option value='4'>4'</option>
											<option value='5'>5'</option>
											<option value='6'>6'</option>
											<option value='7'>7'</option>
										</select>
										<select class='in_select short' name='p2_ht_in'>
										
											<option value=''>in</option>
											<option value='0'>0\"</option>
											<option value='1'>1\"</option>
											<option value='2'>2\"</option>
											<option value='3'>3\"</option>
											<option value='4'>4\"</option>
											<option value='5'>5\"</option>
											<option value='6'>6\"</option>
											<option value='7'>7\"</option>
											<option value='8'>8\"</option>
											<option value='9'>9\"</option>
											<option value='10'>10\"</option>
											<option value='11'>11\"</option>
											
										</select>
										</td>
										</tr><tr>
										<td>
										Weight
										</td>
										<td class='right'>
										<input type='text' name='p2_wt' class='in_text' style='width:103px;'> 
										</td>
										</tr>
									</table>
								</div>
							
							</div>&nbsp;
							
							<a href=\"javascript:showpage('image');\" class='next_link' >Next >></a>	
								
							</div>
	<!---------------------><div class='question_wrap' name='question' id='image'>
							
							<div class='link_buffer'>
							
								<div class='sunk_wrap'>
									Please upload an image to use as your avatar.  Keep in mind that you will be making a first impression with the image you choose, make it count.
								</div>
								<div class='sunk_wrap'>
									<input type='file' name='image'> 
								</div>
							</div>
							<a href=\"javascript:showpage('mmc_stat');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('interest');\" class='next_link'>Next >></a>	
							</div>
	<!---------------------><div class='question_wrap' name='question' id='interest'>
							
							<div class='link_buffer'>
							
								<div class='sunk_wrap'>
									Who are you interested in meeting?
								</div>
								<div class='sunk_wrap'>
									<input type='checkbox' name='interest[]' value='M'> Single Men<br>
									<input type='checkbox' name='interest[]' value='F'> Single Women<br>
									<input type='checkbox' name='interest[]' value='MFC'> Male/Female Couples<br>
									<input type='checkbox' name='interest[]' value='FFC'> Female/Female Couples<br>
									<input type='checkbox' name='interest[]' value='MMC'> Male/Male Couples<br>
								</div>
							</div>
							<a href=\"javascript:showpage('image');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_drink');\" class='next_link'>Next >></a>	
							</div>
	<!---------------------><div class='question_wrap' name='question' id='mmc_drink' >
							<div class='link_buffer'>	
								<div class='sunk_wrap'>
									How much do you drink?
								</div>
								<div class='sunk_wrap'>
									<div class='quest_head'>Dude</div><br>
									<input type='radio' name='p1_drink' value='no'> I don't drink at all.<br>
									<input type='radio' name='p1_drink' value='soc'> I drink socially.<br>
									
									<input type='radio' name='p1_drink' value='yes'> I sleep with a bottle of brandy under my pillow.<br>
									<br><br>
									<div class='quest_head'>Chick</div><br>
									<input type='radio' name='p2_drink' value='no'> I don't drink at all.<br>
									<input type='radio' name='p2_drink' value='soc'> I drink socially.<br>
									
									<input type='radio' name='p2_drink' value='yes'> I sleep with a bottle of brandy under my pillow.<br>
								</div>
							
							</div>
							<a href=\"javascript:showpage('interest');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_other_drink');\" class='next_link' >Next >></a>	
								
							</div>
							
	<!---------------------><div class='question_wrap' name='question' id='mmc_other_drink'>
							<div class='link_buffer'>
								<div class='sunk_wrap'>
									How do you feel about other people drinking?
								</div>
								<div class='sunk_wrap'>
								
									<input type='radio' name='drink_other' value='no'> They're all drunks, We don't like them<br>
									<input type='radio' name='drink_other' value='ambig'> We don't care<br>
									<input type='radio' name='drink_other' value='yes'> We don't trust people who don't drink.<br>
								</div>
								
							</div>
							<a href=\"javascript:showpage('mmc_drink');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_smoke');\" class='next_link'>Next >></a>	
								
							</div>
							
	<!---------------------><div class='question_wrap' name='question' id='mmc_smoke'>
							<div class='link_buffer'>	
								<div class='sunk_wrap'>
									Do you smoke?
								</div>
								<div class='sunk_wrap'>
									<div class='quest_head'>Dude</div><br>
									<input type='radio' name='p1_smoke' value='no'>No.<br>
									<input type='radio' name='p1_smoke' value='yes'>Yes, cough.<br>
									<br><br>
									<div class='quest_head'>Chick</div><br>
									<input type='radio' name='p2_smoke' value='no'>No.<br>
									<input type='radio' name='p2_smoke' value='yes'>Yes, cough.<br>
								</div>
							
							</div>
							<a href=\"javascript:showpage('mmc_other_drink');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_other_smoke');\" class='next_link'>Next >></a>	
								
							</div>
							
	<!---------------------><div class='question_wrap' name='question' id='mmc_other_smoke'>
							<div class='link_buffer'>
								<div class='sunk_wrap'>
									How do you feel about other people smoking?
								</div>
								<div class='sunk_wrap'>
									<input type='radio' name='smoke_other' value='yes'> We prefer to be around other smokers<br>
									<input type='radio' name='smoke_other' value='ambig'> We don't care<br>
									<input type='radio' name='smoke_other' value='no'> Uh, Its fucking gross...<br>
								</div>
								
							</div>
							<a href=\"javascript:showpage('mmc_smoke');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_kinsey');\" class='next_link'>Next >></a>	
								
							</div>
							
	<!---------------------><div class='question_wrap' name='question' id='mmc_kinsey' >
							<div class='link_buffer'>
								<div class='sunk_wrap'>
									Where does your sexuality fall on a scale from 0 (Exclusively Heterosexual) to 6 (Exclusively Homosexual)?
								</div>
								
								<div class='sunk_wrap'>
									<div class='quest_head'>Dude</div><br>
									<input type='text' name='p1_kinsey' data-slider='true' data-slider-range='0,6' data-slider-step='1' data-slider-snap='true' data-slider-highlight='true'><br>
									<br><br>
									<div class='quest_head'>Chick</div><br>
									<input type='text' name='p2_kinsey' data-slider='true' data-slider-range='0,6' data-slider-step='1' data-slider-snap='true' data-slider-highlight='true'><br>
									
								</div>
							</div>
							<a href=\"javascript:showpage('mmc_other_smoke');\" class='prev_link'><< Previous</a>
							<input type='submit' class='in_submit' value='Create Profile'>
							</div>";
							#-----------------------------------#
	########################################################################################################################						
					$ffc = "<div class='' name='question' id='mmc_stat' >
							<div class='link_buffer'>	
								<div class='sunk_wrap split'>
									Take the time to flesh out your details.  You will be much more interesting and attractive to other people with more 
									information in your profile.  We're not going to stop hounding you until fill all this stuff out, so you might as well do it now.
									<br>
								</div>
								<div class='sunk_wrap' style='width:46%; display:inline-block;margin-right:10px;'>
									<div class='quest_head'>Chick #1</div><br>
									<table style='width:100%'>
										<tr>
										<td>
											What year were you born in?
										</td>
										<td class='right'>
											<select class='in_select med' name='p1_age'>
												<option value=''></option>";		
												for($y=1996;$y>1929;$y--){
													$ffc .= "<option value='".$y."'>".$y."</option>";
												}
					$ffc .= "				</select>
										</td>
										</tr>
										<tr>
										<td>
										Height
										</td>
										<td class='right'>
											<select class='in_select short' name='p1_ht_ft'>
												
												<option value=''>ft</option>
												<option value='3'>3'</option>
												<option value='4'>4'</option>
												<option value='5'>5'</option>
												<option value='6'>6'</option>
												<option value='7'>7'</option>
											</select>
											<select class='in_select short' name='p1_ht_in'>
											
												<option value=''>in</option>
												<option value='0'>0\"</option>
												<option value='1'>1\"</option>
												<option value='2'>2\"</option>
												<option value='3'>3\"</option>
												<option value='4'>4\"</option>
												<option value='5'>5\"</option>
												<option value='6'>6\"</option>
												<option value='7'>7\"</option>
												<option value='8'>8\"</option>
												<option value='9'>9\"</option>
												<option value='10'>10\"</option>
												<option value='11'>11\"</option>
												
											</select>
										</td>
										</tr><tr>
										<td>
											Weight
										</td>
										<td class='right'>
										<input type='text' name='p1_wt' class='in_text short' style='width:103px;'> 
										</td>
										</tr>
										</table>
								</div>
								<div class='sunk_wrap split' style='width:46%; display:inline-block;'>
									<div class='quest_head'>Chick #2</div><br>
										<table style='width:100%;'>
										<tr>
										<td>
										What year were you born in?
										</td>
										<td class='right'>
										<select class='in_select med' name='p2_age'>
											<option value=''></option>
									";
										for($y=1996;$y>1929;$y--){
											$ffc .= "<option value='".$y."'>".$y."</option>";
										}
		
					$ffc .= "			</select>
										</td>
										</tr><tr>
										<td>
										Height
										</td>
										</td>
										<td class='right'>									
										<select class='in_select short' name='p2_ht_ft'>
											<option value=''>ft</option>
											<option value='3'>3'</option>
											<option value='4'>4'</option>
											<option value='5'>5'</option>
											<option value='6'>6'</option>
											<option value='7'>7'</option>
										</select>
										<select class='in_select short' name='p2_ht_in'>
										
											<option value=''>in</option>
											<option value='0'>0\"</option>
											<option value='1'>1\"</option>
											<option value='2'>2\"</option>
											<option value='3'>3\"</option>
											<option value='4'>4\"</option>
											<option value='5'>5\"</option>
											<option value='6'>6\"</option>
											<option value='7'>7\"</option>
											<option value='8'>8\"</option>
											<option value='9'>9\"</option>
											<option value='10'>10\"</option>
											<option value='11'>11\"</option>
											
										</select>
										</td>
										</tr><tr>
										<td>
										Weight
										</td>
										<td class='right'>
										<input type='text' name='p2_wt' class='in_text' style='width:103px;'> 
										</td>
										</tr>
									</table>
								</div>
							
							</div>&nbsp;
							
							<a href=\"javascript:showpage('image');\" class='next_link' >Next >></a>	
								
							</div>
	<!---------------------><div class='question_wrap' name='question' id='image'>
							
							<div class='link_buffer'>
							
								<div class='sunk_wrap'>
									Please upload an image to use as your avatar.  Keep in mind that you will be making a first impression with the image you choose, make it count.
								</div>
								<div class='sunk_wrap'>
									<input type='file' name='image'> 
								</div>
							</div>
							<a href=\"javascript:showpage('mmc_stat');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('interest');\" class='next_link'>Next >></a>	
							</div>
	<!---------------------><div class='question_wrap' name='question' id='interest'>
							
							<div class='link_buffer'>
							
								<div class='sunk_wrap'>
									Who are you interested in meeting?
								</div>
								<div class='sunk_wrap'>
									<input type='checkbox' name='interest[]' value='M'> Single Men<br>
									<input type='checkbox' name='interest[]' value='F'> Single Women<br>
									<input type='checkbox' name='interest[]' value='MFC'> Male/Female Couples<br>
									<input type='checkbox' name='interest[]' value='FFC'> Female/Female Couples<br>
									<input type='checkbox' name='interest[]' value='MMC'> Male/Male Couples<br>
								</div>
							</div>
							<a href=\"javascript:showpage('image');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_drink');\" class='next_link'>Next >></a>	
							</div>
	<!---------------------><div class='question_wrap' name='question' id='mmc_drink' >
							<div class='link_buffer'>	
								<div class='sunk_wrap'>
									How much do you drink?
								</div>
								<div class='sunk_wrap'>
									<div class='quest_head'>Chick #1</div><br>
									<input type='radio' name='p1_drink' value='no'> I don't drink at all.<br>
									<input type='radio' name='p1_drink' value='soc'> I drink socially.<br>
									
									<input type='radio' name='p1_drink' value='yes'> I sleep with a bottle of brandy under my pillow.<br>
									<br><br>
									<div class='quest_head'>Chick #2</div><br>
									<input type='radio' name='p2_drink' value='no'> I don't drink at all.<br>
									<input type='radio' name='p2_drink' value='soc'> I drink socially.<br>
									
									<input type='radio' name='p2_drink' value='yes'> I sleep with a bottle of brandy under my pillow.<br>
								</div>
							
							</div>
							<a href=\"javascript:showpage('interest');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_other_drink');\" class='next_link' >Next >></a>	
								
							</div>
							
	<!---------------------><div class='question_wrap' name='question' id='mmc_other_drink'>
							<div class='link_buffer'>
								<div class='sunk_wrap'>
									How do you feel about other people drinking?
								</div>
								<div class='sunk_wrap'>
								
									<input type='radio' name='drink_other' value='no'> They're all drunks, We don't like them<br>
									<input type='radio' name='drink_other' value='ambig'> We don't care<br>
									<input type='radio' name='drink_other' value='yes'> We don't trust people who don't drink.<br>
								</div>
								
							</div>
							<a href=\"javascript:showpage('mmc_drink');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_smoke');\" class='next_link'>Next >></a>	
								
							</div>
							
	<!---------------------><div class='question_wrap' name='question' id='mmc_smoke'>
							<div class='link_buffer'>	
								<div class='sunk_wrap'>
									Do you smoke?
								</div>
								<div class='sunk_wrap'>
									<div class='quest_head'>Chick #1</div><br>
									<input type='radio' name='p1_smoke' value='no'>No.<br>
									<input type='radio' name='p1_smoke' value='yes'>Yes, cough.<br>
									<br><br>
									<div class='quest_head'>Chick #2</div><br>
									<input type='radio' name='p2_smoke' value='no'>No.<br>
									<input type='radio' name='p2_smoke' value='yes'>Yes, cough.<br>
								</div>
							
							</div>
							<a href=\"javascript:showpage('mmc_other_drink');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_other_smoke');\" class='next_link'>Next >></a>	
								
							</div>
							
	<!---------------------><div class='question_wrap' name='question' id='mmc_other_smoke'>
							<div class='link_buffer'>
								<div class='sunk_wrap'>
									How do you feel about other people smoking?
								</div>
								<div class='sunk_wrap'>
									<input type='radio' name='smoke_other' value='yes'> We prefer to be around other smokers<br>
									<input type='radio' name='smoke_other' value='ambig'> We don't care<br>
									<input type='radio' name='smoke_other' value='no'> Uh, Its fucking gross...<br>
								</div>
								
							</div>
							<a href=\"javascript:showpage('mmc_smoke');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_kinsey');\" class='next_link'>Next >></a>	
								
							</div>
							
	<!---------------------><div class='question_wrap' name='question' id='mmc_kinsey' >
							<div class='link_buffer'>
								<div class='sunk_wrap'>
									Where does your sexuality fall on a scale from 0 (Exclusively Heterosexual) to 6 (Exclusively Homosexual)?
								</div>
								
								<div class='sunk_wrap'>
									<div class='quest_head'>Chick #1</div><br>
									<input type='text' name='p1_kinsey' data-slider='true' data-slider-range='0,6' data-slider-step='1' data-slider-snap='true' data-slider-highlight='true'><br>
									<br><br>
									<div class='quest_head'>Chick #2</div><br>
									<input type='text' name='p2_kinsey' data-slider='true' data-slider-range='0,6' data-slider-step='1' data-slider-snap='true' data-slider-highlight='true'><br>
									
								</div>
							</div>
							<a href=\"javascript:showpage('mmc_other_smoke');\" class='prev_link'><< Previous</a>
							<input type='submit' class='in_submit' value='Create Profile'>
							</div>";
							
							#-----------------------------------#
	########################################################################################################################						
					$mmc = "<div class='' name='question' id='mmc_stat' >
							<div class='link_buffer'>	
								<div class='sunk_wrap split'>
									Take the time to flesh out your details.  You will be much more interesting and attractive to other people with more 
									information in your profile.  We're not going to stop hounding you until fill all this stuff out, so you might as well do it now.
									<br>
								</div>
								<div class='sunk_wrap' style='width:46%; display:inline-block;margin-right:10px;'>
									<div class='quest_head'>Dude #1</div><br>
									<table style='width:100%'>
										<tr>
										<td>
											What year were you born in?
										</td>
										<td class='right'>
											<select class='in_select med' name='p1_age'>
												<option value=''></option>";		
												for($y=1996;$y>1929;$y--){
													$mmc .= "<option value='".$y."'>".$y."</option>";
												}
					$mmc .= "				</select>
										</td>
										</tr>
										<tr>
										<td>
										Height
										</td>
										<td class='right'>
											<select class='in_select short' name='p1_ht_ft'>
												
												<option value=''>ft</option>
												<option value='3'>3'</option>
												<option value='4'>4'</option>
												<option value='5'>5'</option>
												<option value='6'>6'</option>
												<option value='7'>7'</option>
											</select>
											<select class='in_select short' name='p1_ht_in'>
											
												<option value=''>in</option>
												<option value='0'>0\"</option>
												<option value='1'>1\"</option>
												<option value='2'>2\"</option>
												<option value='3'>3\"</option>
												<option value='4'>4\"</option>
												<option value='5'>5\"</option>
												<option value='6'>6\"</option>
												<option value='7'>7\"</option>
												<option value='8'>8\"</option>
												<option value='9'>9\"</option>
												<option value='10'>10\"</option>
												<option value='11'>11\"</option>
												
											</select>
										</td>
										</tr><tr>
										<td>
											Weight
										</td>
										<td class='right'>
										<input type='text' name='p1_wt' class='in_text short' style='width:103px;'> 
										</td>
										</tr>
										</table>
								</div>
								<div class='sunk_wrap split' style='width:46%; display:inline-block;'>
									<div class='quest_head'>Dude #2</div><br>
										<table style='width:100%;'>
										<tr>
										<td>
										What year were you born in?
										</td>
										<td class='right'>
										<select class='in_select med' name='p2_age'>
											<option value=''></option>
									";
										for($y=1996;$y>1929;$y--){
											$mmc .= "<option value='".$y."'>".$y."</option>";
										}
		
					$mmc .= "			</select>
										</td>
										</tr><tr>
										<td>
										Height
										</td>
										</td>
										<td class='right'>									
										<select class='in_select short' name='p2_ht_ft'>
											<option value=''>ft</option>
											<option value='3'>3'</option>
											<option value='4'>4'</option>
											<option value='5'>5'</option>
											<option value='6'>6'</option>
											<option value='7'>7'</option>
										</select>
										<select class='in_select short' name='p2_ht_in'>
										
											<option value=''>in</option>
											<option value='0'>0\"</option>
											<option value='1'>1\"</option>
											<option value='2'>2\"</option>
											<option value='3'>3\"</option>
											<option value='4'>4\"</option>
											<option value='5'>5\"</option>
											<option value='6'>6\"</option>
											<option value='7'>7\"</option>
											<option value='8'>8\"</option>
											<option value='9'>9\"</option>
											<option value='10'>10\"</option>
											<option value='11'>11\"</option>
											
										</select>
										</td>
										</tr><tr>
										<td>
										Weight
										</td>
										<td class='right'>
										<input type='text' name='p2_wt' class='in_text' style='width:103px;'> 
										</td>
										</tr>
									</table>
								</div>
							
							</div>&nbsp;
							
							<a href=\"javascript:showpage('image');\" class='next_link' >Next >></a>	
								
							</div>
	<!---------------------><div class='question_wrap' name='question' id='image'>
							
							<div class='link_buffer'>
							
								<div class='sunk_wrap'>
									Please upload an image to use as your avatar.  Keep in mind that you will be making a first impression with the image you choose, make it count.
								</div>
								<div class='sunk_wrap'>
									<input type='file' name='image'> 
								</div>
							</div>
							<a href=\"javascript:showpage('mmc_stat');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('interest');\" class='next_link'>Next >></a>	
							</div>
	<!---------------------><div class='question_wrap' name='question' id='interest'>
							
							<div class='link_buffer'>
							
								<div class='sunk_wrap'>
									Who are you interested in meeting?
								</div>
								<div class='sunk_wrap'>
									<input type='checkbox' name='interest[]' value='M'> Single Men<br>
									<input type='checkbox' name='interest[]' value='F'> Single Women<br>
									<input type='checkbox' name='interest[]' value='MFC'> Male/Female Couples<br>
									<input type='checkbox' name='interest[]' value='FFC'> Female/Female Couples<br>
									<input type='checkbox' name='interest[]' value='MMC'> Male/Male Couples<br>
								</div>
							</div>
							<a href=\"javascript:showpage('image');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_drink');\" class='next_link'>Next >></a>	
							</div>
	<!---------------------><div class='question_wrap' name='question' id='mmc_drink' >
							<div class='link_buffer'>	
								<div class='sunk_wrap'>
									How much do you drink?
								</div>
								<div class='sunk_wrap'>
									<div class='quest_head'>Dude #1</div><br>
									<input type='radio' name='p1_drink' value='no'> I don't drink at all.<br>
									<input type='radio' name='p1_drink' value='soc'> I drink socially.<br>
									
									<input type='radio' name='p1_drink' value='yes'> I sleep with a bottle of brandy under my pillow.<br>
									<br><br>
									<div class='quest_head'>Dude #2</div><br>
									<input type='radio' name='p2_drink' value='no'> I don't drink at all.<br>
									<input type='radio' name='p2_drink' value='soc'> I drink socially.<br>
									
									<input type='radio' name='p2_drink' value='yes'> I sleep with a bottle of brandy under my pillow.<br>
								</div>
							
							</div>
							<a href=\"javascript:showpage('interest');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_other_drink');\" class='next_link' >Next >></a>	
								
							</div>
							
	<!---------------------><div class='question_wrap' name='question' id='mmc_other_drink'>
							<div class='link_buffer'>
								<div class='sunk_wrap'>
									How do you feel about other people drinking?
								</div>
								<div class='sunk_wrap'>
								
									<input type='radio' name='drink_other' value='no'> They're all drunks, We don't like them<br>
									<input type='radio' name='drink_other' value='ambig'> We don't care<br>
									<input type='radio' name='drink_other' value='yes'> We don't trust people who don't drink.<br>
								</div>
								
							</div>
							<a href=\"javascript:showpage('mmc_drink');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_smoke');\" class='next_link'>Next >></a>	
								
							</div>
							
	<!---------------------><div class='question_wrap' name='question' id='mmc_smoke'>
							<div class='link_buffer'>	
								<div class='sunk_wrap'>
									Do you smoke?
								</div>
								<div class='sunk_wrap'>
									<div class='quest_head'>Dude #1</div><br>
									<input type='radio' name='p1_smoke' value='no'>No.<br>
									<input type='radio' name='p1_smoke' value='yes'>Yes, cough.<br>
									<br><br>
									<div class='quest_head'>Dude #2</div><br>
									<input type='radio' name='p2_smoke' value='no'>No.<br>
									<input type='radio' name='p2_smoke' value='yes'>Yes, cough.<br>
								</div>
							
							</div>
							<a href=\"javascript:showpage('mmc_other_drink');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_other_smoke');\" class='next_link'>Next >></a>	
								
							</div>
							
	<!---------------------><div class='question_wrap' name='question' id='mmc_other_smoke'>
							<div class='link_buffer'>
								<div class='sunk_wrap'>
									How do you feel about other people smoking?
								</div>
								<div class='sunk_wrap'>
									<input type='radio' name='smoke_other' value='yes'> We prefer to be around other smokers<br>
									<input type='radio' name='smoke_other' value='ambig'> We don't care<br>
									<input type='radio' name='smoke_other' value='no'> Uh, Its fucking gross...<br>
								</div>
								
							</div>
							<a href=\"javascript:showpage('mmc_smoke');\" class='prev_link'><< Previous</a>
							<a href=\"javascript:showpage('mmc_kinsey');\" class='next_link'>Next >></a>	
								
							</div>
							
	<!---------------------><div class='question_wrap' name='question' id='mmc_kinsey' >
							<div class='link_buffer'>
								<div class='sunk_wrap'>
									Where does your sexuality fall on a scale from 0 (Exclusively Heterosexual) to 6 (Exclusively Homosexual)?
								</div>
								
								<div class='sunk_wrap'>
									<div class='quest_head'>Dude #1</div><br>
									<input type='text' name='p1_kinsey' data-slider='true' data-slider-range='0,6' data-slider-step='1' data-slider-snap='true' data-slider-highlight='true'><br>
									<br><br>
									<div class='quest_head'>Dude #2</div><br>
									<input type='text' name='p2_kinsey' data-slider='true' data-slider-range='0,6' data-slider-step='1' data-slider-snap='true' data-slider-highlight='true'><br>
									
								</div>
							</div>
							<a href=\"javascript:showpage('mmc_other_smoke');\" class='prev_link'><< Previous</a>
							<input type='submit' class='in_submit' value='Create Profile'>
							</div>";
							/*
							
							if($sex == 'M'){
								echo $male;
							}elseif($sex == 'F'){
								echo $female;
							}elseif($sex == 'MFC'){
								echo $mfc;
							}elseif($sex == 'FFC'){
								echo $ffc;
							}elseif($sex == 'MMC'){
								echo $mmc;
							}
							
							*/
							//echo $male."<br>----------------------------------<br>".$female."<br>----------------------------------<br>".$mfc."<br>----------------------------------<br>".$ffc."<br>----------------------------------<br>".$mmc;
							if($errortype){
								//echo "<div style='width:800px; height:200px; margin:100px auto;background:black;'></div>";
							}else{
							
								if ($sex=='M'){
									echo $male;
								}elseif($sex=='F'){
									echo $fem;
								}elseif($sex=='MFC'){
									echo $mfc;
								}elseif($sex=='FFC'){
									echo $ffc;
								}elseif($sex=='MMC'){
									echo $mmc;
								}
								
								
							}
							/*
							while(){
								  echo "<div class='sunk_wrap'>
											".$item['question']."
										</div>
										<div class='sunk_wrap'>
											<input type='radio' name='".$item['question_id']."' value='".$item['answer_1']."'> First answer to question<br>
											<input type='radio' name='".$item['question_id']."' value='".$item['answer_2']."'> 2nd answer to question<br>
											<input type='radio' name='".$item['question_id']."' value='".$item['answer_3']."'> Thirf answer to question <br>
											<input type='radio' name='".$item['question_id']."' value='".$item['answer_4']."'> Forf nswer to question<br>
										</div>";
							}
							*/
							echo "</form>";
							if($errortype){
							
								#ERRORCODE TRANSLATION FOR STATUS MESSAGE; THEN NEW FILE UPLOAD FORM
								
								 	
								echo	"<div class='question_wrap' name='question' id='mmc_kinsey' >
										<div class='link_buffer'>
											<div class='sunk_wrap'>".
											$errortype." - ".$notify."
											</div>
											<div class='sunk_wrap'>
												<form action='?req=image' method='post'  enctype='multipart/form-data'>
													<input type='file' class='in_text' name='test'>
												</form>	
											</div>
										</div>
										<a href=\"javascript:showpage('mmc_other_smoke');\" class='prev_link'><< Previous</a>
										<input type='submit' class='in_submit' value='Create Profile'>
									</div>
									";
							}
							
							?>
						
					</div>
				</div>
				 <script>
  $("[data-slider]")
    .each(function () {
      var input = $(this);
      $("<span>")
        .addClass("output")
        .insertAfter($(this));
    })
    .bind("slider:ready slider:changed", function (event, data) {
      $(this)
        .nextAll(".output:first")
          .html(data.value.toFixed(0));
    });
  </script>
</body>
</html>