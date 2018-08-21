<?php 

session_start();
/* preview of post */

/* receiving data from session */
$preview = $_SESSION['preview'];

/* include css */
echo "
    <link rel='stylesheet' type='text/css' media='screen' href='styles.css' />
";

/* showing the preview */
echo $preview;


?>