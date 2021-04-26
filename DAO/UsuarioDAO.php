<?php

require_once 'Conexao.php';

class UsuarioDAO extends Conexao{

    public function InserirUsuarioDAO(UsuarioVO $vo){
        //1º Passo: Obter o objeto de conxexão. Para isso crie uma variável
        $conexao = parent::retornaConexao(); //Parent - Acesso de recursos da classe

        //2º Passo: Criar uma variavel que armazena o comando
        $comando_sql = 'insert into tb_usuario (nome_usuario,cpf_usuario,email_usuario,tel_usuario,endereco_usuario,senha_usuario) value (?,?,?,?,?,?)'; //Informação dinamica usa-se ?;
    
        //3ºPasso: Criar o objeto que será levado para o banco de dados
        $sql = new PDOStatement();

        //4º Passo: O objeto $sql deverá receber a conexão preparada para o comando
        $sql = $conexao->prepare($comando_sql);

        //5º Passo: Observar se tem ? no comando_sql, se tiver, configurar os BindValues
        $sql->bindValue(1, $vo->getNome());
        $sql->bindValue(2, $vo->getCPF());
        $sql->bindValue(3, $vo->getEmail());
        $sql->bindValue(4, $vo->getTelefone());
        $sql->bindValue(5, $vo->getEndereco());
        $sql->bindValue(6, $vo->getSenha());
        
        try{
            $sql->execute();
            return 1;
        }catch(Exception $ex){
            //echo $ex->getMessage(); //Retornar erro tecnico
            return -1;
        }
    }

    public function ConsultarUsuarioDAO(){
        $conexao = parent::retornaConexao();

        $comando_sql = 'select id_usuario, nome_usuario, cpf_usuario, email_usuario, tel_usuario, endereco_usuario, senha_usuario from tb_usuario order by nome_usuario';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->setFetchMode(PDO::FETCH_ASSOC); //Enxuta as informações da consulta, mostrando apenas as informçoes importantes
        $sql->execute();

        return $sql->fetchAll(); //Varrer tudo, ou seja, retornar tudo, ou no caso, resultados.
    }
}