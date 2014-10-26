<?php include "includes/login_check.php"; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="stylesheet" href="style.css" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Flamenco:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Allerta' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<script src="/phpfreechat/client/lib/jquery-1.8.2.min.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="/phpfreechat/client/themes/carbon/jquery.phpfreechat.min.css" />
  <script src="/phpfreechat/client/jquery.phpfreechat.min.js" type="text/javascript"></script>

<script type='text/javascript'>

//	INDEX PAGE NAV TOGGLE
function showpage(thechosenone) {
	$('div[name|="page"]').each(function(index) {
		if ($(this).attr("id") == thechosenone) {
			$(this).fadeIn(300);
		}
		else {
			$(this).fadeOut(000);
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

<!--
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
-->
<title><?php echo $title;?>|Hooktion</title>
<style>

div.pfc-content div.pfc-topic, div.pfc-content div.pfc-footer	{background:none; border:none;}
div.pfc-content div.pfc-footer p.logo {margin:0 100000px 0 0;}
div.pfc-content, 
div.pfc-content div.pfc-messages, 
div.pfc-content div.pfc-messages .messages-group.from-system-message .message, 
div.pfc-content div.pfc-messages .messages-group,
div.pfc-content div.pfc-messages .messages-group .name,
div.pfc-content div.pfc-messages .messages-group .message,
div.pfc-content div.pfc-messages .messages-group .date,
div.pfc-content div.pfc-users,
div.pfc-content div.pfc-users .role-title	{font-family: 'Varela Round', sans-serif; }
div.pfc-content div.pfc-users,
div.pfc-content div.pfc-users .role-title {font-family: 'Varela Round', sans-serif; }
div.pfc-content div.pfc-users, div.pfc-content div.pfc-users .role-title { color:#fcf9f0; border:none;}
div.pfc-content div.pfc-compose textarea, div.pfc-content div.pfc-messages, div.pfc-content div.pfc-users {background:#343434; box-shadow: 0px 3px 5px #1a1a1a inset;}
.logo	{}

</style>

</head>
<body>
	<table class='full'>
		<tr>
			<td valign='top' class='bodycol4 '>
			<?php include "includes/left.php";?>

			</td>
			<td valign='top' class=''>
				<div class='shadow' style='height:100%;'>
					<div class='grey' style='padding-bottom:30px; '>
						<div id="mychat"><span style=''>General Chat</span><a  href="http://www.phpfreechat.net">Creating chat rooms everywhere - phpFreeChat</a></div>
					</div>
				</div>
			
			</td>
			
			
			
		</tr>
	</table>

<script type="text/javascript">
  $('#mychat').phpfreechat({ serverUrl: '/phpfreechat/server' });
</script>

</body>
</html>