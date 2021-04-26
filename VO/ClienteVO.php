<?php

class ClienteVO{
    private $idUser_cliente;
    private $nome_cliente;
    private $cpf_cliente;
    private $email_cliente;
    private $tel_cliente;
    private $endereco_cliente;
    private $idUser;


    public function setIdUser_cliente($id){
        $this->idUser_cliente = $id;
    }
    public function getIdUser_cliente(){
        return $this->idUser_cliente;
    }

    public function setNomeCliente($nome_cliente){
        $this->nome_cliente = trim($nome_cliente);
    }
    public function getNomeCliente(){
        return $this->nome_cliente;
    }

    public function setCPFCliente($cpf_cliente){
        $this->cpf_cliente = trim($cpf_cliente);
    }
    public function getCPFCliente(){
        return $this->cpf_cliente;
    }

    public function setEmailCliente($email_cliente){
        $this->email_cliente = trim($email_cliente);
    }
    public function getEmailCliente(){
        return $this->email_cliente;
    }

    public function setTelCliente($tel_cliente){
        $this->tel_cliente = trim($tel_cliente);
    }
    public function getTelCliente(){
        return $this->tel_cliente;
    }

    public function setEnderecoCliente($endereco_cliente){
        $this->endereco_cliente = trim($endereco_cliente);
    }
    public function getEnderecoCliente(){
        return $this->endereco_cliente;
    }

    public function setIduser($idUser){
        $this->idUser = trim($idUser);
    }
    public function getIduser(){
        return $this->idUser;
    }
}