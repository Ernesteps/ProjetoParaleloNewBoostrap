<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/DAO/MeusdadosDAO.php';

class MeusdadosCTRL
{
    public function InserirMeusdadosCTRL(UsuarioVO $vo)
    {
        if ($vo->getNome() == '' || $vo->getEmail() == '' || $vo->getTelefone() == '' || $vo->getEndereco() == '') {
            return 0;
        }
    }
}
