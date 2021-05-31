<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/CTRL/ClienteCTRL.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/VO/ClienteVO.php';

$ctrl = new ClienteCTRL();

if (
    isset($_POST['nome_cliente']) && isset($_POST['cpf_cliente']) && isset($_POST['email_cliente'])
    && isset($_POST['tel_cliente']) && isset($_POST['end_cliente']) && $_POST['acao'] == 'I'
) {

    $vo = new ClienteVO();

    $vo->setNomeCliente($_POST['nome_cliente']);
    $vo->setCPFCliente($_POST['cpf_cliente']);
    $vo->setEmailCliente($_POST['email_cliente']);
    $vo->setTelCliente($_POST['tel_cliente']);
    $vo->setEnderecoCliente($_POST['end_cliente']);

    $ret = $ctrl->InserirCadastroClienteCTRL($vo);
    echo $ret;
} else if (isset($_POST['id_cliente']) && $_POST['acao'] == 'R') {

    $ID = $_POST['id_cliente'];
    $ret = $ctrl->ExcluirClienteCTRL($ID);
    echo $ret;
} else if (
    isset($_POST['cod_cliente']) && isset($_POST['nome_cliente']) && isset($_POST['cpf_cliente']) && isset($_POST['email_cliente'])
    && isset($_POST['tel_cliente']) && isset($_POST['end_cliente']) && $_POST['acao'] == 'A'
) {
    $vo = new ClienteVO();

    $vo->setIdUser_cliente($_POST['cod_cliente']);
    $vo->setNomeCliente($_POST['nome_cliente']);
    $vo->setCPFCliente($_POST['cpf_cliente']);
    $vo->setEmailCliente($_POST['email_cliente']);
    $vo->setTelCliente($_POST['tel_cliente']);
    $vo->setEnderecoCliente($_POST['end_cliente']);

    $ret = $ctrl->AlterarCadastroClienteCTRL($vo);
    echo $ret;
}
