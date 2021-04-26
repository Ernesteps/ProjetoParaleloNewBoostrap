<?php

require_once '../../CTRL/MudarsenhaCTRL.php';
require_once '../../VO/UsuarioVO.php';

//isset (Se existe) $_POST é vetorial []
if (isset($_POST['btn_gravar'])) {

    $vo = new UsuarioVO();
    $ctrl = new MudarsenhaCTRL();

    $senha = $_POST['Nova_senha'];
    $vo->setSenha($senha);

    $ret = $ctrl->InserirMudarsenhaCTRL($vo);
}

?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once '../../Base/_head.php'; ?>
</head>

<body class="theme-black">

    <?php

        include_once '../../Base/_pageloader.php';
        include_once '../../Base/_topo.php';
        include_once '../../Base/_menu.php';
        include_once '../../Base/_footer.php';

    ?>

    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <h2>
                    Atualizar Senha
                    <small>Aqui você atualiza sua senha</a></small>
                </h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">

                            <form id="form_advanced_validation" method="post" action="adm_mudarsenha.php">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="Senha_atual" id="Senha_atual" maxlength="40" required>
                                        <label class="form-label">Senha atual</label>
                                    </div>
                                    <div class="help-info">Digite a senha atual</div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="Nova_senha" id="Nova_senha" maxlength="40" required>
                                        <label class="form-label">Nova senha</label>
                                    </div>
                                    <div class="help-info">Digite uma nova senha</div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="Repitir_senha" id="Repitir_senha" maxlength="40" required>
                                        <label class="form-label">Repitir nova senha</label>
                                    </div>
                                    <div class="help-info">Repita sua nova senha</div>
                                </div>

                                <button class="btn btn-primary waves-effect" name="btn_gravar">Gravar</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <?php 
    include_once '../../Base/_JQuery.php';
    include_once '../../Base/_msg.php'; 
    ?>

</body>

</html>