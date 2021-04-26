<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/CTRL/ClienteCTRL.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/VO/ClienteVO.php';

$ctrl = new ClienteCTRL();

if (
    isset($_POST['nome_cliente']) && isset($_POST['cpf_cliente']) && isset($_POST['email_cliente'])
    && isset($_POST['tel_cliente']) && isset($_POST['end_cliente']) && $_POST['acao'] == 'I'
) {

    $vo = new ClienteVO();
    $nome = $_POST['nome_cliente'];
    $cpf = $_POST['cpf_cliente'];
    $email = $_POST['email_cliente'];
    $telefone = $_POST['tel_cliente'];
    $endereco = $_POST['end_cliente'];

    $vo->setNomeCliente($nome);
    $vo->setCPFCliente($cpf);
    $vo->setEmailCliente($email);
    $vo->setTelCliente($telefone);
    $vo->setEnderecoCliente($endereco);

    $ret = $ctrl->InserirCadastroClienteCTRL($vo);
    echo $ret;

} else if (isset($_POST['id_cliente']) && $_POST['acao'] == 'R') {

    $ID = $_POST['id_cliente'];
    $ret = $ctrl->ExcluirClienteCTRL($ID);
    echo $ret;

} else if (isset($_POST['cod_cliente']) && isset($_POST['nome_cliente']) && isset($_POST['cpf_cliente']) && isset($_POST['email_cliente'])
    && isset($_POST['tel_cliente']) && isset($_POST['end_cliente']) && $_POST['acao'] == 'A'
) {
    $vo = new ClienteVO();

    $cod = $_POST['cod_cliente'];
    $nome = $_POST['nome_cliente'];
    $cpf = $_POST['cpf_cliente'];
    $email = $_POST['email_cliente'];
    $telefone = $_POST['tel_cliente'];
    $endereco = $_POST['end_cliente'];

    $vo->setIdUser_cliente($cod);
    $vo->setNomeCliente($nome);
    $vo->setCPFCliente($cpf);
    $vo->setEmailCliente($email);
    $vo->setTelCliente($telefone);
    $vo->setEnderecoCliente($endereco);

    $ret = $ctrl->AlterarCadastroClienteCTRL($vo);
    echo $ret;
    //header('location: adm_cliente.php?cod=' . $cod . '&ret=' . $ret);
}
