$('#submitModal').on('click', function (e) {
    $('#atualizarDados').modal('hide');
})

$('#atualizarDados').on('hidden.bs.modal', function (e) {
    $("#content").load("profile.php");
})
