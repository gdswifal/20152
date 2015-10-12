<?php
switch (@$_GET["status"]){
    case '6c6f676f7574':
        echo '
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Sessão encerrada com sucesso.
        </div>';
        break;
    case '77726f6e6720757365726e616d65206f722070617373776f7264':
        echo '
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Atenção!</strong> Dados de acesso incorretos.
        </div>';
        break;
    case '6e6f7420666f756e64':
        echo '
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Nenhum cadastro encontrado.
        </div>';
        break;
    default:
        break;
}
//session_unset(@$_SESSION['status']);
 ?>
