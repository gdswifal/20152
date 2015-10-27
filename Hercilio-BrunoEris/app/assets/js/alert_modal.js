$(document).on('hidden.bs.modal', "#favorite", function(e){
    $("#content").load("favorites.php");
});
