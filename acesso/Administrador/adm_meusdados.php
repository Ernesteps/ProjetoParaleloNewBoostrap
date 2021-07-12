<?php

require_once '../../CTRL/UsuarioCTRL.php';
require_once '../../VO/UsuarioVO.php';
require_once '../../CTRL/UtilCTRL.php';

$cod = UtilCTRL::CodigoUserLogado();
$ctrl = new UsuarioCTRL();

if (isset($_POST['btn_atualizar'])) {

    $vo = new UsuarioVO();

    $vo->setEmail($_POST['email']);
    $vo->setTelefone($_POST['telefone']);
    $vo->setEndereco($_POST['endereco']);

    $ret = $ctrl->AlterarUsuarioCTRL($vo);
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
                    Atualizar Informações
                    <small>Aqui você atualiza suas informações</a></small>
                </h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">

                            <form id="form_advanced_validation" method="post" action="adm_meusdados.php">
                                <input type="hidden" name="cod" id="cod" value="<?= $cod ?>">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nome" id="nome" value="<?= $dados[0]['nome_usuario'] ?>" readonly>
                                        <label class="form-label">Nome</label>
                                    </div>
                                    <div class="help-info" style="color: red;">Não é permitido a alteração do Nome</div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control num cpf" name="CPF" id="CPF" value="<?= $dados[0]['cpf_usuario'] ?>" readonly>
                                        <label class="form-label">CPF</label>
                                    </div>
                                    <div class="help-info" style="color: red;">Não é permitido a alteração do CPF</div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email" id="email" value="<?= $dados[0]['email_usuario'] ?>" required>
                                        <label class="form-label">Email</label>
                                    </div>
                                    <div class="help-info">Digite E-mail válido</div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control num cel" name="telefone" id="telefone" value="<?= $dados[0]['tel_usuario'] ?>" required>
                                        <label class="form-label">Telefone</label>
                                    </div>
                                    <div class="help-info">Digite o número do Telefone</div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="endereco" id="endereco" value="<?= $dados[0]['endereco_usuario'] ?>" required>
                                        <label class="form-label">Endereço</label>
                                    </div>
                                    <div class="help-info">Digite o endereço</div>
                                </div>

                                <button class="btn btn-primary waves-effect" id="btn_atualizar" name="btn_atualizar" onclick="return AtualizarUsuario()">Atualizar</button>

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