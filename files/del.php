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
    $src_query =$url.$key;

    /* val to query */

    $val = [
        "file_src" => ["param" => $src_query, "type" => PDO::PARAM_STR]
    ];

    /* starting a connection class */
    $connection = new Connection();
    $connection->delete("files", $val, "file_src = ?");

    /* running the query and deleting the file */
    unlink($src);
    echo 0;
}

?>
