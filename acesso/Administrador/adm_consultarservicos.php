<?php

require_once '../../CTRL/UtilCTRL.php';
require_once '../../CTRL/OrdemServicoCTRL.php';
require_once '../../VO/OrdemServicoVO.php';

$ctrl_servico = new OrdemServicoCTRL();
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
                                                <td>R$: <?= $servicosAnd[$i]['valor_servico'] ?></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="align-center">
                                                            <a href="adm_servico.php?cod=<?= $servicosAnd[$i]['id_ordem_servico'] ?>" data-color="orange" class="btn bg-orange waves-effect">Alterar</a>
                                                            <button type="button" class="btn bg-red waves-effect" onclick="ExcluirOrdemServico('<?= $servicosAnd[$i]['id_ordem_servico'] ?>','<?= $servicosAnd[$i]['desc_servico'] ?>','<?= $servicosAnd[$i]['data_servico'] ?>')">Encerrar</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
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
                                                <td>R$: <?= $servicosEnc[$i]['valor_servico'] ?></td>
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