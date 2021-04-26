<?php

require_once '../../CTRL/MeusdadosCTRL.php';
require_once '../../VO/UsuarioVO.php';

//isset (Se existe) $_POST é vetorial []
if (isset($_POST['btn_gravar'])) {

    $vo = new UsuarioVO();
    $ctrl = new MeusdadosCTRL();

    $nome = $_POST['nome'];
    $vo->setNome($nome);
    $email = $_POST['email'];
    $vo->setEmail($email);
    $telefone = $_POST['telefone'];
    $vo->setTelefone($telefone);
    $endereco = $_POST['endereco'];
    $vo->setEndereco($endereco);

    $ret = $ctrl->InserirMeusdadosCTRL($vo);
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
                    Atualizar Informações
                    <small>Aqui você atualiza suas informações</a></small>
                </h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">

                            <form id="form_advanced_validation" method="post" action="adm_meusdados.php">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nome" id="nome" maxlength="40" required>
                                        <label class="form-label">Nome</label>
                                    </div>
                                    <div class="help-info">Digite o nome</div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email" id="email" required>
                                        <label class="form-label">Email</label>
                                    </div>
                                    <div class="help-info">Digite E-mail válido</div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="telefone" id="telefone" required>
                                        <label class="form-label">Telefone</label>
                                    </div>
                                    <div class="help-info">Digite o número do Telefone</div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="endereco" id="endereco" required>
                                        <label class="form-label">Endereço</label>
                                    </div>
                                    <div class="help-info">Digite o endereço</div>
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