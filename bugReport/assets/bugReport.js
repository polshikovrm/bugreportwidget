'use strict';
(function () {
    $(document).keydown(function (e) {
        var bugReport = $('#bugReport');
        if (e.ctrlKey && e.keyCode == 13) {
            bugReport.modal('show');
            var text = document.getSelection().toString();
            if (text) {
                text = '"' + text + '"';
            }
            bugReport.find('#bugreport-description').val(text);
        }
        if(e.keyCode == 27){
            bugReport.modal('hide');
        }
    });
})(jQuery);