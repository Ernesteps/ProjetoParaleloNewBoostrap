<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/DAO/UsuarioDAO.php';
require_once 'UtilCTRL.php';

class UsuarioCTRL
{
    public function InserirUsuarioCTRL(UsuarioVO $vo)
    {
        if ($vo->getNome() == '' || $vo->getCPF() == '' || $vo->getEmail() == '' || $vo->getTelefone() == '' || $vo->getEndereco() == '' || $vo->getSenha() == '') {
            return 0;
        }

        $vo->setSenha(UtilCTRL::RetornarCriptografado($vo->getSenha()));

        $dao = new UsuarioDAO();
        return $dao->InserirUsuarioDAO($vo);
    }

    public function VerificarSenhaRepetida($senha, $rsenha)
    {
        if (trim($senha) != trim($rsenha)) {
            return -3;
        }
    }

    public function AlterarUsuarioCTRL(UsuarioVO $vo)
    {
        if ($vo->getEmail() == '' || $vo->getTelefone() == '' || $vo->getEndereco() == '') {
            return 0;
        }

        $vo->setIdUser(UtilCTRL::CodigoUserLogado());

        $dao = new UsuarioDAO();
        return $dao->AlterarUsuarioDAO($vo);
    }

    public function DetalharUsuarioCTRL($idUser)
    {
        $dao = new UsuarioDAO();
        return $dao->DetalharUsuarioDAO($idUser == '' ? UtilCTRL::CodigoUserLogado() : $idUser);
    }

    public function ValidarSenhaAtualCTRL($senha_atual)
    {
        $dao = new UsuarioDAO();

        $user_senha_hash = $dao->RecuperarSenhaAtualDAO(UtilCTRL::CodigoUserLogado());
        $senha_hash = $user_senha_hash[0]['senha_usuario'];

        return password_verify($senha_atual, $senha_hash);
    }

    public function AlterarSenhaCTRL($senha, $rsenha)
    {
        if (trim($senha) != trim($rsenha)) {
            return -3;
        }

        $dao = new UsuarioDAO();
        return $dao->AlterarSenhaDAO(UtilCTRL::CodigoUserLogado(), UtilCTRL::RetornarCriptografado($senha));
    }

    public function ValidarLoginCTRL($cpf, $senha)
    {
        $dao = new UsuarioDAO();
        $user = $dao->ValidarLoginDAO($cpf);

        if (count($user) == 0) {
            return -4;
        }

        $senha_hash = $user[0]['senha_usuario'];

        if (password_verify($senha, $senha_hash)) {
            UtilCTRL::CriarSessao($user[0]['id_usuario']);
            header('location: http://localhost/ProjetoParaleloNewBoostrap/acesso/Administrador/adm_meusdados.php');
        } else {
            return -5;
        }
    }
}
