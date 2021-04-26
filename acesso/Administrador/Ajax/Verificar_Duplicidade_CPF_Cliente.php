<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/CTRL/ClienteCTRL.php';

if(isset($_POST['cpf_cliente'])){
    $cpf = $_POST['cpf_cliente'];
    $ctrl = new ClienteCTRL();

    $tem_cpf = $ctrl->VerificarCPFCadastroClienteCTRL($cpf);
    echo $tem_cpf;
}
?>