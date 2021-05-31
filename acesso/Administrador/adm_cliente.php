<?php

require_once '../../CTRL/ClienteCTRL.php';
require_once '../../VO/ClienteVO.php';
require_once '../../CTRL/UtilCTRL.php';

$cod = '';

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
    $ctrl = new ClienteCTRL();
    $cod = $_GET['cod'];
    $dados = $ctrl->DetalharCliente($cod);

    if (count($dados) == 0) {
        header('location: adm_consultarclientes.php');
        exit;
    }
} else if (isset($_POST['btn_gravar'])) {

    $vo = new ClienteVO();
    $ctrl = new ClienteCTRL();

    $cod = $_POST['cod'];
    $vo->setIdUser_cliente($cod);

    $vo->setNomeCliente($_POST['nome']);
    $vo->setEmailCliente($_POST['email']);
    $vo->setCPFCliente($_POST['CPF']);
    $vo->setTelCliente($_POST['telefone']);
    $vo->setEnderecoCliente($_POST['endereco']);

    if ($cod == '') {
        $ret = $ctrl->InserirCadastroClienteCTRL($vo);
    } else {
        $ret = $ctrl->AlterarCadastroClienteCTRL($vo);
        header('location: adm_cliente.php?cod=' . $cod . '&ret=' . $ret);
    }
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
                    <?= $cod == '' ? 'Novo' : 'Alterar' ?> Cliente
                    <small>Aqui você <?= $cod == '' ? 'cadastra um novo' : 'altere o' ?> cliente</a></small>
                </h2>
            </div>

            <div class="row clearfix js-sweetalert">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">

                            <form id="form_advanced_validation" method="post" action="adm_cliente.php">
                                <input type="hidden" name="cod" id="cod" value="<?= $cod ?>">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nome" id="nome" maxlength="40" value="<?= isset($dados) ? $dados[0]['nome_cliente'] : '' ?>" required>
                                        <label class="form-label">Nome do Cliente</label>
                                    </div>
                                    <div class="help-info">Digite o nome do cliente</div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="CPF" id="CPF" maxlength="11" onchange="ValidarCPFCadastroCliente(this.value, <?= isset($dados) ? $dados[0]['cpf_cliente'] : '' ?>)" value="<?= isset($dados) ? $dados[0]['cpf_cliente'] : '' ?>" required>
                                        <label class="form-label">CPF</label>
                                    </div>
                                    <div class="help-info">Digite somente os números do CPF</div>
                                    <label id="val_cpf" style="color: red; font-size:11px; display: none"></label>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email" id="email" value="<?= isset($dados) ? $dados[0]['email_cliente'] : '' ?>" required>
                                        <label class="form-label">Email</label>
                                    </div>
                                    <div class="help-info">Digite E-mail válido</div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="telefone" id="telefone" value="<?= isset($dados) ? $dados[0]['tel_cliente'] : '' ?>" maxlength="13" required>
                                        <label class="form-label">Telefone</label>
                                    </div>
                                    <div class="help-info">Digite o número do Telefone</div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="endereco" id="endereco" value="<?= isset($dados) ? $dados[0]['end_cliente'] : '' ?>" required>
                                        <label class="form-label">Endereço</label>
                                    </div>
                                    <div class="help-info">Digite o endereço</div>
                                </div>

                                <button class="btn btn-primary waves-effect" name="btn_gravar" onclick="<?= $cod == '' ? 'return InserirCliente()' : 'return AlterarCliente(1)' ?>"><?= $cod == '' ? 'Cadastrar' : 'Alterar' ?></button>

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