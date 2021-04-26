<?php

class OrdemServicoVO{
    private $id_ordemservico;
    private $data_servico;
    private $desc_servico;
    private $valor_servico;
    private $data_remover;
    private $id_func;
    private $id_cliente;
    private $id_user;


    public function setIdServico($id){
        $this->id_ordemservico = $id;
    }
    public function getIdServico(){
        return $this->id_ordemservico;
    }

    public function setDataServico($data_servico){
        $this->data_servico = trim($data_servico);
    }
    public function getDataServico(){
        return $this->data_servico;
    }

    public function setDescServico($desc_servico){
        $this->desc_servico = trim($desc_servico);
    }
    public function getDescServico(){
        return $this->desc_servico;
    }

    public function setValorServico($valor_servico){
        $this->valor_servico = trim($valor_servico);
    }
    public function getValorServico(){
        return $this->valor_servico;
    }

    public function setDataRemover($data_remover){
        $this->data_remover = trim($data_remover);
    }
    public function getDataRemover(){
        return $this->data_remover;
    }

    public function setIdFunc($id_func){
        $this->id_func = trim($id_func);
    }
    public function getIdFunc(){
        return $this->id_func;
    }

    public function setIdCliente($id_cliente){
        $this->id_cliente = trim($id_cliente);
    }
    public function getIdCliente(){
        return $this->id_cliente;
    }

    public function setIduser($id_user){
        $this->id_user = trim($id_user);
    }
    public function getIduser(){
        return $this->id_user;
    }
}