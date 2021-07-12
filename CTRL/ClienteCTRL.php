<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/DAO/ClienteDAO.php';
require_once 'UtilCTRL.php';

class ClienteCTRL
{

    public function InserirCadastroClienteCTRL(ClienteVO $vo)
    {
        if ($vo->getNomeCliente() == '' || $vo->getCPFCliente() == '' || $vo->getEmailCliente() == '' || $vo->getTelCliente() == '' || $vo->getEnderecoCliente() == '') {
            return 0;
        }
        $vo->setCPFCliente(UtilCTRL::TirarCaracteresEspeciais($vo->getCPFCliente()));
        $vo->setTelCliente(UtilCTRL::TirarCaracteresEspeciais($vo->getTelCliente()));
        $vo->setIduser(UtilCTRL::CodigoUserLogado());

        $dao = new ClienteDAO();
        return $dao->InserirClienteDAO($vo, UtilCTRL::CodigoUserLogado());
    }

    public function AlterarCadastroClienteCTRL(ClienteVO $vo)
    {
        if ($vo->getNomeCliente() == '' || $vo->getCPFCliente() == '' || $vo->getEmailCliente() == '' || $vo->getTelCliente() == '' || $vo->getEnderecoCliente() == '') {
            return 0;
        }
        $vo->setCPFCliente(UtilCTRL::TirarCaracteresEspeciais($vo->getCPFCliente()));
        $vo->setTelCliente(UtilCTRL::TirarCaracteresEspeciais($vo->getTelCliente()));

        $dao = new ClienteDAO();
        return $dao->AlterarClienteDAO($vo, UtilCTRL::CodigoUserLogado());
    }

    public function ConsultarClienteCTRL()
    {
        $dao = new ClienteDAO();
        return $dao->ConsultarClienteDAO();
    }

    public function DetalharCliente($idCliente)
    {
        $dao = new ClienteDAO();
        return $dao->DetalharCliente($idCliente);
    }

    public function ExcluirClienteCTRL($idCliente)
    {
        $dao = new ClienteDAO();
        return $dao->ExcluirClienteDAO($idCliente, UtilCTRL::CodigoUserLogado());
    }

    public function VerificarCPFCadastroClienteCTRL($cpf)
    {
        $cpf = UtilCTRL::TirarCaracteresEspeciais($cpf);

        $dao = new ClienteDAO();
        return $dao->VerificarCPFCadastroClienteDAO($cpf);
    }
}
