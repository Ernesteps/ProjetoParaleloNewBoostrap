<?php

require_once 'Conexao.php';

define('InserirFuncionario', 'InserirFuncionarioDAO');
define('AlterarFuncionario', 'AlterarFuncionarioDAO');
define('ExcluirFuncionario', 'ExcluirFuncionarioDAO');

class FuncionarioDAO extends Conexao{

    public function InserirFuncionarioDAO(FuncionarioVO $vo, $idUser){
        //1º Passo: Obter o objeto de conxexão. Para isso crie uma variável
        $conexao = parent::retornaConexao(); //Parent - Acesso de recursos da classe

        //2º Passo: Criar uma variavel que armazena o comando
        $comando_sql = 'insert into tb_funcionario (nome_func,cpf_func,email_func,tel_func,endereco_func,id_usuario) value (?,?,?,?,?,?)'; //Informação dinamica usa-se ?;
    
        //3ºPasso: Criar o objeto que será levado para o banco de dados
        $sql = new PDOStatement();

        //4º Passo: O objeto $sql deverá receber a conexão preparada para o comando
        $sql = $conexao->prepare($comando_sql);

        //5º Passo: Observar se tem ? no comando_sql, se tiver, configurar os BindValues
        $i=1;
        $sql->bindValue($i++, $vo->getNome_func());
        $sql->bindValue($i++, $vo->getCPF_Func());
        $sql->bindValue($i++, $vo->getEmail_func());
        $sql->bindValue($i++, $vo->getTel_func());
        $sql->bindValue($i++, $vo->getEndereco_func());
        $sql->bindValue($i++, $vo->getID_user());
        
        try{
            $sql->execute();
            return 1;
        }catch(Exception $ex){
            parent::GravarErro($ex->getMessage(), $idUser, InserirCliente);
            //echo $ex->getMessage(); //Retornar erro tecnico
            return -1;
        }
    }

    public function AlterarFuncionarioDAO(FuncionarioVO $vo, $idUser){
        //1º Passo: Obter o objeto de conxexão. Para isso crie uma variável
        $conexao = parent::retornaConexao(); //Parent - Acesso de recursos da classe

        //2º Passo: Criar uma variavel que armazena o comando
        $comando_sql = 'update tb_funcionario 
                        set nome_func=?,
                        cpf_func=?,
                        email_func=?,
                        tel_func=?,
                        endereco_func=? 
                    where id_func=?'; //Informação dinamica usa-se ?;
    
        //3ºPasso: Criar o objeto que será levado para o banco de dados
        $sql = new PDOStatement();

        //4º Passo: O objeto $sql deverá receber a conexão preparada para o comando
        $sql = $conexao->prepare($comando_sql);

        //5º Passo: Observar se tem ? no comando_sql, se tiver, configurar os BindValues
        $i=1;
        $sql->bindValue($i++, $vo->getNome_func());
        $sql->bindValue($i++, $vo->getCPF_Func());
        $sql->bindValue($i++, $vo->getEmail_func());
        $sql->bindValue($i++, $vo->getTel_func());
        $sql->bindValue($i++, $vo->getEndereco_func());
        $sql->bindValue($i++, $vo->getID_func());
        
        try{
            $sql->execute();
            return 1;
        }catch(Exception $ex){
            parent::GravarErro($ex->getMessage(), $idUser, AlterarFuncionario);
            //echo $ex->getMessage(); //Retornar erro tecnico
            return -1;
        }
    }

    public function DetalharFuncionario($idFuncionario){
        $conexao = parent::retornaConexao();
        $comando_sql = 'select
                            func.id_func,
                            func.nome_func,
                            func.cpf_func,
                            func.email_func,
                            func.tel_func,
                            func.endereco_func
                        from tb_funcionario as func
                        where func.id_func = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $i=1;
        $sql->bindValue($i++, $idFuncionario);
        $sql->setfetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        return $sql->fetchAll();
    }

    public function ExcluirFuncionarioDAO($idFuncionario, $idUser){
        //1º Passo: Obter o objeto de conxexão. Para isso crie uma variável
        $conexao = parent::retornaConexao(); //Parent - Acesso de recursos da classe

        //2º Passo: Criar uma variavel que armazena o comando
        $comando_sql = 'delete from tb_funcionario where id_func = ?'; //Informação dinamica usa-se ?;
    
        //3ºPasso: Criar o objeto que será levado para o banco de dados
        $sql = new PDOStatement();

        //4º Passo: O objeto $sql deverá receber a conexão preparada para o comando
        $sql = $conexao->prepare($comando_sql);

        //5º Passo: Observar se tem ? no comando_sql, se tiver, configurar os BindValues
        $sql->bindValue(1, $idFuncionario);
        
        try{
            $sql->execute();
            return 1;
        }catch(Exception $ex){
            parent::GravarErro($ex->getMessage(), $idUser, ExcluirFuncionario);
            //echo $ex->getMessage(); //Retornar erro tecnico
            return -2;
        }
    }

    public function ConsultarFuncionarioDAO(){
        $conexao = parent::retornaConexao();

        $comando_sql = 'select id_func, nome_func, cpf_func, email_func, tel_func, endereco_func from tb_funcionario order by nome_func';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->setFetchMode(PDO::FETCH_ASSOC); //Enxuta as informações da consulta, mostrando apenas as informçoes importantes
        $sql->execute();

        return $sql->fetchAll(); //Varrer tudo, ou seja, retornar tudo, ou no caso, resultados.
    }

    public function VerificarCPFCadastroFuncionarioDAO($cpf){
        $conexao = parent::retornaConexao();
        $comando_sql = 'select count(cpf_func) as counter
                        from tb_funcionario where cpf_func = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $cpf);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        $result = $sql->fetchAll();
        return $result[0]['counter'];
    }
}