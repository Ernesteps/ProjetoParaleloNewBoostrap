<?php

if (isset($_GET['ret'])) {
    $ret = $_GET['ret'];
}

if (isset($ret)) {
    switch ($ret) {
        case -2:
?>
            <script>swal("Aviso", "Essa entidade está sendo usado.", "warning");</script>;
        <?php
            break;

        case -1:
        ?>
            <script>swal("Erro", "Ops, algo deu de errado.", "error");</script>;
        <?php
            break;

        case 1:
        ?>
            <script> swal("Sucesso", "Operação realizada.", "success");</script>;
        <?php
            break;
    }
}
