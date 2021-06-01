<?php

require_once '../../CTRL/FuncionarioCTRL.php';
require_once '../../VO/FuncionarioVO.php';
require_once '../../CTRL/UtilCTRL.php';

$ctrl_funcionario = new FuncionarioCTRL();
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
                    Consultar Funcionários
                    <small>Aqui consulta funcionários cadastrados</a></small>
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Funcionários Cadastrados
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="tabFuncionarios">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>CPF</th>
                                            <th>E-mail</th>
                                            <th>Telefone</th>
                                            <th>Endereço</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nome</th>
                                            <th>CPF</th>
                                            <th>E-mail</th>
                                            <th>Telefone</th>
                                            <th>Endereço</th>
                                            <th>Ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php for ($i = 0; $i < count($funcionarios); $i++) { ?>
                                            <tr>
                                                <td><?= $funcionarios[$i]['nome_func'] ?></td>
                                                <td><?= $funcionarios[$i]['cpf_func'] ?></td>
                                                <td><?= $funcionarios[$i]['email_func'] ?></td>
                                                <td><?= $funcionarios[$i]['tel_func'] ?></td>
                                                <td><?= $funcionarios[$i]['endereco_func'] ?></td>
                                                <td>
                                                    <div class="row js-modal-buttons demo-button-sizes">
                                                        <div class="align-center">
                                                            <a href="adm_funcionario.php?cod=<?= $funcionarios[$i]['id_func'] ?>" data-color="orange" class="btn bg-orange waves-effect">Alterar</a>
                                                            <button type="button" class="btn bg-red waves-effect" onclick="ExcluirFuncionario('<?= $funcionarios[$i]['id_func'] ?>','<?= $funcionarios[$i]['nome_func'] ?>')">Excluir</button>
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
        </div>
    </section>

    <?php
    include_once '../../Base/_JQuery.php';
    include_once '../../Base/_msg.php';
    ?>

</body>

</html>