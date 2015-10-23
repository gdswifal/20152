$(document).ready(function() {
var options = {
    target:        '#output',   // target element(s) to be updated with server response
    beforeSubmit:  showRequest,  // pre-submit callback
    success:       showResponse  // post-submit callback
};
$('#formAjax').ajaxForm(options);

var photoSettings = {
    target:        '#outputPhoto',   // target element(s) to be updated with server response
    beforeSubmit:  showRequest,  // pre-submit callback
    success:       showResponse  // post-submit callback
};
$('#formPhoto').ajaxForm(photoSettings);

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
    $('#atualizarFoto').on('closed.bs.alert', function (e) {
        $(location).attr('href',"main.php");
    })
    $('#orderSuccess').on('closed.bs.alert', function (e) {
        $("#content").load("orders.php");
    })
});
