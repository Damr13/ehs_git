(function ($) {
    'use strict';

    // Term & Condition Muncul sekali
    var url_string = window.location.href
    var url = new URL(url_string);
    var ehs = url.searchParams.get("ehs");

    var termcond = $("#termcond");
    if(ehs == 1){
        termcond.css("display", "none");
    }else {
        termcond.css("display", "flex");
    }

    // Show Hide Button Term & Condition
    var chkbox = $("#checkterm");
    var termcheck = $("#termcheckbox");
    $("#termcheckbox").on("click", function () {
        for(var i=0;i<termcheck.length;i++){
            if(termcheck[i].checked){
                chkbox.css("display", "block");
            }else {
                chkbox.css("display", "none");
            }
        }
    });

    // Hide Card Terms & Conditions
    var termcond = $("#termcond");
    $("#checkterm").on("click", function () {
      termcond.css("display", "none");
    });

})(jQuery);