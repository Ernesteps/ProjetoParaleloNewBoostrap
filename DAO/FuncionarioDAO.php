<?php

require_once 'Conexao.php';

define('InserirFuncionario', 'InserirFuncionarioDAO');
define('AlterarFuncionario', 'AlterarFuncionarioDAO');
define('ExcluirFuncionario', 'ExcluirFuncionarioDAO');

class FuncionarioDAO extends Conexao
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

    public function InserirFuncionarioDAO(FuncionarioVO $vo, $idUser)
    {
        $comando_sql = 'insert into tb_funcionario 
                            (nome_func,cpf_func,email_func,tel_func,endereco_func,id_usuario) 
                        value (?,?,?,?,?,?)';
        $this->sql = $this->conexao->prepare($comando_sql);

        $i = 1;
        $this->sql->bindValue($i++, $vo->getNome_func());
        $this->sql->bindValue($i++, $vo->getCPF_Func());
        $this->sql->bindValue($i++, $vo->getEmail_func());
        $this->sql->bindValue($i++, $vo->getTel_func());
        $this->sql->bindValue($i++, $vo->getEndereco_func());
        $this->sql->bindValue($i++, $vo->getID_user());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), $idUser, InserirCliente);
            return -1;
        }
    }

    public function AlterarFuncionarioDAO(FuncionarioVO $vo, $idUser)
    {
        $comando_sql = 'update tb_funcionario 
                            set nome_func=?,
                                cpf_func=?,
                                email_func=?,
                                tel_func=?,
                                endereco_func=? 
                            where id_func=?';
        $this->sql = $this->conexao->prepare($comando_sql);

        $i = 1;
        $this->sql->bindValue($i++, $vo->getNome_func());
        $this->sql->bindValue($i++, $vo->getCPF_Func());
        $this->sql->bindValue($i++, $vo->getEmail_func());
        $this->sql->bindValue($i++, $vo->getTel_func());
        $this->sql->bindValue($i++, $vo->getEndereco_func());
        $this->sql->bindValue($i++, $vo->getID_func());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), $idUser, AlterarFuncionario);
            return -1;
        }
    }

    public function DetalharFuncionario($idFuncionario)
    {
        $comando_sql = 'select  func.id_func,
                                func.nome_func,
                                func.cpf_func,
                                func.email_func,
                                func.tel_func,
                                func.endereco_func
                            from tb_funcionario as func
                            where func.id_func = ?';
        $this->sql = $this->conexao->prepare($comando_sql);

        $i = 1;
        $this->sql->bindValue($i++, $idFuncionario);
        $this->sql->setfetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        return $this->sql->fetchAll();
    }

    public function ExcluirFuncionarioDAO($idFuncionario, $idUser)
    {
        $comando_sql = 'delete from tb_funcionario where id_func = ?';
        $this->sql = $this->conexao->prepare($comando_sql);
        $this->sql->bindValue(1, $idFuncionario);

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), $idUser, ExcluirFuncionario);
            return -2;
        }
    }

    public function ConsultarFuncionarioDAO()
    {
        $comando_sql = 'select  id_func, 
                                nome_func, 
                                cpf_func, 
                                email_func, 
                                tel_func, 
                                endereco_func 
                            from tb_funcionario 
                            order by nome_func';
        $this->sql = $this->conexao->prepare($comando_sql);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        return $this->sql->fetchAll();
    }

    public function VerificarCPFCadastroFuncionarioDAO($cpf)
    {
        $comando_sql = 'select count(cpf_func) as counter
                        from tb_funcionario where cpf_func = ?';
        $this->sql = $this->conexao->prepare($comando_sql);
        $this->sql->bindValue(1, $cpf);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        $result = $this->sql->fetchAll();
        return $result[0]['counter'];
    }
}
