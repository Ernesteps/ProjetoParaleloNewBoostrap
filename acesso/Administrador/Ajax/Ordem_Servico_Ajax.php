<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/CTRL/OrdemServicoCTRL.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/VO/OrdemServicoVO.php';

$ctrl = new OrdemServicoCTRL();

if (
    isset($_POST['id_func']) && isset($_POST['id_cliente']) && isset($_POST['desc_servico'])
    && isset($_POST['valor_servico']) && $_POST['acao'] == 'I'
) {

    $vo = new OrdemServicoVO();

    $vo->setIdFunc($_POST['id_func']);
    $vo->setIdCliente($_POST['id_cliente']);
    $vo->setDescServico($_POST['desc_servico']);
    $vo->setValorServico($_POST['valor_servico']);

    $ret = $ctrl->InserirOrdemServicoCTRL($vo);
    echo $ret;
} else if (isset($_POST['id_servico']) && $_POST['acao'] == 'A') {

    $vo = new OrdemServicoVO();
    $vo->setIdServico($_POST['id_servico']);

    $ret = $ctrl->EncerrarOrdemServicoCTRL($vo);
    echo $ret;
} else if (
    isset($_POST['id_serv']) && isset($_POST['id_func']) && isset($_POST['id_cliente'])
    && isset($_POST['desc_servico']) && isset($_POST['valor_servico']) && $_POST['acao'] == 'A'
) {

    $vo = new OrdemServicoVO();

    $vo->setIdServico($_POST['id_serv']);
    $vo->setIdFunc($_POST['id_func']);
    $vo->setIdCliente($_POST['id_cliente']);
    $vo->setDescServico($_POST['desc_servico']);
    $vo->setValorServico($_POST['valor_servico']);

    $ret = $ctrl->AlterarOrdemServicoCTRL($vo);
    echo $ret;
}
