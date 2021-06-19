<?php

require_once 'Conexao.php';

define('InserirOrdemServico', 'InserirOrdemServicoDAO');
define('AlterarOrdemServico', 'AlterarOrdemServicoDAO');
define('EncerrarOrdemServico', 'ExcluirOrdemServicoDAO');

class OrdemServicoDAO extends Conexao
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

    public function InserirOrdemServicoDAO(OrdemServicoVO $vo, $idUser)
    {
        $comando_sql = 'insert into tb_ordem_servico
                            (data_servico,desc_servico,valor_servico,id_func,id_cliente,id_usuario)
                        value (?,?,?,?,?,?)';
        $this->sql = $this->conexao->prepare($comando_sql);

        $i = 1;
        $this->sql->bindValue($i++, $vo->getDataServico());
        $this->sql->bindValue($i++, $vo->getDescServico());
        $this->sql->bindValue($i++, $vo->getValorServico());
        $this->sql->bindValue($i++, $vo->getIdFunc());
        $this->sql->bindValue($i++, $vo->getIdCliente());
        $this->sql->bindValue($i++, $vo->getIduser());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), $idUser, InserirOrdemServico);
            return -1;
        }
    }

    public function AlterarOrdemServicoDAO(OrdemServicoVO $vo, $idUser)
    {
        $comando_sql = 'update tb_ordem_servico
                            set desc_servico=?,
                                valor_servico=?,
                                id_func=?,
                                id_cliente=?,
                                id_usuario=?
                            where id_ordem_servico=?';
        $this->sql = $this->conexao->prepare($comando_sql);

        $i = 1;
        $this->sql->bindValue($i++, $vo->getDescServico());
        $this->sql->bindValue($i++, $vo->getValorServico());
        $this->sql->bindValue($i++, $vo->getIdFunc());
        $this->sql->bindValue($i++, $vo->getIdCliente());
        $this->sql->bindValue($i++, $vo->getIduser());
        $this->sql->bindValue($i++, $vo->getIdServico());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), $idUser, AlterarOrdemServico);
            return -1;
        }
    }

    public function DetalharOrdemServicoDAO($idOrdemServico)
    {
        $comando_sql = 'select
                            serv.id_ordem_servico,
                            serv.desc_servico,
                            serv.valor_servico,
                            serv.id_func,
                            serv.id_cliente
                        from tb_ordem_servico as serv
                        where serv.id_ordem_servico=?';
        $this->sql = $this->conexao->prepare($comando_sql);

        $i = 1;
        $this->sql->bindValue($i++, $idOrdemServico);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        return $this->sql->fetchAll();
    }

    public function PesquisarOrdemServicoAndamentoDAO()
    {
        $comando_sql = 'select
                            serv.id_ordem_servico,
                            date_format(serv.data_servico, "%d/%m/%Y") as data_servico,
                            serv.desc_servico,
                            serv.valor_servico,
                            cli.nome_cliente,
                            func.nome_func
                        from tb_ordem_servico as serv
                        inner join tb_cliente as cli
                            on serv.id_cliente = cli.id_cliente
                        inner join tb_funcionario as func
                            on serv.id_func = func.id_func
                        where data_remover is null';
        $this->sql = $this->conexao->prepare($comando_sql);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        return $this->sql->fetchAll();
    }

    public function PesquisarOrdemServicoEncerradoDAO()
    {
        $comando_sql = 'select
                            serv.id_ordem_servico,
                            date_format(serv.data_servico, "%d/%m/%Y") as data_servico,
                            serv.desc_servico,
                            serv.valor_servico,
                            serv.data_remover,
                            cli.nome_cliente,
                            func.nome_func
                        from tb_ordem_servico as serv
                        inner join tb_cliente as cli
                            on serv.id_cliente = cli.id_cliente
                        inner join tb_funcionario as func
                            on serv.id_func = func.id_func
                        where data_remover is not null';
        $this->sql = $this->conexao->prepare($comando_sql);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        return $this->sql->fetchAll();
    }

    public function EncerrarOrdemServicoDAO(OrdemServicoVO $vo, $idUser)
    {
        $comando_sql = 'update tb_ordem_servico
                            set data_remover = ?
                            where id_ordem_servico = ?';
        $this->sql = $this->conexao->prepare($comando_sql);

        $i = 1;
        $this->sql->bindValue($i++, $vo->getDataRemover());
        $this->sql->bindValue($i++, $vo->getIdServico());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), $idUser, EncerrarOrdemServico);
            return -1;
        }
    }
}
