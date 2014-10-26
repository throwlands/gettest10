<?php

#	NEWPROFILE_PROC.PHP

$user_id = mysql_real_escape_string($_POST['user_id']);


$p1_age = mysql_real_escape_string($_POST['p1_age']);
$p1_ht_ft = mysql_real_escape_string($_POST['p1_ht_ft']);
$p1_ht_in = mysql_real_escape_string($_POST['p1_ht_in']);
$p1_wt = mysql_real_escape_string($_POST['p1_wt']);

$p2_age = mysql_real_escape_string($_POST['p2_age']);
$p2_ht_ft = mysql_real_escape_string($_POST['p2_ht_ft']);
$p2_ht_in = mysql_real_escape_string($_POST['p2_ht_in']);
$p2_wt = mysql_real_escape_string($_POST['p2_wt']);


$interest = $_POST['interest'];




$p1_drink = $_POST['p1_drink'];
$p2_drink = $_POST['p2_drink'];
$drink_other = $_POST['drink_other'];

$p1_smoke = $_POST['p1_smoke'];
$p2_smoke = $_POST['p2_smoke'];
$smoke_other = $_POST['smoke_other'];

$p1_kinsey = $_POST['p1_kinsey'];
$p2_kinsey = $_POST['p2_kinsey'];

		$insert = mysql_query("INSERT INTO profile (user_id, p1_age, p1_ht_ft, p1_ht_in, p1_wt, p2_age, p2_ht_ft, p2_ht_in, p2_wt, p1_drink, p2_drink, drink_other, p1_smoke, p2_smoke, smoke_other, p1_kinsey, p2_kinsey)
								VALUES ('".$user_id."', 
										'".$p1_age."', 
										'".$p1_ht_ft."', 
										'".$p1_ht_in."',
										'".$p1_wt."',
										'".$p2_age."', 
										'".$p2_ht_ft."',
										'".$p2_ht_in."', 
										'".$p2_wt."', 	
										'".$p1_drink."',
										'".$p2_drink."',
										'".$drink_other."',
										'".$p1_smoke."',
										'".$p2_smoke."', 
										'".$smoke_other."', 
										'".$p1_kinsey."',
										'".$p2_kinsey."')");

										
	


							
foreach($interest as $int) {
	if($int == 'M'){
		$insert = mysql_query("UPDATE profile SET i_M = '".$int."' WHERE user_id = '".$user_id."' ");
	}elseif($int == 'F'){
		$insert = mysql_query("UPDATE profile SET i_F = '".$int."' WHERE user_id = '".$user_id."' ");
	}elseif($int == 'MFC'){
		$insert = mysql_query("UPDATE profile SET i_MFC = '".$int."' WHERE user_id = '".$user_id."'  ");
	}elseif($int == 'FFC'){
		$insert = mysql_query("UPDATE profile SET i_FFC = '".$int."' WHERE user_id = '".$user_id."'  ");
	}elseif($int == 'MMC'){
		$insert = mysql_query("UPDATE profile SET i_MMC = '".$int."' WHERE user_id = '".$user_id."'  ");
	}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

##	IF UPLOAD GOES BAD; CREATE NEW PROFILE ANYWAY, THEN KICK TO SECONDARY IMAGE UPLOAD PAGE WITH WARNING

//||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||


$error ='0';
	
	## 	UPLOAD CONDITION
	$allowed_file_types = array('.doc','.docx','.txt','.rtf','.pdf','.xls','.xlsx','.png','.PNG','.jpg','.JPG','.jpeg','.JPEG','.ppt','.pptx','.gif','.GIF');

		$filename = $_FILES["image"]["name"];
		$filename =  str_replace(' ', '_', $filename);
		$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
		$file_ext = substr($filename, strripos($filename, '.')); // get file name
		$filesize = $_FILES["image"]["size"];
		$fs = $filesize;
	 
		if (in_array($file_ext,$allowed_file_types)  &&  ($filesize < 2000000)) {
	 
	##	Rename uploaded file
			$newfilename = md5($file_basename) . $file_ext;
			
			$filename = $user_id."_".$file_basename."_r0". rand(1, 999) . $file_ext;
			
			if (file_exists("img/gallery/" . $filename)) {		
	##	IF EXISTS CHANGE FILENAME $i++; #####################################
			$filename = $filename."_ex0". rand(1, 999) . $file_ext;

			} 		
	## SUCCESS DISPLAY MESSAGE			
				move_uploaded_file($_FILES["image"]["tmp_name"], "img/gallery/" . $filename);
				$location = "img/gallery/" .	$filename;

				$error ='0';
				//echo "<div class='notify' id='success'><img src='img/icons/tick-circle-frame.png' alt='success'> ";
				//echo "SUCCESS!  File uploaded successfully </div>";
				#echo "<br><br>Location: ". $location;
		
		} elseif ($filesize > 2000000) {	
			
	## file size error
			$error = '1';
			$errortype = 'sizetoolarge';
			echo "<div class='notify' id='error'>";
			echo "The file you are trying to upload is too large.";	
			echo "</div> ";
		}elseif($filesize == 0){	
			$error = '1';
			$errortype = 'zerosize';
			echo "<div class='notify' id='error'>";
			echo "Either you failed to upload a file, or the file you did try to upload was larger than 2MB.  Whatever it was, you need to try again.";	
			echo "</div> ";
		} else {	
	## file type error
					
					$error = '1';
					$errortype = 'filetype';
					$notify = "<div class='notify' id='error'>Only these file types are allowed for upload:<br> " . implode(', ',$allowed_file_types)."</div>";
					unlink($_FILES["image"]["tmp_name"]);		
					
		}
	 
	#	IF NO UPLOAD ERRORS PRESENT CREATE NEW RECORD IN DB
	if ($error=='0') {
	

		$file_title = substr($filename, 0, strripos($filename, '.'));
		$size = $filesize / 1000 ;
		$size = substr($size, 0, strripos($size, '.'));
		$size = $size." KB";
		//$datestamp = date("Y-m-d g:iA ",strtotime("now"));
		
		
		$insert = mysql_query("INSERT INTO images (user_id, filename, size, dir)
								VALUES ('".$user_id."', 
										'".$filename."', 
										'".$size."', 
										'img')");
		
		$get_av_id = mysql_query("SELECT * FROM images WHERE filename = '".$filename."' ");
		$av_id = mysql_fetch_array($get_av_id);
		$av_id = $av_id['image_id'];
		
		$assign_image = mysql_query("UPDATE profile SET avatar_id = '".$av_id."' WHERE user_id = '".$user_id."' ");
		
		
		if (mysql_error()){
				$notify = "<div class='notify' id='error'><em>".mysql_error()."</em></div>";
			}else{
			
			
				header("Location:core.php?req=succ&err=".$error."&fs=".$fs."");
			}
	
	
	}else{
		#THESE ARE THINGS TO DO WHEN THE FILE UPLOAD GOES BAD BUT PROFILE IS STILL INSERTED INTO DB
		
		
		
	}

		
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





?>