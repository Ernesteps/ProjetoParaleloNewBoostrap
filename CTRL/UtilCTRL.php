<?php

class UtilCTRL
{
    private static function IniciarSessao()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public static function CriarSessao($id_user)
    {
        self::IniciarSessao();
        $_SESSION['cod'] = $id_user;
    }

    public static function Deslogar()
    {
        self::IniciarSessao();
        unset($_SESSION['cod']);

        self::VoltarPaginaLogin();
    }

    public static function VerificarLogado()
    {
        if (!isset($_SESSION['cod']) || $_SESSION['cod'] == '') {
            self::VoltarPaginaLogin();
        }
    }

    public static function VoltarPaginaLogin()
    {
        header('location: http://localhost/ProjetoParaleloNewBoostrap/acesso/Administrador/adm_signin.php');
        exit;
    }

    public static function CodigoUserLogado()
    {
        self::IniciarSessao();
        return $_SESSION['cod'];
    }

    public static function RetornarCriptografado($palavra)
    {
        return password_hash($palavra, PASSWORD_DEFAULT);
    }

    public static function TirarCaracteresEspeciais($str)
    {
        $especial = array('-', '_', '(', ')', '/', '*', ' ', '\\', '.', '!', ',', '#', '$');
        $str_limpa = str_replace($especial, '', $str);

        return $str_limpa;
    }

    private static function SetarFusoHorario()
    {
        date_default_timezone_set('America/Sao_Paulo');
    }

    public static function HoraAtual()
    {
        self::SetarFusoHorario();
        return date('H:i');
    }

    public static function DataAtual()
    {
        self::SetarFusoHorario();
        return date('Y-m-d');
    }

    public static function ExibirArray($array)
    {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
}
