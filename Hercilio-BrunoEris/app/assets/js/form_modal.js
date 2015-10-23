// Update Form Modal
$('#submitUpdateForm').on('click', function (e) {
    $('#atualizarDados').modal('hide');
})

$('#atualizarDados').on('hidden.bs.modal', function (e) {
    $("#content").load("profile.php");
})

// New Product Modal
$('#submitNewProduct').on('click', function (e) {
    $('#newProduct').modal('hide');
})
