<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/CTRL/FuncionarioCTRL.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/VO/FuncionarioVO.php';

$ctrl = new FuncionarioCTRL();

if (
    isset($_POST['nome_func']) && isset($_POST['cpf_func']) && isset($_POST['email_func'])
    && isset($_POST['tel_func']) && isset($_POST['end_func']) && $_POST['acao'] == 'I'
) {

    $vo = new FuncionarioVO();

    $vo->setNome_func($_POST['nome_func']);
    $vo->setCPF_func($_POST['cpf_func']);
    $vo->setEmail_func($_POST['email_func']);
    $vo->setTel_func($_POST['tel_func']);
    $vo->setEndereco_func($_POST['end_func']);

    $ret = $ctrl->InserirFuncionarioCTRL($vo);
    echo $ret;
} else if (isset($_POST['id_func']) && $_POST['acao'] == 'R') {

    $ID = $_POST['id_func'];
    $ret = $ctrl->ExcluirFuncionarioCTRL($ID);
    echo $ret;
} else if (
    isset($_POST['cod_func']) && isset($_POST['nome_func']) && isset($_POST['cpf_func']) && isset($_POST['email_func'])
    && isset($_POST['tel_func']) && isset($_POST['end_func']) && $_POST['acao'] == 'A'
) {

    $vo = new FuncionarioVO();

    $vo->setID_func($_POST['cod_func']);
    $vo->setNome_func($_POST['nome_func']);
    $vo->setCPF_func($_POST['cpf_func']);
    $vo->setEmail_func($_POST['email_func']);
    $vo->setTel_func($_POST['tel_func']);
    $vo->setEndereco_func($_POST['end_func']);

    $ret = $ctrl->AlterarFuncionarioCTRL($vo);
    echo $ret;
}
