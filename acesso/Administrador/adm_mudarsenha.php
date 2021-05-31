<?php
require_once '../../CTRL/UsuarioCTRL.php';
require_once '../../CTRL/UtilCTRL.php';

$ctrl = new UsuarioCTRL();

if (isset($_POST['btn_alterar'])) {
    $ret = $ctrl->AlterarSenhaCTRL($_POST['Nova_senha'], $_POST['Repetir_senha']);
}

$dados = $ctrl->DetalharUsuarioCTRL('');
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

                            <div id="SenhaAtual" name="SenhaAtual">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="Senha_atual" id="Senha_atual" oninput="ValidarSenhaAtual(document.getElementById('Senha_atual').value)" required>
                                        <label class="form-label">Senha atual</label>
                                    </div>
                                    <div class="help-info">Digite a senha atual. A cada digito será verificado a senha.</div>
                                    <label id="val_senha_atual" style = "color: red; font-size:11px; display: none"></label>
                                </div>
                            </div>

                                <div id="SenhaPreenchida" name="SenhaPreenchida" style="display: none;">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="Nova_senha" id="Nova_senha" minlength="6" required>
                                            <label class="form-label">Nova senha</label>
                                        </div>
                                        <div class="help-info">Digite uma nova senha que seja no mínimo 6 caracteres</div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="Repetir_senha" id="Repetir_senha" minlength="6" required>
                                            <label class="form-label">Repetir nova senha</label>
                                        </div>
                                        <div class="help-info">Repita sua nova senha</div>
                                    </div>

                                    <button class="btn btn-primary waves-effect" id="btn_alterar" name="btn_alterar">Alterar</button>
                                </div>

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