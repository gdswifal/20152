$(document).ready(function() {
var options = {
    target:        '#output',   // target element(s) to be updated with server response
    beforeSubmit:  showRequest,  // pre-submit callback
    success:       showResponse  // post-submit callback
};

// bind form using 'ajaxForm'
$('#formAjax').ajaxForm(options);
});
// pre-submit callback
function showRequest(formData, jqForm, options) {
    var queryString = $.param(formData);
    return true;
}

// post-submit callback
function showResponse(responseText, statusText, xhr, $form)  {
}

$(document).ajaxComplete(function(){
    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert").alert('close');
    });
});
