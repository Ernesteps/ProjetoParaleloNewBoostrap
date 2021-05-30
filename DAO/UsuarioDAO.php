<?php

require_once 'Conexao.php';

define('InserirAdministrador', 'InserirAdministradorDAO');
define('AlterarAdministrador', 'AlterarAdministradorDAO');
define('AlterarSenhaAdministrador', 'AlterarSenhaDAO');

class UsuarioDAO extends Conexao
{

    /** @var PDO */
    private $conexao;

    /** @var PDOStatement */
    private $sql;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
        $this->sql = new PDOStatement();
    }

    public function InserirUsuarioDAO(UsuarioVO $vo)
    {
        $comando_sql = 'insert into tb_usuario 
                            (nome_usuario,cpf_usuario,email_usuario,tel_usuario,endereco_usuario,senha_usuario) 
                        value (?,?,?,?,?,?)';
        $this->sql = $this->conexao->prepare($comando_sql);

        $i = 1;
        $this->sql->bindValue($i++, $vo->getNome());
        $this->sql->bindValue($i++, $vo->getCPF());
        $this->sql->bindValue($i++, $vo->getEmail());
        $this->sql->bindValue($i++, $vo->getTelefone());
        $this->sql->bindValue($i++, $vo->getEndereco());
        $this->sql->bindValue($i++, $vo->getSenha());

        try {
            $this->sql->execute();
            return 5;
        } catch (Exception $ex) {
            //parent::GravarErro($ex->getMessage(), $vo->getIdUser(), InserirAdministrador);
            return -1;
        }
    }

    public function AlterarUsuarioDAO(UsuarioVO $vo)
    {
        $comando_sql = 'update tb_usuario
                            set email_usuario = ?,
                                tel_usuario = ?,
                                endereco_usuario =?
                            where id_usuario = ?';
        $this->sql = $this->conexao->prepare($comando_sql);

        $i = 1;
        $this->sql->bindValue($i++, $vo->getEmail());
        $this->sql->bindValue($i++, $vo->getTelefone());
        $this->sql->bindValue($i++, $vo->getEndereco());
        $this->sql->bindValue($i++, $vo->getIdUser());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), $vo->getIdUser(), AlterarAdministrador);
            return -1;
        }
    }

    public function DetalharUsuarioDAO($idUser)
    {
        $comando_sql = 'select id_usuario, 
                               nome_usuario, 
                               cpf_usuario, 
                               email_usuario, 
                               tel_usuario, 
                               endereco_usuario, 
                               senha_usuario 
                            from tb_usuario 
                            where id_usuario = ?';
        $this->sql = $this->conexao->prepare($comando_sql);

        $i = 1;
        $this->sql->bindValue($i++, $idUser);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        return $this->sql->fetchAll();
    }

    public function ValidarLoginDAO($cpf)
    {
        $comando_sql = 'select id_usuario,
                               nome_usuario,
                               senha_usuario
                            from tb_usuario
                            where cpf_usuario = ?';
        $this->sql = $this->conexao->prepare($comando_sql);

        $i = 1;
        $this->sql->bindValue($i++, $cpf);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        return $this->sql->fetchAll();
    }

    public function RecuperarSenhaAtualDAO($idUser)
    {
        $comando_sql = 'select senha_usuario
                            from tb_usuario
                            where id_usuario = ?';
        $this->sql = $this->conexao->prepare($comando_sql);

        $i=1;
        $this->sql->bindValue($i++, $idUser);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        return $this->sql->fetchAll();
    }

    public function AlterarSenhaDAO($idUser, $senha)
    {
        $comando_sql = 'update tb_usuario
                            set senha_usuario = ?
                            where id_usuario = ?';
        $this->sql = $this->conexao->prepare($comando_sql);

        $i=1;
        $this->sql->bindValue($i++, $senha);
        $this->sql->bindValue($i++, $idUser);

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), $idUser, AlterarSenhaAdministrador);
            return -1;
        }
    }
}
