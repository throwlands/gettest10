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
<script src="js/gen_validatorv4.js"></script>
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
function showform(thechosenone) {
	$('div[name|="viewer"]').each(function(index) {
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

				<div class='shadow center' style='margin-top:50px;width:800px;'>
					<div class='tile softpad heading' >Hooktion</div>
					<div class='grey softpad' style='height:270px' >
						<table style='width:100%;'>
							<tr>
								<td class='login_left' valign='top' style=''>
								Please <a href="javascript:showpage('existing');" >log in</a> or <a href="javascript:showpage('new');">create an account</a>.
								</td>
								<td class='login_right' valign='top'>
								
									<div class='form_wrap' name='page' id='existing'>
										<form ACTION='login_proc.php?req=login' METHOD='POST' id='log'>
											<span>Username:</span><input type='text' class='in_text' name='username'><br>
											<span>Password:</span><input type='password' class='in_text' name='password'>
											<input type='submit' class='in_submit' value='Log in'>
										</form>
									</div>
									
									
									
									<div class='form_wrap' name='page' id='new' style='display:none;'>
										<form ACTION='newprofile.php?req=new' METHOD='POST' id='new'>
											<span>Username:</span><input type='text' class='in_text' name='username'><br>
											<span>Password:</span><input type='password' class='in_text' name='password'><br>
											<span>Confirm Password:</span><input type='password' class='in_text' name='conf_password'><br>
											<span>Zip Code:</span><input type='text' class='in_text' name='zipcode'><br>
											<span>Sex:</span><select class='in_select' name='sex'>
												<option value='none'></option>
												<option value='M'>Male</option>
												<option value='F'>Female</option>
												<option value='MFC'>MF Couple</option>
												<option value='FFC'>FF Couple</option>
												<option value='MMC'>MM Couple</option>
											</select>
											<input type='submit' class='in_submit' value='Register'>
										</form>
									</div>
									
									
								</td>
							</tr>
						</table>
					</div>
				</div>
		
			
			

<!--
<div class='wrap'>


	<div class='grey forty'>wah</div>
	<div class='yeller hundred'>thi</div>
</div>
-->
<script  type="text/javascript">
 var frmvalidator = new Validator("log");

// frmvalidator.addValidation("username","dontselect=none");
 frmvalidator.addValidation("username","req","Please enter a username");

var frmvalidator2 = new Validator("new");

frmvalidator.addValidation("username","req","Please enter a username");
frmvalidator.addValidation("password","req","Please enter a password");
 frmvalidator2.addValidation("sex","dontselect=none");
 frmvalidator.addValidation("zipcode","req","Please enter a Zipcode");
 
// frmvalidator.addValidation("sex","req","Please enter a username");

 
 </script>

</body>
</html>