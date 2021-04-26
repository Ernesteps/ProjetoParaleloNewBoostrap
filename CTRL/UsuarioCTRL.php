<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/DAO/UsuarioDAO.php';
require_once 'UtilCTRL.php';

class UsuarioCTRL
{

    public function InserirUsuarioCTRL(UsuarioVO $vo)
    {
        if ($vo->getNome() == '' || $vo->getCPF() == '' || $vo->getEmail() == '' || $vo->getTelefone() == '' || $vo->getEndereco() == ''|| $vo->getSenha() == '') {
            return 0;
        }

        $vo->setSenha(UtilCTRL::RetornarCriptografado($vo->getSenha()));

        $dao = new UsuarioDAO();
        return $dao->InserirUsuarioDAO($vo);
    }   
}