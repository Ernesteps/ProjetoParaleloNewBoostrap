<?php

require_once 'Conexao.php';

define('InserirCliente', 'InserirClienteDAO');
define('AlterarCliente', 'AlterarClienteDAO');
define('ExcluirCliente', 'ExcluirClienteDAO');

class ClienteDAO extends Conexao
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

    public function InserirClienteDAO(ClienteVO $vo, $idUser)
    {
        $comando_sql = 'insert into tb_cliente 
                            (nome_cliente,cpf_cliente,email_cliente,tel_cliente,end_cliente,id_usuario) 
                        value (?,?,?,?,?,?)';
        $this->sql = $this->conexao->prepare($comando_sql);

        $i = 1;
        $this->sql->bindValue($i++, $vo->getNomeCliente());
        $this->sql->bindValue($i++, $vo->getCPFCliente());
        $this->sql->bindValue($i++, $vo->getEmailCliente());
        $this->sql->bindValue($i++, $vo->getTelCliente());
        $this->sql->bindValue($i++, $vo->getEnderecoCliente());
        $this->sql->bindValue($i++, $vo->getIduser());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), $idUser, InserirCliente);
            return -1;
        }
    }

    public function AlterarClienteDAO(ClienteVO $vo, $idUser)
    {
        $comando_sql = 'update tb_cliente 
                            set nome_cliente=?,
                                cpf_cliente=?,
                                email_cliente=?,
                                tel_cliente=?,
                                end_cliente=? 
                            where id_cliente = ?';
        $this->sql = $this->conexao->prepare($comando_sql);

        $i = 1;
        $this->sql->bindValue($i++, $vo->getNomeCliente());
        $this->sql->bindValue($i++, $vo->getCPFCliente());
        $this->sql->bindValue($i++, $vo->getEmailCliente());
        $this->sql->bindValue($i++, $vo->getTelCliente());
        $this->sql->bindValue($i++, $vo->getEnderecoCliente());
        $this->sql->bindValue($i++, $vo->getIdUser_cliente());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), $idUser, AlterarCliente);
            return -1;
        }
    }

    public function DetalharCliente($idCliente)
    {
        $comando_sql = 'select  cli.id_cliente,
                                cli.nome_cliente,
                                cli.cpf_cliente,
                                cli.email_cliente,
                                cli.tel_cliente,
                                cli.end_cliente
                            from tb_cliente as cli
                            where cli.id_cliente=?';
        $this->sql = $this->conexao->prepare($comando_sql);

        $i = 1;
        $this->sql->bindValue($i++, $idCliente);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        return $this->sql->fetchAll();
    }

    public function ExcluirClienteDAO($idCliente, $idUser)
    {
        $comando_sql = 'delete from tb_cliente where id_cliente = ?';
        $this->sql = $this->conexao->prepare($comando_sql);
        $this->sql->bindValue(1, $idCliente);

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), $idUser, ExcluirCliente);
            return -2;
        }
    }

    public function ConsultarClienteDAO()
    {
        $comando_sql = 'select  id_cliente, 
                                nome_cliente, 
                                cpf_cliente, 
                                email_cliente, 
                                tel_cliente, 
                                end_cliente 
                            from tb_cliente 
                            order by nome_cliente';
        $this->sql = $this->conexao->prepare($comando_sql);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        return $this->sql->fetchAll();
    }

    public function VerificarCPFCadastroClienteDAO($cpf)
    {
        $comando_sql = 'select count(cpf_cliente) as counter
                        from tb_cliente where cpf_cliente = ?';
        $this->sql = $this->conexao->prepare($comando_sql);
        $this->sql->bindValue(1, $cpf);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        $result = $this->sql->fetchAll();
        return $result[0]['counter'];
    }
}
