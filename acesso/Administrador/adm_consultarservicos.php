<?php

require_once '../../CTRL/UtilCTRL.php';
require_once '../../CTRL/OrdemServicoCTRL.php';
require_once '../../VO/OrdemServicoVO.php';

$ctrl_servico = new OrdemServicoCTRL();

if(isset($_POST['btn_excluir'])){
    $vo = new OrdemServicoVO();
    $cod = $_POST['cod_item'];
    $vo->setIdServico($cod);
    $ret = $ctrl_servico->EncerrarOrdemServicoCTRL($vo);

} else if (isset($_POST['btn_alterar'])){
    $vo = new OrdemServicoVO();

    $cod = $_POST['cod_alt'];
    $funcionario = $_POST['funcionario_alt'];
    $cliente = $_POST['cliente_alt'];
    $desc_servico = $_POST['desc_servico_alt'];
    $valor = $_POST['valor_alt'];

    $vo->setIdServico($cod);
    $vo->setIdFunc($funcionario);
    $vo->setIdCliente($cliente);
    $vo->setDescServico($desc_servico);
    $vo->setValorServico($valor);

    $ret = $ctrl_servico->AlterarOrdemServicoCTRL($vo);
}

$servicosAnd = $ctrl_servico->PesquisarOrdemServicoAndamentoCTRL();
$servicosEnc = $ctrl_servico->PesquisarOrdemServicoEncerradoCTRL();

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
                    Consultar Ordem de Serviços
                    <small>Aqui consulta ordens de serviços</a></small>
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Ordens de Serviços em Andamento
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Data de Abertura</th>
                                            <th>Funcionário</th>
                                            <th>Cliente</th>
                                            <th>Descrição do Serviço sendo Realizado</th>
                                            <th>Valor Total</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Data de Abertura</th>
                                            <th>Funcionário</th>
                                            <th>Cliente</th>
                                            <th>Descrição do Serviço sendo Realizado</th>
                                            <th>Valor Total</th>
                                            <th>Ação</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php for ($i = 0; $i < count($servicosAnd); $i++) { ?>
                                            <tr>
                                                <td><?= $servicosAnd[$i]['data_servico'] ?></td>
                                                <td><?= $servicosAnd[$i]['nome_func'] ?></td>
                                                <td><?= $servicosAnd[$i]['nome_cliente'] ?></td>
                                                <td><?= $servicosAnd[$i]['desc_servico'] ?></td>
                                                <td><?= $servicosAnd[$i]['valor_servico'] ?></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="align-center">
                                                            <a href="adm_servico.php?cod=<?= $servicosAnd[$i]['id_ordem_servico'] ?>" data-color="orange" class="btn bg-orange waves-effect">Alterar</a>
                                                            <!--<button type="button" class="btn bg-red waves-effect" data-toggle="modal" data-target="#modal_excluir" onclick="CarregarDadosExcluir('<?= $servicosAnd[$i]['id_ordem_servico'] ?>','<?= $servicosAnd[$i]['desc_servico'] ?>')">Encerrar</button>-->
                                                            <button type="button" class="btn bg-red waves-effect" onclick="ExclusaoOrdemServico('<?= $servicosAnd[$i]['id_ordem_servico'] ?>','<?= $servicosAnd[$i]['desc_servico'] ?>','<?= $servicosAnd[$i]['data_servico'] ?>')">Encerrar</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                                <form method="post" action="adm_consultarservicos.php">
                                    <?php include_once '../../Base/_modal_excluir.php'; ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Ordens de Serviços Encerrados
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Data de Abertura</th>
                                            <th>Funcionário</th>
                                            <th>Cliente</th>
                                            <th>Descrição do Serviço Realizado</th>
                                            <th>Valor Total</th>
                                            <th>Data Encerrado</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Data de Abertura</th>
                                            <th>Funcionário</th>
                                            <th>Cliente</th>
                                            <th>Descrição do Serviço Realizado</th>
                                            <th>Valor Total</th>
                                            <th>Data Encerrado</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php for ($i = 0; $i < count($servicosEnc); $i++) { ?>
                                            <tr>
                                                <td><?= $servicosEnc[$i]['data_servico'] ?></td>
                                                <td><?= $servicosEnc[$i]['nome_func'] ?></td>
                                                <td><?= $servicosEnc[$i]['nome_cliente'] ?></td>
                                                <td><?= $servicosEnc[$i]['desc_servico'] ?></td>
                                                <td><?= $servicosEnc[$i]['valor_servico'] ?></td>
                                                <td><?= $servicosEnc[$i]['data_remover'] ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
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