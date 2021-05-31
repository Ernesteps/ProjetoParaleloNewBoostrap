<?php
require_once '../../CTRL/UsuarioCTRL.php';

if (isset($_POST['btn_acessar'])) {
    $ctrl = new UsuarioCTRL();

    $cpf = $_POST['CPF'];
    $senha = $_POST['senha'];

    $ret = $ctrl->ValidarLoginCTRL($cpf, $senha);
}
?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once '../../Base/_head.php'; ?>
</head>

<body class="login-page">
    <div class="login-box">

        <div class="logo">
            <a href="javascript:void(0);">Projeto Paralelo</a>
            <small>TCC do Prof. Wladimir</small>
        </div>

        <div class="card">
            <div class="body">

                <form id="sign_in" method="POST" action="adm_signin.php">
                    <div class="msg">Entre para começar sua sessão</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="CPF" id="CPF" placeholder="CPF" required autofocus>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" id="btn_acessar" name="btn_acessar" type="submit">Entrar</button>
                        </div>
                        <div class="align-right">
                            <div class="col-xs-8">
                                <a href="adm_signup.php">Registre Agora!</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php
    require_once '../../Base/_JQuery.php';
    include_once '../../Base/_msg.php';
    ?>

</body>

</html>