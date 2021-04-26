<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/CTRL/OrdemServicoCTRL.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/VO/OrdemServicoVO.php';

$ctrl = new OrdemServicoCTRL();

if (
    isset($_POST['id_func']) && isset($_POST['id_cliente']) && isset($_POST['desc_servico'])
    && isset($_POST['valor_servico']) && $_POST['acao'] == 'I'
) {

    $vo = new OrdemServicoVO();
    $id_func = $_POST['id_func'];
    $id_cliente = $_POST['id_cliente'];
    $desc_servico = $_POST['desc_servico'];
    $valor_servico = $_POST['valor_servico'];

    $vo->setIdFunc($id_func);
    $vo->setIdCliente($id_cliente);
    $vo->setDescServico($desc_servico);
    $vo->setValorServico($valor_servico);

    $ret = $ctrl->InserirOrdemServicoCTRL($vo);
    echo $ret;
} else if (isset($_POST['id_servico']) && $_POST['acao'] == 'A') {

    $vo = new OrdemServicoVO();
    $ID = $_POST['id_servico'];
    $vo->setIdServico($ID);
    $ret = $ctrl->EncerrarOrdemServicoCTRL($vo);

    echo $ret;
} else if (
    isset($_POST['id_serv']) && isset($_POST['id_func']) && isset($_POST['id_cliente']) && isset($_POST['desc_servico'])
    && isset($_POST['valor_servico']) && $_POST['acao'] == 'A'
) {

    $vo = new OrdemServicoVO();

    $cod_serv = $_POST['id_serv'];
    $id_func = $_POST['id_func'];
    $id_cliente = $_POST['id_cliente'];
    $desc_servico = $_POST['desc_servico'];
    $valor_servico = $_POST['valor_servico'];

    $vo->setIdServico($cod_serv);
    $vo->setIdFunc($id_func);
    $vo->setIdCliente($id_cliente);
    $vo->setDescServico($desc_servico);
    $vo->setValorServico($valor_servico);

    $ret = $ctrl->AlterarOrdemServicoCTRL($vo);
    echo $ret;
}
