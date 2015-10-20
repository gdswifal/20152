<?php
include_once("../../controllers/DBConnect.php");
$pattern_cnpj = '/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/';
$pattern_telephone = '/(\d{2})(\d{4,5})(\d{4})/';
$cnpj = preg_replace($pattern_cnpj, '$1.$2.$3/$4-$5', $_SESSION['cnpj']);
$telephone = preg_replace($pattern_telephone, '($1) $2.$3', $_SESSION['telephone']);
?>
<a class="linkAjax btn btn-default" role="button" data-toggle="modal" data-target="#atualizarDados">Atualizar dados</a>
<img src="../../images/companyLogos/<?php echo $_SESSION['photo'] ?>" alt="<?php echo $_SESSION['name'] ?>">
<h1>Dados cadastrais</h1>
<ul class="list-group">
    <li class="list-group-item"><span class="glyphicon glyphicon-briefcase" aria-hidden=\"true\"></span> <?php echo $_SESSION['name'] ?></li>
    <li class="list-group-item"><span class="glyphicon glyphicon-envelope" aria-hidden=\"true\"></span> <?php echo $_SESSION['email'] ?></li>
    <li class="list-group-item"><span class="glyphicon glyphicon-earphone" aria-hidden=\"true\"></span> <?php echo $telephone ?></li>
    <li class="list-group-item"><span class="glyphicon glyphicon-info-sign" aria-hidden=\"true\"></span> <?php echo $cnpj ?></li>
    <li class="list-group-item"><span class="glyphicon glyphicon-comment" aria-hidden=\"true\"></span> <?php echo ($_SESSION['phrase'] != "")?$_SESSION['phrase']:"<span class=\"label label-info\">Você ainda não definiu uma frase.</span>"; ?></li>
</ul>
<div id="atualizarDados" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalUpdate" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;  </button>
                <h4 class="modal-title" id="modalUpdate">Atualizar dados cadastrais</h4>
            </div>
            <form id="formAjax" action="../../controllers/update.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="comp_id" value="<?php echo $_SESSION['id'] ?>">
                    <div class="form-group" id="half-line">
                        <label for="InputName">Nome da Empresa</label>
                        <input type="text" class="form-control" id="InputName" maxlength="255" name="name" value="<?php echo $_SESSION['name'] ?>">
                    </div>
                    <div class="form-group" id="half-line">
                        <label for="InputTelephone">Telefone</label>
                        <input type="text" class="form-control" id="InputTelephone" maxlength="11" name="telephone" value="<?php echo $_SESSION['telephone'] ?>">
                    </div>
                    <div class="form-group" id="half-line">
                        <label for="InputPhrase">Frase</label>
                        <input type="text" class="form-control" id="InputPhrase" maxlength="45" name="phrase" value="<?php echo $_SESSION['phrase'] ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-6" id="output"></div>
                    <dic class="col-md-6">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <input type="submit" class="btn btn-primary" name="submit" value="Salvar alterações">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="../../assets/js/jquery.form.min.js"></script>
<script src="../../assets/js/form.js"></script>
