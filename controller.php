<?php

/* In this class will be the logic of the application programming */
Class Controller {
    
    /* this function will return the scripts that control media management */
    public function script_control_input(){

        /* files directory */
        $directory_imgs = 'files/images/';
        $directory_videos = 'files/videos/';
        $directory_pdfs = 'files/pdfs/';

        $images = glob($directory_imgs.'*.*');
        $videos = glob($directory_videos.'*.*');
        $pdfs = glob($directory_pdfs.'*.*');

        /* image management */
        echo "
            $('#management_images').fileinput({
                uploadUrl: 'files/upload.php',
                uploadExtraData: {media: 'images'},
                uploadAsync: false,
                minFileCount: 1,
                maxFileCount: 20,
                showUpload: false, 
                showRemove: false,
                initialPreview: [";

                foreach($images as $image){
                    echo "\"<img class = 'imagx' src='$image' height='120px' width = '120px' class='file-preview-image'>\",";
                }
                echo "
                ],

                initialPreviewConfig:[";
                foreach($images as $image){ 
                    $info=explode('/',$image);
                    $info = $info[2];
                    echo " {caption:'$info',height: '120px', width: '120px', url: 'files/del.php?media=images', key:'$info'},";
                }
                echo "],
                
            }).on('filebatchselected', function(event, files) {
                $('#management_images').fileinput('upload');
            });
        ";
        
        /* video management */
        echo "

            $('#management_videos').fileinput({
                uploadUrl: 'files/upload.php',
                deleteUrl: 'files/del.php',
                uploadExtraData: {media: 'videos'},
                uploadAsync: false,
                minFileCount: 1,
                maxFileCount: 20,
                showUpload: false, 
                showRemove: false,
                initialPreview: [";

                foreach($videos as $video){
                    echo "\"<video class = 'video' src = '$video' class = 'demo' controls> <source src = '$video' type = 'video/mp4' class='file-preview-video'></video>\",";
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
                uploadExtraData: {media: 'pdfs'},
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

                   echo " {caption:'$info', height: '120px', width: '120px', url: 'files/del.php?media=pdfs', key: '$info'},";
                }

            echo "]

            }).on('filebatchselected', function(event, files) {
                $('#management_pdfs').fileinput('upload');
            });
            
        ";

    }
}


?>