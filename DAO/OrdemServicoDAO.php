<?php

require_once 'Conexao.php';

define('InserirOrdemServico', 'InserirOrdemServicoDAO');
define('AlterarOrdemServico', 'AlterarOrdemServicoDAO');
define('EncerrarOrdemServico', 'ExcluirOrdemServicoDAO');

class OrdemServicoDAO extends Conexao
{

    public function InserirOrdemServicoDAO(OrdemServicoVO $vo, $idUser)
    {

        $conexao = parent::retornaConexao();
        $comando_sql = 'insert into tb_ordem_servico
                        (
                            data_servico,
                            desc_servico,
                            valor_servico,
                            id_func,
                            id_cliente,
                            id_usuario
                        )
                        value (?,?,?,?,?,?)';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $i = 1;
        $sql->bindValue($i++, $vo->getDataServico());
        $sql->bindValue($i++, $vo->getDescServico());
        $sql->bindValue($i++, $vo->getValorServico());
        $sql->bindValue($i++, $vo->getIdFunc());
        $sql->bindValue($i++, $vo->getIdCliente());
        $sql->bindValue($i++, $vo->getIduser());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), $idUser, InserirOrdemServico);
            return -1;
        }
    }

    public function AlterarOrdemServicoDAO(OrdemServicoVO $vo, $idUser)
    {

        $conexao = parent::retornaConexao();
        $comando_sql = 'update tb_ordem_servico
                        set desc_servico=?,
                        valor_servico=?,
                        id_func=?,
                        id_cliente=?,
                        id_usuario=?
                    where id_ordem_servico=?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $i = 1;
        $sql->bindValue($i++, $vo->getDescServico());
        $sql->bindValue($i++, $vo->getValorServico());
        $sql->bindValue($i++, $vo->getIdFunc());
        $sql->bindValue($i++, $vo->getIdCliente());
        $sql->bindValue($i++, $vo->getIduser());
        $sql->bindValue($i++, $vo->getIdServico());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), $idUser, AlterarOrdemServico);
            return -1;
        }
    }

    public function DetalharOrdemServicoDAO($idOrdemServico)
    {
        $conexao = parent::retornaConexao();
        $comando_sql = 'select
                            serv.id_ordem_servico,
                            serv.desc_servico,
                            serv.valor_servico,
                            serv.id_func,
                            serv.id_cliente
                        from tb_ordem_servico as serv
                        where serv.id_ordem_servico=?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $i = 1;
        $sql->bindValue($i++, $idOrdemServico);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        return $sql->fetchAll();
    }

    public function PesquisarOrdemServicoAndamentoDAO()
    {
        $conexao = parent::retornaConexao();
        $comando_sql = 'select
                            serv.id_ordem_servico,
                            serv.data_servico,
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

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        return $sql->fetchAll();
    }

    public function PesquisarOrdemServicoEncerradoDAO()
    {
        $conexao = parent::retornaConexao();
        $comando_sql = 'select
                            serv.id_ordem_servico,
                            serv.data_servico,
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

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        return $sql->fetchAll();
    }

    public function EncerrarOrdemServicoDAO(OrdemServicoVO $vo, $idUser)
    {
        $conexao = parent::retornaConexao();
        $comando_sql = 'update tb_ordem_servico
                        set data_remover = ?
                        where id_ordem_servico = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $i = 1;
        $sql->bindValue($i++, $vo->getDataRemover());
        $sql->bindValue($i++, $vo->getIdServico());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), $idUser, EncerrarOrdemServico);
            return -1;
        }
    }
}
