<?php

    include "controller.php";
    $controller = new Controller();

?>

<!-- Start of HTML content -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WYSIWYG with PHP, MySQL and jQuery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Including styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/fileinput.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="font-awesome/css/all.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="styles.css" />
    

    <!-- Including JS -->

    <script type = 'text/javascript' src="js/jquery-3.3.1.min.js"></script>
    <script type = 'text/javascript' src="js/popper.js"></script>
    <script type = 'text/javascript' src="js/bootstrap.min.js"></script>
    <script type = 'text/javascript' src="js/fileinput.min.js"></script>
    <script type = 'text/javascript' src="main.js"></script>

    <script type = "text/javascript">

        /* functions responsible for doing media management */

        $(document).ready(function(){
            <?php $controller->script_control_input(); ?>
        });

    </script>
    
    
</head>

<body>

    <!-- Container -->
    <div class = "container">

        <!-- Title -->
        <div class = "title">
            <h1>Example of WYSIWYG with PHP, MySQL and jQuery</h1>
        </div>
        <!-- /Title -->

        <!-- Editor -->
        <div class = "editor">
            <div class = "row panel">
                <button id = "bold" class = "btn icon can-selected"><i class = "fa fa-bold"></i></button>
                <button id = "italic" class = "btn icon can-selected"><i class = "fa fa-italic"></i></button>
                <button id = "underline" class = "btn icon can-selected"><i class = "sublim">U</i></button>
                <button id = "strikeThrough" class = "btn icon can-selected"><i class = "trashed">S</i></button>
                <button id = "7" class = "btn icon font">H1</button>
                <button id = "6" class = "btn icon font">H2</button>
                <button id = "5" class = "btn icon font">H3</button>
                <button id = "4" class = "btn icon font">H4</button>
                
                <div class = "divider"></div>
                <button id = "justifyFull" class = "btn icon align"><i class = "fa fa-align-justify"></i></button>
                <button id = "justifyCenter" class = "btn icon align"><i class = "fa fa-align-center"></i></button>
                <button id = "justifyLeft" class = "btn icon align"><i class = "fa fa-align-left"></i></button>
                <button id = "justifyRight" class = "btn icon align"><i class = "fa fa-align-right"></i></button>

                <div class = "divider"></div>

                <button id = "createLink" class = "btn icon can-selected"><i class = "fa fa-link"></i></button>
                <button type = "button" id = "images"  class = "btn icon open-modal" data-toggle = "modal" data-target = "#modal-img"><i class = "fa fa-image"></i></button>
                <button type = "button" id = "video" class = "btn icon open-modal" data-toggle = "modal" data-target = "#modal-video"><i class = "fa fa-video "></i></button>
                <button type = "button" id = "pdf" class = "btn icon open-modal" data-toggle = "modal" data-target = "#modal-pdf"><i class = "fa fa-file-pdf"></i></button>
                  
            </div>
            <div class = "textarea" contenteditable name = "textarea"></div>

            <div class = "div-button">
                <button class = "btn see"><i class = "fa fa-eye icon-space"></i>See preview</button>
                <button class = "btn add"><i class = "fa fa-check icon-space"></i>Send to database</button>
            </div>
        </div>
        <!-- /Editor -->


    </div>
    <!-- /Container -->

    <!-- image modal -->
    <div class="modal" id = "modal-img" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicione uma imagem</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="management_images" class = "input-modal" name="images[]" type='file' multiple class='file-loading'>        
            </div>
            </div>
        </div>
    </div>
    <!-- /image Modal -->
   
    <!-- video modal -->
    <div class="modal" id = "modal-video" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicione um vídeo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="management_videos" class = "input-modal" name="videos[]" type='file' multiple class='file-loading'>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Adicionar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
    </div>
    <!-- /video Modal -->

    <!-- pdf modal -->
    <div class="modal" id = "modal-pdf" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicione um PDF</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="management_pdfs" class = "input-modal" name="pdfs[]" type='file' multiple class='file-loading'>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Adicionar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
    </div>
    <!-- /pdf Modal -->
</body>



</html>