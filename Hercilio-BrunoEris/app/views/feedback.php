<?php
switch (@$_GET["status"]){
    case '6c6f676f7574': //logout
        echo '
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Sessão encerrada com sucesso.
        </div>';
        break;
    case '77726f6e6720757365726e616d65206f722070617373776f7264': //wrong username or password
        echo '
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Atenção!</strong> Dados de acesso incorretos.
        </div>';
        break;
    case '6e6f7420666f756e64': //not found
        echo '
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Nenhum cadastro encontrado.
        </div>';
        break;
    case '73746d74': //Error Statement
        echo '
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            '.$errorSTMT.'
        </div>';
        break;
    case '7369676e75702073756363657373': //Signup Success
        echo '
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Cadastro efetuado com sucesso.
        </div>';
        break;
    case '70617373776f72647320646f6e2774206d61746368': //passwords don't match
        echo '
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Confirmação de senha não confere com a senha digitada.
        </div>';
        break;
    case '6d696e6c656e6774682070617373776f7264': //minlength password
        echo '
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            A senha deve ter no mínimo seis dígitos.
        </div>';
        break;
    case '70686f6e65206d7573742068617665206f6e6c79206e756d62657273': //phone must have only numbers
        echo '
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Telefone deve conter apenas números.
        </div>';
        break;
    case '6572726f722070686f6e65206c656e677468': //error phone length
        echo '
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Telefone precisa ter entre 10 e 11 dígitos (com DDD).
        </div>';
        break;
    case '696e76616c696420656d61696c': //invalid email
        echo '
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            O e-mail digitado ('.$_email.') foi considerado inválido.
        </div>';
        break;
    case '696e76616c6964206e616d65': //invalid name
        echo '
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            O nome deve conter apenas letras, números e espaços.
        </div>';
        break;
    case '696e76616c696420636e706a206c656e677468': //invalid cnpj length
        echo '
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            O CNPJ deve conter 14 caracteres.
        </div>';
        break;
    case '696e76616c696420636e706a20666f726d6174': //invalid cnpj format
        echo '
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            O CNPJ deve conter apenas números, sem caracteres especiais.
        </div>';
        break;
    default:
        break;
}
//session_unset(@$_SESSION['status']);
 ?>
