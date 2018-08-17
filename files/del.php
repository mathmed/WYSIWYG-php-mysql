<?php


/* file to delete media */

include "../database/connection.php";

/* recovering the folder of the file to be deleted */

$url = $_GET['media']."/";

if($_SERVER['REQUEST_METHOD']=="DELETE"){

    parse_str(file_get_contents("php://input"),$datosDELETE);
    $key= $datosDELETE['key'];

    /* starting the query */
    $src = $url.$key;
    $src_query = "../files/".$url.$key;

    $query = "DELETE FROM files WHERE src = '$src_query'";

    /* starting a connection class */
    $connection = new Connection();

    /* running the query and deleting the file */
    unlink($src);
    $connection->execute($query);
    
    echo 0;
}

?>
