<?php

require_once 'Conexao.php';

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

        $i=1;
        $this->sql->bindValue($i++, $vo->getNome());
        $this->sql->bindValue($i++, $vo->getCPF());
        $this->sql->bindValue($i++, $vo->getEmail());
        $this->sql->bindValue($i++, $vo->getTelefone());
        $this->sql->bindValue($i++, $vo->getEndereco());
        $this->sql->bindValue($i++, $vo->getSenha());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function ConsultarUsuarioDAO()
    {
        $comando_sql = 'select id_usuario, 
                               nome_usuario, 
                               cpf_usuario, 
                               email_usuario, 
                               tel_usuario, 
                               endereco_usuario, 
                               senha_usuario 
                            from tb_usuario 
                            order by nome_usuario';
        $this->sql = $this->conexao->prepare($comando_sql);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        return $this->sql->fetchAll();
    }
}
