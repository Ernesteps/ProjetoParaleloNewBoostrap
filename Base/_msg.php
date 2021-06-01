<?php

if (isset($_GET['ret'])) {
    $ret = $_GET['ret'];
}

if (isset($ret)) {
    switch ($ret) {

        case -5:
?>
            <script>
                swal("Aviso", "A senha digitada está incorreta.", "warning");
            </script>;
        <?php
            break;

        case -4:
        ?>
            <script>
                swal("Aviso", "Usuário não encontrado.", "warning");
            </script>;
        <?php
            break;

        case -3:
        ?>
            <script>
                swal("Aviso!", "As senhas digitadas não coincidem.", "warning");
            </script>;
        <?php
            break;

        case -2:
        ?>
            <script>
                swal("Aviso!", "Essa entidade está sendo usado.", "warning");
            </script>;
        <?php
            break;

        case -1:
        ?>
            <script>
                swal("Erro!", "Ops, algo deu de errado.", "error");
            </script>;
        <?php
            break;

        case 0:
        ?>
            <script>
                swal("Aviso!", "Há campo sem preenchimento.", "warning");
            </script>;
        <?php
            break;

        case 1:
        ?>
            <script>
                swal("Sucesso!", "Operação realizada.", "success");
            </script>;
        <?php
            break;

        case 5:
        ?>
            <script>
                swal({
                    title: "Sucesso!",
                    text: "Administrador cadastrado.",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#4CAF50",
                    confirmButtonText: "OK",
                    closeOnConfirm: true,
                    closeOnCancel: false
                }, function() {
                    window.location = "adm_signin.php";
                });
            </script>;
<?php
            break;
    }
}
