
/* DOM controller */

$(document).ready(function(){

    /* function to edit a text */
    $(".can-selected").click(function(){

        /* verify whick command will be executed */
        var command = $(this).attr("id");

        /* verify if selected class exists */
        if ($(this).hasClass("selected")) {
            document.execCommand(command, false, true);
            $(this).removeClass("selected");
        }else{
            document.execCommand(command, false, true);
            $(this).addClass("selected");
        }
    })

    $(".font").click(function(){
        
        /* verify the font size */
        var size = $(this).attr("id");

        if ($(this).hasClass("selected")) {
            document.execCommand("fontSize", false, 3);
            $(this).removeClass("selected");
        }else{
            document.execCommand("fontSize", false, size);
            $(this).addClass("selected");
            
            $(".panel").children().each(function(index, value){
                if($(this).hasClass("font") && $(this).attr("id") != size){
                    $(this).removeClass("selected");
                }
            })
        }
    })

    $(".align").click(function(){
        
        /* verify the command */
        var command = $(this).attr("id");

        if ($(this).hasClass("selected")) {
            document.execCommand(command, false, true);
            $(this).removeClass("selected");
        }else{
            document.execCommand(command, false, true);
            $(this).addClass("selected");
            
            $(".panel").children().each(function(index, value){
                if($(this).hasClass("align") && $(this).attr("id") != command){
                    $(this).removeClass("selected");
                }
            })
        }

    })

    /* function to insert a image into textarea */
    $(document).on("click", ".file-preview-image", function () {
        /* selecting a src of a image */
        var src = $(this).attr("src");
        $(".textarea").append("<br><image class = 'file-textarea' src = '"+src+"'></img><br>");
  
    });

    /* function to insert a video into textarea */
    $(document).on("click", ".demo", function () {
        /* selecting a src of a video */
        var src = $(this).attr("src");
        $(".textarea").append("<br><center><video class = 'file-textarea' controls src = '"+src+"'><source type = 'video/mp4' src ='"+src+"'></source></video></center><br>");
    
    });

    /* function to insert a pdf into textarea */
    $(document).on("click", ".file-preview-frame", function () {
        /* selecting a src of a pdf */
        var id = $(this).attr("id");
        var elem = $("#"+id).find(".pdf");
        if(elem.length){
            var src = $(this).find("object").attr("data");
            $(".textarea").append("<br><center><object data='" +src+ "' type='application/pdf' width='70%' height='400px'></object></center><br>");
        }
    });

    /* function to see a post preview */
    $("#preview").click(function(){
        var post = $(".textarea").html();

        /* starting a ajax requisition */
        $.ajax({
            url: "controller.php",
            method: 'post',
            data: {preview: post, type: 'add_preview'},
            success: function(){
                window.open(
                    "preview.php",
                    '_blank'
                );
            }
        })
    
    })

    /* function to send a post to database */
    $("#send").click(function(){

        var post = $(".textarea").html();
        /* starting a ajax requisition */
        $.ajax({
            url: "controller.php",
            method: 'post',
            data: {preview: post, type: 'insert_post'},
            success: function(data){
                alert(data);
            }      
        })
    
    })

})
