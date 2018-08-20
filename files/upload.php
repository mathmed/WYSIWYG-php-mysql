<?php 

include "../database/connection.php";

/* checking the media type the file will handle */

$media = $_POST['media'];
$url = $media . "/";

$qt = count(isset($_FILES[$media]['name']) ? $_FILES[$media]['name'] : 0);
$upadas = array();
$val = array();

for($i = 0; $i < $qt; $i++) {

	$nameFile=isset($_FILES[$media]['name'][$i])?$_FILES[$media]['name'][$i]:null;
	$tempName=isset($_FILES[$media]['tmp_name'][$i])?$_FILES[$media]['tmp_name'][$i]:null;
	
	$route=$url.$nameFile;

	move_uploaded_file($tempName,$route);
	
	$uploaded[$i]=array("caption"=>"$nameFile","height"=>"120px","url"=>"files/del.php?media=$media","key"=>$nameFile);

	/* verify what is the media type */

	if($media == "images")
		$html[$i]="<img height='120px'  src='files/images/$nameFile' class='file-preview-image'>";

	else if($media == "videos")
		$html[$i]="<video src = 'files/videos/$nameFile' class = 'demo' controls> <source src = 'files/videos/$nameFile' type = 'video/mp4' class='file-preview-video'> </video>";
	else
		$html[$i]="<object data='files/pdfs/$nameFile' type='application/pdf' width='100%' height='100%'></object>";

	/* val to query */

	$file_src = ["param" => $route, "type" => PDO::PARAM_STR];
	$file_type = ["param" => $media, "type" => PDO::PARAM_STR];
	
	array_push($val, $file_src);
	array_push($val, $file_type);
}


/* initiating the connection to the connection class */
$connection = new Connection();
$connection->insert("files", "(file_src, file_type)", $val, "", "(?,?)");

$arr = array("file_id" => 0,"overwriteInitial" => true,"initialPreviewConfig" => $uploaded, "initialPreview" => $html);
echo json_encode($arr);

?>

	
