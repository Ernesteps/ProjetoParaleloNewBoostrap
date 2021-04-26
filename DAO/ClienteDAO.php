<?php

require_once 'Conexao.php';

define('InserirCliente', 'InserirClienteDAO');
define('AlterarCliente', 'AlterarClienteDAO');
define('ExcluirCliente', 'ExcluirClienteDAO');

class ClienteDAO extends Conexao{

    public function InserirClienteDAO(ClienteVO $vo, $idUser){
        //1º Passo: Obter o objeto de conxexão. Para isso crie uma variável
        $conexao = parent::retornaConexao(); //Parent - Acesso de recursos da classe

        //2º Passo: Criar uma variavel que armazena o comando
        $comando_sql = 'insert into tb_cliente (nome_cliente,cpf_cliente,email_cliente,tel_cliente,end_cliente,id_usuario) value (?,?,?,?,?,?)'; //Informação dinamica usa-se ?;
    
        //3ºPasso: Criar o objeto que será levado para o banco de dados
        $sql = new PDOStatement();

        //4º Passo: O objeto $sql deverá receber a conexão preparada para o comando
        $sql = $conexao->prepare($comando_sql);

        //5º Passo: Observar se tem ? no comando_sql, se tiver, configurar os BindValues
        $i=1;
        $sql->bindValue($i++, $vo->getNomeCliente());
        $sql->bindValue($i++, $vo->getCPFCliente());
        $sql->bindValue($i++, $vo->getEmailCliente());
        $sql->bindValue($i++, $vo->getTelCliente());
        $sql->bindValue($i++, $vo->getEnderecoCliente());
        $sql->bindValue($i++, $vo->getIduser());
        
        try{
            $sql->execute();
            return 1;
        }catch(Exception $ex){
            parent::GravarErro($ex->getMessage(), $idUser, InserirCliente);
            //echo $ex->getMessage(); //Retornar erro tecnico
            return -1;
        }
    }

    public function AlterarClienteDAO(ClienteVO $vo, $idUser){
        //1º Passo: Obter o objeto de conxexão. Para isso crie uma variável
        $conexao = parent::retornaConexao(); //Parent - Acesso de recursos da classe

        //2º Passo: Criar uma variavel que armazena o comando
        $comando_sql = 'update tb_cliente 
                        set nome_cliente=?,
                        cpf_cliente=?,
                        email_cliente=?,
                        tel_cliente=?,
                        end_cliente=? 
                    where id_cliente = ?'; //Informação dinamica usa-se ?;
    
        //3ºPasso: Criar o objeto que será levado para o banco de dados
        $sql = new PDOStatement();

        //4º Passo: O objeto $sql deverá receber a conexão preparada para o comando
        $sql = $conexao->prepare($comando_sql);

        //5º Passo: Observar se tem ? no comando_sql, se tiver, configurar os BindValues
        $i=1;
        $sql->bindValue($i++, $vo->getNomeCliente());
        $sql->bindValue($i++, $vo->getCPFCliente());
        $sql->bindValue($i++, $vo->getEmailCliente());
        $sql->bindValue($i++, $vo->getTelCliente());
        $sql->bindValue($i++, $vo->getEnderecoCliente());
        $sql->bindValue($i++, $vo->getIdUser_cliente());
        
        try{
            $sql->execute();
            return 1;
        }catch(Exception $ex){
            parent::GravarErro($ex->getMessage(), $idUser, AlterarCliente);
            //echo $ex->getMessage(); //Retornar erro tecnico
            return -1;
        }
    }

    public function DetalharCliente($idCliente){
        $conexao = parent::retornaConexao();
        $comando_sql = 'select
                            cli.id_cliente,
                            cli.nome_cliente,
                            cli.cpf_cliente,
                            cli.email_cliente,
                            cli.tel_cliente,
                            cli.end_cliente
                        from tb_cliente as cli
                        where cli.id_cliente=?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $i=1;
        $sql->bindValue($i++, $idCliente);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        return $sql->fetchAll();
    }

    public function ExcluirClienteDAO($idCliente, $idUser){
        //1º Passo: Obter o objeto de conxexão. Para isso crie uma variável
        $conexao = parent::retornaConexao(); //Parent - Acesso de recursos da classe

        //2º Passo: Criar uma variavel que armazena o comando
        $comando_sql = 'delete from tb_cliente where id_cliente = ?'; //Informação dinamica usa-se ?;
    
        //3ºPasso: Criar o objeto que será levado para o banco de dados
        $sql = new PDOStatement();

        //4º Passo: O objeto $sql deverá receber a conexão preparada para o comando
        $sql = $conexao->prepare($comando_sql);

        //5º Passo: Observar se tem ? no comando_sql, se tiver, configurar os BindValues
        $sql->bindValue(1, $idCliente);
        
        try{
            $sql->execute();
            return 1;
        }catch(Exception $ex){
            parent::GravarErro($ex->getMessage(), $idUser, ExcluirCliente);
            //echo $ex->getMessage(); //Retornar erro tecnico
            return -2;
        }
    }

    public function ConsultarClienteDAO(){
        $conexao = parent::retornaConexao();

        $comando_sql = 'select id_cliente, nome_cliente, cpf_cliente, email_cliente, tel_cliente, end_cliente from tb_cliente order by nome_cliente';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->setFetchMode(PDO::FETCH_ASSOC); //Enxuta as informações da consulta, mostrando apenas as informçoes importantes
        $sql->execute();

        return $sql->fetchAll(); //Varrer tudo, ou seja, retornar tudo, ou no caso, resultados.
    }

    public function VerificarCPFCadastroClienteDAO($cpf){
        $conexao = parent::retornaConexao();
        $comando_sql = 'select count(cpf_cliente) as counter
                        from tb_cliente where cpf_cliente = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $cpf);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        $result = $sql->fetchAll();
        return $result[0]['counter'];
    }
}