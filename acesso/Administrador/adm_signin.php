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
                <form id="sign_in" method="POST" action="adm_cliente.php">
                    <div class="msg">Entre para começar sua sessão</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <!-- <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuário" required autofocus> -->
                            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuário">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <!-- <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required> -->
                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">Entrar</button>
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

    <?php include_once '../../Base/_JQuery.php'; ?>

</body>

</html>