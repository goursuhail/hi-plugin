console.log(obj.ajaxurl);


(function($){


    $(document).ready(function() {
        $("#ajax-submit").click(function() {
            $.ajax({
                method: "POST",
                url: obj.ajaxurl,
                dataType: "json",
                data:  {
                    no1: jQuery('#abc').val(),
                    no2: jQuery('#def').val(),
                    choose: jQuery('#cal').val(),
                    action: 'hi_calc'
                },
                success: function(result){
                    console.log(result);
                    jQuery('#xyz').val(result);
                }
            });
        });
    });

$(document).ready(function () {

    $("#btn-submit").click(function () {
       $.ajax({
         method: "GET",
           url: obj.ajaxurl,
           dataType: "text",
           data: {
             select: jQuery('#cat').val(),
           }

       });
    });
});



})(jQuery);


