$(document).ready(function(){
                $('body').bind("cut copy paste",function(e) {
                    e.preventDefault();
                    alert("You cannot cut/copy/paste.");
                });
            });

            $(document).ready(function () {
                $("body").on("contextmenu",function(e){
                    alert("Right Click Disabled");
                    return false;
                });
            });