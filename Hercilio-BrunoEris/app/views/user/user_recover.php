<?php include_once("../../controllers/recover.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pão na Mão</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="../../assets/css/signin.css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="../../assets/plugins/font-awesome/css/font-awesome.min.css">
</head>
<body id="start">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php include_once("../feedback.php"); ?>
                <div class="row">
                    <div class="col-md-4 text-center"></div>
                    <div class="col-md-4 text-center">
                        <h1><i class="fa fa fa-bicycle fa-5x "></i></h1>
                    </div>
                    <div class="col-md-4 text-center"></div>
                </div>
                <h1 class="form-signin-heading text-center text-shadow">Pão na Mão</h1>
                <form class="form-signin text-center" action="" role="form" method="post">
                    <input type="email" name="useremail" class="form-control" placeholder="E-mail" required autofocus>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Solicitar nova senha</button>
                    <a class="btn btn-sm btn-link" href="user_login.php" title="Esqueci a senha">Voltar</a><br><br>
                </form>
            </div>
        </div>
    </div>

    <script src="../../assets/js/jquery-1.11.3.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/alert.js"></script>
</body>
</html>
