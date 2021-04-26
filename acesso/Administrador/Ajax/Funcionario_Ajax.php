<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/CTRL/FuncionarioCTRL.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/VO/FuncionarioVO.php';

$ctrl = new FuncionarioCTRL();

if (isset($_POST['nome_func']) && isset($_POST['cpf_func']) && isset($_POST['email_func'])
    && isset($_POST['tel_func']) && isset($_POST['end_func']) && $_POST['acao'] == 'I') {

    $vo = new FuncionarioVO();
    $nome = $_POST['nome_func'];
    $cpf = $_POST['cpf_func'];
    $email = $_POST['email_func'];
    $telefone = $_POST['tel_func'];
    $endereco = $_POST['end_func'];

    $vo->setNome_func($nome);
    $vo->setCPF_func($cpf);
    $vo->setEmail_func($email);
    $vo->setTel_func($telefone);
    $vo->setEndereco_func($endereco);

    $ret = $ctrl->InserirFuncionarioCTRL($vo);
    echo $ret;   

} else if (isset($_POST['id_func']) && $_POST['acao'] == 'R') {

    $ID = $_POST['id_func'];
    $ret = $ctrl->ExcluirFuncionarioCTRL($ID);
    echo $ret;
} else if (isset($_POST['cod_func']) && isset($_POST['nome_func']) && isset($_POST['cpf_func']) && isset($_POST['email_func'])
&& isset($_POST['tel_func']) && isset($_POST['end_func']) && $_POST['acao'] == 'A') {

$vo = new FuncionarioVO();

$cod = $_POST['cod_func'];
$nome = $_POST['nome_func'];
$cpf = $_POST['cpf_func'];
$email = $_POST['email_func'];
$telefone = $_POST['tel_func'];
$endereco = $_POST['end_func'];

$vo->setID_func($cod);
$vo->setNome_func($nome);
$vo->setCPF_func($cpf);
$vo->setEmail_func($email);
$vo->setTel_func($telefone);
$vo->setEndereco_func($endereco);

$ret = $ctrl->AlterarFuncionarioCTRL($vo);
echo $ret;   
}
?>