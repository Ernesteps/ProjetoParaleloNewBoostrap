<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/CTRL/UsuarioCTRL.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/VO/UsuarioVO.php';

    $ctrl = new UsuarioCTRL();

    if(isset($_POST['email_adm']) && isset($_POST['tel_adm']) && isset($_POST['endereco_adm']) && $_POST['acao'] == 'A'){
        $vo = new UsuarioVO();

        $email = $_POST['email_adm'];
        $telefone = $_POST['tel_adm'];
        $endereco = $_POST['endereco_adm'];
        
        $vo->setEmail($email);
        $vo->setTelefone($telefone);
        $vo->setEndereco($endereco);

        $ret = $ctrl->AlterarUsuarioCTRL($vo);
        echo $ret;
    }
?>