<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/DAO/OrdemServicoDAO.php';
require_once 'UtilCTRL.php';

class OrdemServicoCTRL
{
    public function InserirOrdemServicoCTRL(OrdemServicoVO $vo)
    {
        if ($vo->getIdFunc() == '' || $vo->getIdCliente() == '' || $vo->getDescServico() == '' || $vo->getValorServico() == '') {
            return 0;
        }

        $vo->setIduser(UtilCTRL::CodigoUserLogado());
        $vo->setDataServico(UtilCTRL::DataAtual());

        $dao = new OrdemServicoDAO();
        return $dao->InserirOrdemServicoDAO($vo, UtilCTRL::CodigoUserLogado());
    }

    public function AlterarOrdemServicoCTRL(OrdemServicoVO $vo)
    {
        if ($vo->getIdFunc() == '' || $vo->getIdCliente() == '' || $vo->getDescServico() == '' || $vo->getValorServico() == '') {
            return 0;
        }

        $vo->setIduser(UtilCTRL::CodigoUserLogado());

        $dao = new OrdemServicoDAO();
        return $dao->AlterarOrdemServicoDAO($vo, UtilCTRL::CodigoUserLogado());
    }

    public function DetalharOrdemServicoCTRL($idOrdemServico){
        $dao = new OrdemServicoDAO();
        return $dao->DetalharOrdemServicoDAO($idOrdemServico);
    }

    public function PesquisarOrdemServicoAndamentoCTRL(){
        $dao = new OrdemServicoDAO();
        return $dao->PesquisarOrdemServicoAndamentoDAO();
    }

    public function PesquisarOrdemServicoEncerradoCTRL(){
        $dao = new OrdemServicoDAO();
        return $dao->PesquisarOrdemServicoEncerradoDAO();
    }

    public function EncerrarOrdemServicoCTRL(OrdemServicoVO $vo){
        $vo->setDataRemover(UtilCTRL::DataAtual());

        $dao = new OrdemServicoDAO();
        return $dao->EncerrarOrdemServicoDAO($vo, UtilCTRL::CodigoUserLogado());
    }
}
