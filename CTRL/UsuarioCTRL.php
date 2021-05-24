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

    public function AlterarUsuarioCTRL(UsuarioVO $vo)
    {
        if($vo->getEmail() == '' || $vo->getTelefone() == '' || $vo->getEndereco() == ''){
            return 0;
        }

        $vo->setIdUser(UtilCTRL::CodigoUserLogado());

        $dao = new UsuarioDAO();
        return $dao->AlterarUsuarioDAO($vo);
    }
    
    public function DetalharUsuarioCTRL()
    {
        $dao = new UsuarioDAO();
        return $dao->DetalharUsuarioDAO(UtilCTRL::CodigoUserLogado());
    }
    
    public function ValidarLoginCTRL($cpf, $senha)
    {
        $dao = new UsuarioDAO();
        $user = $dao->ValidarLoginDAO($cpf);

        if(count($user) == 0){
            return -4;
        }

        $senha_hash = $user[0]['senha_usuario'];

        if(password_verify($senha, $senha_hash))
        {
            UtilCTRL::CriarSessao($user[0]['id_usuario']);
            header('location: http://localhost/ProjetoParaleloNewBoostrap/acesso/Administrador/adm_meusdados.php');
        } else {
            return -4;
        }
    }
}