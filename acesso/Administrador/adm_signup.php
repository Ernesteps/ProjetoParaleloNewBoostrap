<?php
require_once '../../CTRL/UsuarioCTRL.php';
require_once '../../VO/UsuarioVO.php';

$nome = '';
$cpf = '';
$email = '';
$telefone = '';
$endereco = '';

$ctrl = new UsuarioCTRL();

if (isset($_POST['btn_gravar'])) {

    $ret = $ctrl->VerificarSenhaRepetida($_POST['password'], $_POST['confirmpassword']);

    if ($ret != -3) {

        $vo = new UsuarioVO();

        $vo->setNome($_POST['nome']);
        $vo->setCPF($_POST['CPF']);
        $vo->setEmail($_POST['email']);
        $vo->setTelefone($_POST['telefone']);
        $vo->setEndereco($_POST['endereco']);
        $vo->setSenha($_POST['confirmpassword']);

        $ret = $ctrl->InserirUsuarioCTRL($vo);
    } else {
        $nome = $_POST['nome'];
        $cpf = $_POST['CPF'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <?php require_once '../../Base/_head.php'; ?>
</head>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">Projeto Paralelo</a>
            <small>TCC do Prof. Wladimir</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" action="adm_signup.php">
                    <div class="msg">Registrar um novo Administrador</div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="<?php echo $nome; ?>" required autofocus>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">contacts</i>
                        </span>
                        <div class="form-line">
                            <input class="form-control" name="CPF" id="CPF" placeholder="CPF" maxlength="11" value="<?php echo $cpf; ?>" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">call</i>
                        </span>
                        <div class="form-line">
                            <input class="form-control" name="telefone" id="telefone" placeholder="Telefone" value="<?php echo $telefone; ?>" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">business</i>
                        </span>
                        <div class="form-line">
                            <input class="form-control" name="endereco" id="endereco" placeholder="Endereço" value="<?php echo $endereco; ?>" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" id="password" minlength="6" placeholder="Senha" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" minlength="6" placeholder="Confirmar Senha" required>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" name="btn_gravar" type="submit">Cadastrar</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="adm_signin.php">Já tem cadastro?</a>
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