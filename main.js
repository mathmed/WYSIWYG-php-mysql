
/* jQuery controller */

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

    $(".select-file").click(function(){
        console.log("testando")
    })

})
