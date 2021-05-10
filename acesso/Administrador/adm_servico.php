<?php

require_once '../../CTRL/OrdemServicoCTRL.php';
require_once '../../VO/OrdemServicoVO.php';
require_once '../../CTRL/FuncionarioCTRL.php';
require_once '../../CTRL/ClienteCTRL.php';

$ctrl_cliente = new ClienteCTRL();
$ctrl_funcionario = new FuncionarioCTRL();
$cod = '';
$funcionario = '';
$cliente = '';

if(isset($_GET['cod']) && is_numeric($_GET['cod'])){
    $ctrl = new OrdemServicoCTRL();
    $cod = $_GET['cod'];
    $dados = $ctrl->DetalharOrdemServicoCTRL($cod);

    if(count($dados) == 0){
        header('location: adm_consultarservicos.php');
        exit;
    } else{
        $funcionario = $dados[0]['id_func'];
        $cliente = $dados[0]['id_cliente'];
    }

}

if (isset($_POST['btn_gravar'])) {

    $vo = new OrdemServicoVO();
    $ctrl = new OrdemServicoCTRL();

    $cod = $_POST['cod'];
    $vo->setIdServico($cod);

    $vo->setIdFunc($_POST['funcionario']);
    $vo->setIdCliente($_POST['cliente']);
    $vo->setDescServico($_POST['descricao']);
    $vo->setValorServico($_POST['valor']);

    if($cod == ''){
        $ret = $ctrl->InserirOrdemServicoCTRL($vo);
    } else {
        $ret = $ctrl->AlterarOrdemServicoCTRL($vo);
        header('location: adm_servico.php?cod=' . $cod . '&ret=' . $ret);
    }

    
}

$clientes = $ctrl_cliente->ConsultarClienteCTRL();
$funcionarios = $ctrl_funcionario->ConsultarFuncionarioCTRL();

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
                    <?= $cod == '' ? 'Novo' : 'Alterar' ?> Ordem de Serviço
                    <small>Aqui você <?= $cod== '' ? 'cadastra' : 'altere' ?> um novo ordem de serviço</a></small>
                </h2>
            </div>

            <div class="row clearfix js-sweetalert demo-masked-input">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">

                            <form id="form_advanced_validation" method="post" action="adm_servico.php">
                                <input type="hidden" id="cod" name="cod" value="<?= $cod ?>">

                                <div class="row clearfix">

                                    <div class="col-xs-6">
                                        <div class="form-group form-float ">
                                            <select class="form-control show-tick" name="funcionario" id="funcionario" required>
                                                <option value="">Por favor, selecione o funcionário cadastrado.</option>
                                                <?php for ($i = 0; $i < count($funcionarios); $i++) { ?>
                                                    <option value="<?= $funcionarios[$i]['id_func'] ?>" <?= $funcionarios[$i]['id_func'] == $funcionario ? 'selected' : '' ?>><?= $funcionarios[$i]['nome_func'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-info">Selecionar o Nome do Funcionário.</div>
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <div class="form-group form-float ">
                                            <select class="form-control show-tick" name="cliente" id="cliente" required>
                                                <option value="">Por favor, selecione o cliente cadastrado.</option>
                                                <?php for ($i = 0; $i < count($clientes); $i++) { ?>
                                                    <option value="<?= $clientes[$i]['id_cliente'] ?>" <?= $clientes[$i]['id_cliente'] == $cliente ? 'selected' : '' ?>><?= $clientes[$i]['nome_cliente'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-info">Selecionar o Nome do Cliente.</div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line form-float">
                                                <textarea rows="1" type="Text" class="form-control no-resize auto-growth" placeholder="Digite ordem de serviço a ser feito..." name="descricao" id="descricao"required><?= isset($dados) ? $dados[0]['desc_servico'] : '' ?></textarea>
                                            </div>
                                            <div class="help-info">Descrição da Ordem de Serviço.</div>
                                        </div>
                                    </div>

                                    <div class="col-xs-2">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="valor" id="valor" value="<?= isset($dados) ? $dados[0]['valor_servico'] : '' ?>" required>
                                                <label class="form-label">Valor</label>
                                            </div>
                                            <div class="help-info">Digite o valor do serviço</div>
                                        </div>
                                    </div>

                                </div>

                                <button class="btn btn-primary waves-effect" name="btn_gravar" onclick="<?= $cod == '' ? 'return InserirOrdemServico()' : 'return AlterarOrdemServico(3)' ?>"><?= $cod == '' ? 'Gravar' : 'Alterar' ?></button>

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