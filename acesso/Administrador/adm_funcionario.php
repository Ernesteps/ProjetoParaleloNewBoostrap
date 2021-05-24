<?php

require_once '../../CTRL/FuncionarioCTRL.php';
require_once '../../VO//FuncionarioVO.php';
require_once '../../CTRL/UtilCTRL.php';

$cod = '';

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
    $ctrl = new FuncionarioCTRL();
    $cod = $_GET['cod'];
    $dados = $ctrl->DetalharFuncionario($cod);

    if (count($dados) == 0) {
        header('location: adm_consultarfuncionarios.php');
        exit;
    }
}

else if (isset($_POST['btn_gravar'])) {

    $vo = new FuncionarioVO();
    $ctrl = new FuncionarioCTRL();

    $cod = $_POST['cod'];
    $vo->setID_func($cod);

    $vo->setNome_func($_POST['nome']);
    $vo->setEmail_func($_POST['email']);
    $vo->setCPF_func($_POST['CPF']);
    $vo->setTel_func($_POST['telefone']);
    $vo->setEndereco_func($_POST['endereco']);

    if ($cod == '') {
        $ret = $ctrl->InserirFuncionarioCTRL($vo);
    } else {
        $ret = $ctrl->AlterarFuncionarioCTRL($vo);
        header('location: adm_funcionario.php?cod=' . $cod . '&ret=' . $ret);
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
                    <?= $cod == '' ? 'Novo' : 'Alterar' ?> Funcionário
                    <small>Aqui você <?= $cod == '' ? 'cadastra um novo' : 'altere o' ?> funcionário</a></small>
                </h2>
            </div>

            <div class="row clearfix js-sweetalert">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">

                            <form id="form_advanced_validation" method="post" action="adm_funcionario.php">
                                <input type="hidden" id="cod" name="cod" value="<?= $cod ?>">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nome" id="nome" maxlength="40" value="<?= isset($dados) ? $dados[0]['nome_func'] : '' ?>" required>
                                        <label class="form-label">Nome do Funcionário</label>
                                    </div>
                                    <div class="help-info">Digite o nome do funcionário</div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="CPF" id="CPF" maxlength="11" onchange="ValidarCPFCadastroFuncionario(this.value, <?= isset($dados) ? $dados[0]['cpf_func'] : '' ?>)" value="<?= isset($dados) ? $dados[0]['cpf_func'] : '' ?>" required>
                                        <label class="form-label">CPF</label>
                                    </div>
                                    <div class="help-info">Digite somente os números do CPF</div>
                                    <label id="val_cpf" style = "color: red; font-size:11px; display: none"></label>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email" id="email" value="<?= isset($dados) ? $dados[0]['email_func'] : '' ?>" required>
                                        <label class="form-label">Email</label>
                                    </div>
                                    <div class="help-info">Digite E-mail válido</div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="telefone" id="telefone" maxlength="13" value="<?= isset($dados) ? $dados[0]['tel_func'] : '' ?>" required>
                                        <label class="form-label">Telefone</label>
                                    </div>
                                    <div class="help-info">Digite o número do Telefone</div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="endereco" id="endereco" value="<?= isset($dados) ? $dados[0]['endereco_func'] : '' ?>" required>
                                        <label class="form-label">Endereço</label>
                                    </div>
                                    <div class="help-info">Digite o endereço</div>
                                </div>

                                <button class="btn btn-primary waves-effect" name="btn_gravar" onclick="<?= $cod == '' ? 'return InserirFuncionario()' : 'return AlterarFuncionario(2)' ?>"><?= $cod == '' ? 'Cadastrar' : 'Alterar' ?></button>

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