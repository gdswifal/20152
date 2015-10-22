<?php
include_once("../../controllers/DBConnect.php");
include_once("../../controllers/session.php");
$telephone = preg_replace('/(\d{2})(\d{4,5})(\d{4})/', '($1) $2.$3', $_SESSION['telephone']);
?>
<div class="row">
    <div class="col-md-2 col-sm-2 col-md-offset-9 col-sm-offset-10 text-right">
        <a class="btn btn-primary btn-block" role="button" data-toggle="modal" data-target="#atualizarDados">Editar</a>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="text-center">
            <img src="../../assets/img/user/<?php echo $_SESSION['photo'] ?>" class="avatar img-circle img-thumbnail" alt="avatar">
        </div>
    </div>
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
        <h3>Informações Pessoais</h3>
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-lg-3 control-label">Nome:</label>
                <div class="col-lg-8">
                    <input class="form-control" value="<?php echo $_SESSION['name'];?>" type="text" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">E-mail:</label>
                <div class="col-lg-8">
                    <input class="form-control" value="<?php echo $_SESSION['email'];?>" type="text" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Telefone:</label>
                <div class="col-lg-8">
                    <input class="form-control" value="<?php echo $telephone;?>" type="text" readonly>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="atualizarDados" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalUpdate" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;  </button>
                <h4 class="modal-title" id="modalUpdate">Dados cadastrais</h4>
            </div>
            <form id="formAjax" action="../../controllers/update.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                    <div class="form-group" id="half-line">
                        <label for="InputName">Nome</label>
                        <input type="text" class="form-control" id="InputName" maxlength="255" name="name" value="<?php echo $_SESSION['name'] ?>">
                    </div>
                    <div class="form-group" id="half-line">
                        <label for="InputTelephone">Telefone</label>
                        <input type="text" class="form-control" id="InputTelephone" maxlength="11" name="telephone" value="<?php echo $_SESSION['telephone'] ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" id="submitModal" class="btn btn-primary" name="submit" value="Salvar alterações">
                </div>
            </form>
        </div>
    </div>
</div>
<script src="../../assets/js/jquery.form.min.js"></script>
<script src="../../assets/js/form.js"></script>
<script src="../../assets/js/form_modal.js"></script>
