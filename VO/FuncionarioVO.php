<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/CTRL/UtilCTRL.php';

class FuncionarioVO
{
    private $idfunc;
    private $nome_func;
    private $cpf_func;
    private $email_func;
    private $tel_func;
    private $endereco_func;
    private $iduser;

    public function setID_func($idfunc)
    {
        $this->idfunc = trim($idfunc);
    }
    public function getID_func()
    {
        return $this->idfunc;
    }

    public function setNome_func($nome_func)
    {
        $this->nome_func = trim($nome_func);
    }
    public function getNome_func()
    {
        return $this->nome_func;
    }

    public function setCPF_func($cpf_func)
    {
        $this->cpf_func = UtilCTRL::TirarCaracteresEspeciais($cpf_func);
    }
    public function getCPF_Func()
    {
        return $this->cpf_func;
    }

    public function setEmail_func($email_func)
    {
        $this->email_func = trim($email_func);
    }
    public function getEmail_func()
    {
        return $this->email_func;
    }

    public function setTel_func($tel_func)
    {
        $this->tel_func = UtilCTRL::TirarCaracteresEspeciais($tel_func);
    }
    public function getTel_func()
    {
        return $this->tel_func;
    }

    public function setEndereco_func($endereco_func)
    {
        $this->endereco_func = trim($endereco_func);
    }
    public function getEndereco_func()
    {
        return $this->endereco_func;
    }

    public function setID_user($iduser)
    {
        $this->iduser = trim($iduser);
    }
    public function getID_user()
    {
        return $this->iduser;
    }
}
