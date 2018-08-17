<?php 

include "../database/connection.php";

/* checking the media type the file will handle */

$media = $_POST['media'];
$url = $media . "/";


/* initiating the query for insertion into the database */
$query = "INSERT INTO files (src, tipo, descricao) VALUES";

if($media == "img"){

	$qt = count(isset($_FILES['images']['name']) ? $_FILES['images']['name'] : 0);
	$upadas = array();


	for($i = 0; $i < $qt; $i++) {

		$nameFile=isset($_FILES['images']['name'][$i])?$_FILES['images']['name'][$i]:null;
		$tempName=isset($_FILES['images']['tmp_name'][$i])?$_FILES['images']['tmp_name'][$i]:null;
		
		$route=$url.$nameFile;

        /* adding text to the query and moving to the server */
		$query.= " ('../files/img/$nameFile', 'img', 'Imagem'),";
		move_uploaded_file($tempName,$route);
		
		$uploaded[$i]=array("caption"=>"$nameFile","height"=>"120px","url"=>"files/del.php?media=img","key"=>$nameFile);
		$html_img[$i]="<img height='120px'  src='files/img/$nameFile' class='file-preview-image'>";

	}


}else if($media == "video"){

	$qt = count(isset($_FILES['videos']['name']) ? $_FILES['videos']['name'] : 0);
	$uploaded = array();

	/* initiating the query for insertion into the database */

	for($i = 0; $i < $qt; $i++) {

		$nameFile=isset($_FILES['videos']['name'][$i]) ? $_FILES['videos']['name'][$i] : null;
		$tempName=isset($_FILES['videos']['tmp_name'][$i]) ? $_FILES['videos']['tmp_name'][$i] : null;
		
		$route=$url.$nameFile;

		/* adding text to the query and moving to the server */
		$query.= " ('../files/video/$nameFile', 'video', 'Video'),";
		move_uploaded_file($tempName,$route);
		
		$uploaded[$i]=array("caption"=>"$nameFile", "height"=>"120px", "url"=>"files/del.php?media=video", "key"=>$nameFile);
		$html_img[$i]="<video src = 'files/video/$nameFile' class = 'demo' controls> <source src = 'files/video/$nameFile' type = 'video/mp4' class='file-preview-video'> </video>";

	}

}else{

	$qt = count(isset($_FILES['pdfs']['name']) ? $_FILES['pdfs']['name'] : 0);
	$uploaded = array();

	/* initiating the query for insertion into the database */

	for($i = 0; $i < $qt; $i++) {

		$nameFile=isset($_FILES['pdfs']['name'][$i]) ? $_FILES['pdfs']['name'][$i] : null;
		$tempName=isset($_FILES['pdfs']['tmp_name'][$i]) ? $_FILES['pdfs']['tmp_name'][$i] : null;
		
		$route=$url.$nameFile;

		/* adding text to the query and moving to the server */
		$query.= " ('../files/pdf/$nameFile', 'pdf', 'PDF'),";
		move_uploaded_file($tempName,$route);
		
		$uploaded[$i]=array("caption"=>"$nameFile", "height"=>"120px", "url"=>"files/del.php?media=video", "key"=>$nameFile);
		$html_img[$i]="<object data='files/pdf/$nameFile' type='application/pdf' width='100%' height='100%'></object>";

	}
}


$query[-1] = ';';

/* initiating the connection to the connection class */
//$connection = new Connection();
//$connection->insert($query);

$arr = array("file_id" => 0,"overwriteInitial" => true,"initialPreviewConfig" => $uploaded, "initialPreview" => $html_img);
echo json_encode($arr);

?>

	
