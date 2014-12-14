<html>
<head>
	<title>Programos patvirtinimas</title>
	<meta charset="UTF-8">
</head>
<body>
<?php 
	$deadLine = "2014-12-14";
	$data = date("Y-m-d");

	if($data >= $deadLine){
		die("<center><h1> Praleidote terminą. </h1></center>");

	}

	//student variables

	if(strtolower(substr($_POST["StudNum"], 0,1)) == "s" && strlen($_POST["StudNum"]) == 8){
		$studentID = substr($_POST["StudNum"], 1,7);
	}else if(strtolower(substr($_POST["StudNum"], 0,1)) != "s" && strlen($_POST["StudNum"]) == 7){
		$studentID =  $_POST["StudNum"];
	}else{
		die("<center><h1> Netinkamas studento Nr. </h1></center>");
	}
	
	$stCode = $_POST["Code"];
	$studentFileName = $_FILES["theFile"]["name"];
	$file_temp = $_FILES["theFile"]["tmp_name"];


	//Mail variables
	$email = "ernest.rekel@gmail.com";
	$subject = $studentID." Studento programa";
	$message = "Sveiki, ".$studentID." atsiunte savo programą\n\n\n<pre><code>".$stCode."</pre></code>";


	
//*** Uniqid Session ***//
	$strSid = md5(uniqid(time()));

	$headers = "";
	$headers = "From: webmaster@example.com\r\nReply-To: webmaster@example.com"; 

	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Content-Type: multipart/mixed; boundary=\"".$strSid."\"\n\n";
	$headers .= "This is a multi-part message in MIME format.\n";

	$headers .= "--".$strSid."\n";
	$headers .= "Content-type: text/html; charset=utf-8\n";
	$headers .= "Content-Transfer-Encoding: 7bit\n\n";
	$headers .= $message."\n\n";
	
	//*** Attachment ***//
	if($_FILES["theFile"]["name"] != "")
	{
		$strFilesName = $_FILES["theFile"]["name"];
		$strContent = chunk_split(base64_encode(file_get_contents($_FILES["theFile"]["tmp_name"]))); 
		$headers .= "--".$strSid."\n";
		$headers .= "Content-Type: application/octet-stream; name=\"".$strFilesName."\"\n"; 
		$headers .= "Content-Transfer-Encoding: base64\n";
		$headers .= "Content-Disposition: attachment; filename=\"".$strFilesName."\"\n\n";
		$headers .= $strContent."\n\n";
	}

	//allowed file extensions
	$allowed = array('sh','java','bash','cpp','c');

	$file_ext = strtolower(end(explode('.',$studentFileName)));
	$file_name = strtolower(reset(explode('.',$studentFileName)));
	
	if(in_array($file_ext, $allowed) === true){
		$Name_generator = "submits/".$studentID."_".$file_name."_".$data.".".$file_ext;
		move_uploaded_file($file_temp, $Name_generator);
		echo $Name_generator;
		// if (mail($email,$subject,null,$headers)) {
		// 	echo "<center><h1>Darbas priimtas</center></h1>";
		// };
		// try {
		// $handler = new PDO('mysql:host=127.0.0.1;dbname=students','root','password');
		// $handler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		// } catch (PDOException $e) {
		// 	die("<center><h1>Problema su duomenų bazė, Bandykite vėliau.</center></h1>");
		// }
		// $sql = "INSERT INTO submits (studentID,code,data) VALUES(?,?,?)";
		// $prep_query = $handler->prepare($sql);
		// $prep_query->execute(array($studentID,$stCode,$data));
	}else{
		echo "<center><h1> Netinkamas failo formatas </center></h1>";
	}
 ?>
</body>
</html>
