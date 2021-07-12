<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/CTRL/UtilCTRL.php';

class UsuarioVO
{
    private $idUser;
    private $tipo;
    private $nome;
    private $cpf;
    private $email;
    private $telefone;
    private $endereco;
    private $senha;

    public function setIdUser($id)
    {
        $this->idUser = trim($id);
    }
    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    public function getTipo()
    {
        return $this->tipo;
    }

    public function setNome($nome)
    {
        $this->nome = trim($nome);
    }
    public function getNome()
    {
        return $this->nome;
    }

    public function setCPF($cpf)
    {
        $this->cpf = UtilCTRL::TirarCaracteresEspeciais($cpf);
    }
    public function getCPF()
    {
        return $this->cpf;
    }

    public function setEmail($email)
    {
        $this->email = trim($email);
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = UtilCTRL::TirarCaracteresEspeciais($telefone);
    }
    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = trim($endereco);
    }
    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setSenha($senha)
    {
        $this->senha = trim($senha);
    }

    public function getSenha()
    {
        return $this->senha;
    }
}
