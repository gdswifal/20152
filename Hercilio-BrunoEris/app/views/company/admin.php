<?php
include_once("../../controllers/DBConnect.php");
$pattern_cnpj = '/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/';
$pattern_telephone = '/(\d{2})(\d{4,5})(\d{4})/';
$cnpj = preg_replace($pattern_cnpj, '$1.$2.$3/$4-$5', $_SESSION['cnpj']);
$telephone = preg_replace($pattern_telephone, '($1) $2.$3', $_SESSION['telephone']);
?>
<a class="linkAjax btn btn-default" href="update.php" role="button">Atualizar dados</a>
<h1>Dados cadastrais</h1>
<ul class="list-group">
    <li class="list-group-item"><span class="glyphicon glyphicon-briefcase" aria-hidden=\"true\"></span> <?php echo $_SESSION['name'] ?></li>
    <li class="list-group-item"><span class="glyphicon glyphicon-envelope" aria-hidden=\"true\"></span> <?php echo $_SESSION['email'] ?></li>
    <li class="list-group-item"><span class="glyphicon glyphicon-earphone" aria-hidden=\"true\"></span> <?php echo $telephone ?></li>
    <li class="list-group-item"><span class="glyphicon glyphicon-info-sign" aria-hidden=\"true\"></span> <?php echo $cnpj ?></li>
    <li class="list-group-item"><span class="glyphicon glyphicon-comment" aria-hidden=\"true\"></span> <?php echo ($_SESSION['phrase'] != "")?$_SESSION['phrase']:"<span class=\"label label-info\">Você ainda não definiu uma frase.</span>"; ?></li>
</ul>
