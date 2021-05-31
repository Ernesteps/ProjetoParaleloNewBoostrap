<?php

// Configurações do site
define('HOST', 'localhost'); //IP
define('USER', 'root'); //usuario
define('PASS', null); //Senha
define('DB', 'db_projeto_paralelo'); //Banco
/**
 * Conexao.class TIPO [Conexão]
 * Descricao: Estabelece conexões com o banco usando SingleTon
 * @copyright (c) year, Wladimir M. Barros
 */

class Conexao
{

    /** @var PDO */
    private static $Connect;

    private static function Conectar()
    {
        try {

            //Verifica se a conexão não existe
            if (self::$Connect == null) :

                $dsn = 'mysql:host=' . HOST . ';dbname=' . DB;
                self::$Connect = new PDO($dsn, USER, PASS, null);
            endif;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        //Seta os atributos para que seja retornado as excessões do banco
        self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return  self::$Connect;
    }

    public static function retornaConexao()
    {
        return  self::Conectar();
    }

    public static function GravarErro($msg, $iduser, $funcao)
    {
        $quebra = chr(13) . chr(10);
        $arquivo = $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/DAO/Erro/Erro.txt';

        if (!file_exists($arquivo)) {
            $arquivo = fopen($arquivo, 'w');
        } else {
            $arquivo = fopen($arquivo, 'a+');
        }

        date_default_timezone_set('America/Sao_Paulo');

        $texto_final = '****************************************************************' . $quebra;
        $texto_final .= 'Erro: ' . $msg . $quebra; //.= Pega o mesmo valor, ou seja, como se fosse $texto_final = $texto_final .
        $texto_final .= 'Data: ' . date('d/m/Y') . ' Hora: ' . date('H:i') . $quebra;
        $texto_final .= 'Função Chamado: ' . $funcao . $quebra;
        $texto_final .= 'Id Usuario Logado: ' . $iduser . $quebra;

        fwrite($arquivo, $texto_final);
        fclose($arquivo);
    }
}
