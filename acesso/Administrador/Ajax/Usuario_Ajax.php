<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/CTRL/UsuarioCTRL.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/VO/UsuarioVO.php';

    $ctrl = new UsuarioCTRL();

    if(isset($_POST['email_adm']) && isset($_POST['tel_adm']) && isset($_POST['endereco_adm']) && $_POST['acao'] == 'A'){
        $vo = new UsuarioVO();
        
        $vo->setEmail($_POST['email_adm']);
        $vo->setTelefone($_POST['tel_adm']);
        $vo->setEndereco($_POST['endereco_adm']);

        $ret = $ctrl->AlterarUsuarioCTRL($vo);
        echo $ret;
    }
