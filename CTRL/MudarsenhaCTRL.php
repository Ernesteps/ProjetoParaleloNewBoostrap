<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/DAO/MudarsenhaDAO.php';

class MudarsenhaCTRL
{
    public function InserirMudarsenhaCTRL(UsuarioVO $vo)
    {
        if ($vo->getSenha() == '') {
            return 0;
        }
    }
}
