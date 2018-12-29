             
$(document).ready(function() {
    $.preloadImages = function() {
      for (var i = 0; i < arguments.length; i++) {
        $("<img />").attr("src", arguments[i]);
      }
    }

    $.preloadImages("public/images/links/Habout.png",
                    "public/images/links/Hdownload.png",
                    "public/images/links/Hforum.png",
                    "public/images/links/Hhome.png",
                    "public/images/links/Hwiki.png");
                  
});