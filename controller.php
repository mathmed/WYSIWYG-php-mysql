<?php

/* In this class will be the logic of the application programming */
Class Controller {
    
    /* this function will return the scripts that control media management */
    function script_control_input(){

        /* files directory */
        $directory_imgs = 'files/img/';
        $directory_videos = 'files/video/';
        $directory_pdfs = 'files/pdf/';

        $images = glob($directory_imgs.'*.*');
        $videos = glob($directory_videos.'*.*');
        $pdfs = glob($directory_pdfs.'*.*');

        /* image management */
        echo "
            $('#management_images').fileinput({
                uploadUrl: 'files/upload.php',
                uploadExtraData: {media: 'img'},
                uploadAsync: false,
                minFileCount: 1,
                maxFileCount: 20,
                showUpload: false, 
                showRemove: false,
                initialPreview: [";

                foreach($images as $image){
                    echo "\"<img src='$image' height='120px' width = '120px' class='file-preview-image'>\",";
                }
                echo "
                ],

                initialPreviewConfig:[";
                foreach($images as $image){ 
                    $info=explode('/',$image);
                    $info = $info[2];
                    echo " {caption:'$info',height: '120px', width: '120px', url: 'files/del.php?media=img', key:'$info'},";
                }
                echo "],
                
            }).on('filebatchselected', function(event, files) {
                $('#management_img').fileinput('upload');
            });
        ";
        
        /* video management */
        echo "

            $('#management_videos').fileinput({
                uploadUrl: 'files/upload.php',
                deleteUrl: 'files/del.php',
                uploadExtraData: {media: 'video'},
                uploadAsync: false,
                minFileCount: 1,
                maxFileCount: 20,
                showUpload: false, 
                showRemove: false,
                initialPreview: [";

                foreach($videos as $video){
                    echo "\"<video src = '$video' class = 'demo' controls> <source src = '$video' type = 'video/mp4' class='file-preview-video'></video>\",";
                }

                echo "
                ],

                initialPreviewConfig:[";
                foreach($videos as $video){ 
                    $info=explode('/',$video);
                    $info = $info[2];
                    echo " {caption: '$info',  height: '120px', width: '120px', url: 'files/del.php?media=video', key: '$info'},";
                }
                echo "],
                
            }).on('filebatchselected', function(event, files) {
                $('#management_videos').fileinput('upload');
            });
        ";

        /* Pdf managementt */
        echo "
        $('#management_pdfs').fileinput({
                uploadUrl: 'files/upload.php',
                deleteUrl: 'files/del.php',
                uploadExtraData: {media: 'pdf'},
                uploadAsync: false,
                minFileCount: 1,
                maxFileCount: 20,
                showUpload: false, 
                showRemove: false,
                initialPreview: [";

                foreach($pdfs as $pdf){
                    echo "\"<object data='$pdf' type='application/pdf' width='100%' height='100%'></object>\",";
                }
                echo "],

                initialPreviewConfig:[";

                foreach($pdfs as $pdf){
                    $info = explode("/",$pdf);
                    $info = $info[2];

                   echo " {caption:'$info', height: '120px', width: '120px', url: 'files/del.php?media=pdf', key: '$info'},";
                }

            echo "]

            }).on('filebatchselected', function(event, files) {
                $('#management_pdfs').fileinput('upload');
            });
            
        ";

    }
}



?>