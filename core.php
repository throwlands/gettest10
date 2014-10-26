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
 <script src="js/simple-slider.js"></script>
 <link rel="stylesheet" href="css/simple-slider.css" type="text/css">
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
//	NOTIFICATION
function showbod(thechosenone) {
	$('div[name|="heads"]').each(function(index) {
		if ($(this).attr("id") == thechosenone) {
			$(this).fadeIn(000);
		}
		else {
			$(this).fadeOut(500);
		}
	});
}
//	CENTER TOGGLE
function showcenter(thechosenone) {
	$('div[name|="center"]').each(function(index) {
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


    function setBox(txt) {
      var thebox=document.getElementById("pfc_words")
      if (thebox) {
        thebox.value = txt
        pfc.doSendMessage()
      }
    }
   
    function createRoom() {
       var x;
   var name=window.prompt("Enter new room name to create:");
   if (name!=null) {
        x=name;
        setBox('/join ' + x);
     }
    }

</script>


<script type="text/javascript" charset="utf-8">
	// get the width of the textarea minus scrollbar
	var textareaWidth = document.getElementById("matches").scrollWidth;

	// width of our wrapper equals width of the inner part of the textarea
	document.getElementById("center").style.width = textareaWidth + 'px';
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
#profile, #stats	{display:none;}
</style>

</head>
<body>

<?php
if($_GET['req'] == 'succ'){
	echo "<div class='blanket' name='heads' style='height:100%; width:100%; position:absolute;  top:0; right:0; background:rgba(20,20,20,.6);z-index:1;'>
			&nbsp;hi
			<div class='headsup' style='width:600px; margin:100px auto;border-radius:8px; background:#333; color:white;'>
				<a href=\"javascript:showbod('clear');\">Clear this</a>
			</div>
		  </div>";
}
?>
	<table class='full' style='height:100%;'>
		<tr>
			<td valign='top' class='bodycol_l headbar' style='position:fixed; ' >
				<div class='navwrap' >
					<a href="javascript:showpage('profile');" class='tile navbutton shadow'>Profile</a>
					<a href="javascript:showcenter('matches');" class='tile navbutton shadow'>Matches</a>
					<a href="javascript:showpage('stats');" class='tile navbutton shadow'>Stats</a>
					<a href="javascript:showpage('inbox');" class='tile navbutton shadow'>Inbox</a>
				</div>
			</td>
			<td valign='top' class='bodycol_m headbar'  >
				<!--<div class='tile shadow' style='padding:5px; position:fixed; '>s</div>-->
			</td>
			<td valign='top' class='bodycol_r headbar' >
				
			</td>
		<tr>		
			<td valign='top' class='bodycol_l '>
			<div style='position:fixed;width:300px;margin-top:30px'>
				<?php include "includes/left.php";?>
			</div>
			</td>
			<td valign='top' class='' style='height:100%; overflow:hidden;' id='center'>
			
				<div class='' style='height:100%;' name='center'>
					<div class='grey shadow' style='min-height:92%;height:92%;padding-bottom:10px;'>
						<!-- <div id="mychat"><span style=''>General Chat</span><a  href="http://www.phpfreechat.net">Creating chat rooms everywhere - phpFreeChat</a></div> -->
					</div>
				</div>
				<div class='' style='display:none;' name='center' id='matches'>
					<div class='grey shadow match_item' style='min-height:80px;height:80px;padding-bottom:10px;'>
					</div>
					<div class='grey shadow match_item' style='min-height:80px;height:80px;padding-bottom:10px;'>
					</div>
					<div class='grey shadow match_item' style='min-height:80px;height:80px;padding-bottom:10px;'>
					</div>
					<div class='grey shadow match_item' style='min-height:80px;height:80px;padding-bottom:10px;'>
					</div>
					<div class='grey shadow match_item' style='min-height:80px;height:80px;padding-bottom:10px;'>
					</div>
					<div class='grey shadow match_item' style='min-height:80px;height:80px;padding-bottom:10px;'>
					</div>
					<div class='grey shadow match_item' style='min-height:80px;height:80px;padding-bottom:10px;'>
					</div>
					<div class='grey shadow match_item' style='min-height:80px;height:80px;padding-bottom:10px;'>
					</div>
					<div class='grey shadow match_item' style='min-height:80px;height:80px;padding-bottom:10px;'>
					</div>
					<div class='grey shadow match_item' style='min-height:80px;height:80px;padding-bottom:10px;'>
					</div>
				</div>
				
			</td>
			<td valign='top' class='bodycol_r'  style='height:100%; position:fixed; '>
				<div class='grey shadow'  style='height:46%;margin-bottom:10px;'>
					
					<div class='tile softpad heading' ><?php echo $_SESSION['username']." - ".$_SESSION['user_id'];?></div>
					<div class='softpad'>
					<?php
						echo "<div class='logo_thumb'>";
						$get_av = mysql_query("SELECT * FROM profile WHERE user_id = '".$_SESSION['user_id']."' ");
						$av_res = mysql_fetch_array($get_av);
						$av_id = $av_res['avatar_id'];
						
						$get_thumb = mysql_query("SELECT * FROM images WHERE image_id = '".$av_id."' ");
						$thumb_res = mysql_fetch_array($get_thumb);
						$thumb = $thumb_res['filename'];
						
						echo 	"<img width='100' src='img/gallery/".$thumb."' alt=''>"; 
						echo "</div>";
					# of views in X period of time
					?>
					</br></br></br></br></br></br></br></br>
					
					</div>
				</div>
				
				<div class='grey shadow'  style='height:46%;'>
					
					<div class='tile softpad heading' >Notifications Feed</div>
					<div class='softpad'>
						<div class='notify_item'>Somebody has been checking you out ;)	</div>
					
					</br></br></br></br></br></br></br></br></br></br></br></br>
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