<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/DAO/FuncionarioDAO.php';
require_once 'UtilCTRL.php';

class FuncionarioCTRL
{

    public function InserirFuncionarioCTRL(FuncionarioVO $vo)
    {
        if ($vo->getNome_func() == '' || $vo->getCPF_Func() == '' || $vo->getEmail_func() == '' || $vo->getTel_func() == '' || $vo->getEndereco_func() == '') {
            return 0;
        }
        $vo->setID_user(UtilCTRL::CodigoUserLogado());

        $dao = new FuncionarioDAO();
        return $dao->InserirFuncionarioDAO($vo, UtilCTRL::CodigoUserLogado());
    }

    public function AlterarFuncionarioCTRL(FuncionarioVO $vo)
    {
        if ($vo->getNome_func() == '' || $vo->getCPF_Func() == '' || $vo->getEmail_func() == '' || $vo->getTel_func() == '' || $vo->getEndereco_func() == '') {
            return 0;
        }

        $dao = new FuncionarioDAO();
        return $dao->AlterarFuncionarioDAO($vo, UtilCTRL::CodigoUserLogado());
    }

    public function ConsultarFuncionarioCTRL(){
        $dao = new FuncionarioDAO();
        return $dao->ConsultarFuncionarioDAO();
    }

    public function DetalharFuncionario($idFuncionario){
        $dao = new FuncionarioDAO();
        return $dao->DetalharFuncionario($idFuncionario);
    }

    public function ExcluirFuncionarioCTRL($idFuncionario){
        $dao = new FuncionarioDAO();
        return $dao->ExcluirFuncionarioDAO($idFuncionario, UtilCTRL::CodigoUserLogado());
    }

    public function VerificarCPFCadastroFuncionarioCTRL($cpf){
        $dao = new FuncionarioDAO();
        return $dao->VerificarCPFCadastroFuncionarioDAO($cpf);
    }
}
