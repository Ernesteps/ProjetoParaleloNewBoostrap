<?php

class UtilCTRL{

    public static function ExibirArray($array)
    {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

    public static function CodigoUserLogado(){
        return 1; //Fixo por enquanto...
    }

    public static function RetornarCriptografado($palavra){
        return password_hash($palavra, PASSWORD_DEFAULT);
    }

    private static function SetarFusoHorario(){
        date_default_timezone_set('America/Sao_Paulo');
    }

    public static function HoraAtual(){
        self::SetarFusoHorario();
        return date('H:i');
    }

    public static function DataAtual(){
        self::SetarFusoHorario();
        return date('Y-m-d');
    }
}