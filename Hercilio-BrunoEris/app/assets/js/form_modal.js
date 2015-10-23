$('#submitModal').on('click', function (e) {
    $('#atualizarDados').modal('hide');
})

$('#atualizarDados').on('hidden.bs.modal', function (e) {
    $("#content").load("profile.php");
})

$('#atualizarFoto').on('closed.bs.alert', function () {
    $("#content").load("profile.php");
})
