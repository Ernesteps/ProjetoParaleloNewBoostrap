<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/CTRL/ClienteCTRL.php';

if (isset($_POST['cpf_cliente'])) {
    $ctrl = new ClienteCTRL();

    $tem_cpf = $ctrl->VerificarCPFCadastroClienteCTRL($_POST['cpf_cliente']);
    echo $tem_cpf;
}
