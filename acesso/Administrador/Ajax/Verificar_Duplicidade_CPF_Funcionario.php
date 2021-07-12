<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/CTRL/FuncionarioCTRL.php';

if (isset($_POST['cpf_funcionario'])) {
    $ctrl = new FuncionarioCTRL();

    $tem_cpf = $ctrl->VerificarCPFCadastroFuncionarioCTRL($_POST['cpf_funcionario']);
    echo $tem_cpf;
}
