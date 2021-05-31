function MensagemSucessoComMudancadePagina($tipo) {
    swal({
        title: "Sucesso!",
        text: "Operação realizada.",
        type: "success",
        showCancelButton: false,
        confirmButtonColor: "#4CAF50",
        confirmButtonText: "OK",
        closeOnConfirm: true,
        closeOnCancel: false
    }, function () {
        if ($tipo == 1)
            window.location = "adm_consultarclientes.php";

        else if ($tipo == 2)
            window.location = "adm_consultarfuncionarios.php";

        else if ($tipo == 3)
            window.location = "adm_consultarservicos.php";
    });
}

function MensagemSucessoComFunctionRefreshPage() {
    swal({
        title: "Sucesso!",
        text: "Operação realizada.",
        type: "success",
        showCancelButton: false,
        confirmButtonColor: "#4CAF50",
        confirmButtonText: "OK",
        closeOnConfirm: true,
        closeOnCancel: false
    }, function () {
        document.location.reload(true);
    });
}

function MensagemSucessoSemFunction() {
    swal("Sucesso!", "Operação Realizada.", "success");
}

function MensagemAlertaComFunctionRefreshPage() {
    swal({
        title: "Alerta!",
        text: "Essa entidade está sendo usado.",
        type: "warning",
        showCancelButton: false,
        confirmButtonColor: "#FF9800",
        confirmButtonText: "OK",
        closeOnConfirm: true,
        closeOnCancel: false
    }, function () {
        document.location.reload(true);
    });
}

function MensagemAlertaSemFunction() {
    swal("Alerta!", "Essa entidade está sendo usado.", "warning");
}

function MensagemErroComFunctionRefreshPage() {
    swal({
        title: "Erro!",
        text: "Ops, algo deu de errado.",
        type: "error",
        showCancelButton: false,
        confirmButtonColor: "#F44336",
        confirmButtonText: "OK",
        closeOnConfirm: true,
        closeOnCancel: false
    }, function () {
        document.location.reload(true);
    });
}

function MensagemErroSemFunction() {
    swal("Erro!", "Ops, algo deu errado.", "error");
}

function ExclusaoFuncionario(id, nome) {
    swal({
        title: "Tem Certeza?",
        text: "Você está prestes a deletar a entidade: " + nome,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim",
        closeOnConfirm: false
    }, function () {
        $.post("Ajax/Funcionario_Ajax.php", {
            id_func: id,
            acao: 'R'

        }, function (retorno_chamada) {

            if (retorno_chamada == -2) {
                MensagemAlertaSemFunction();
            }

            else if (retorno_chamada == -1) {
                MensagemErroComFunctionRefreshPage();
            }

            else {
                MensagemSucessoComFunctionRefreshPage();
            }
        });
    });
    return false;
}

function ExclusaoCliente(id, nome) {
    swal({
        title: "Tem Certeza?",
        text: "Você está prestes a deletar a entidade: " + nome,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim",
        closeOnConfirm: false
    }, function () {
        $.post("Ajax/Cliente_Ajax.php", {
            id_cliente: id,
            acao: 'R'

        }, function (retorno_chamada) {

            if (retorno_chamada == -2) {
                MensagemAlertaSemFunction();
            }

            else if (retorno_chamada == -1) {
                MensagemErroComFunctionRefreshPage();
            }

            else {
                MensagemSucessoComFunctionRefreshPage();
            }

        });
    });
    return false;
}

function ExclusaoOrdemServico(id, nome, data) {
    swal({
        title: "Tem Certeza?",
        text: "Você está prestes a encerrar Ordem de Serviço: " + nome + ", da data referente a: " + data,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim",
        closeOnConfirm: false
    }, function () {
        $.post("Ajax/Ordem_servico_Ajax.php", {
            id_servico: id,
            acao: 'A'

        }, function (retorno_chamada) {

            if (retorno_chamada == -1) {
                MensagemErroComFunctionRefreshPage();
            }

            else {
                MensagemSucessoComFunctionRefreshPage();
            }
        });
    });
    return false;
}

function ValidarSenhaAtual(senha_atual_digitado) {

    $.post("Ajax/Validar_Senha_Atual_Ajax.php",
        {
            senha_atual: senha_atual_digitado
        }, function (retorno_chamada) {
            if (retorno_chamada == 1) {
                $("#val_senha_atual").hide();
                $("#Senha_atual").hide();
                $("#SenhaAtual").hide();
                $("#SenhaPreenchida").show();
                $("#Nova_senha").focus();
            } else {
                $("#val_senha_atual").html('A senha digitada não coincide com o do Usuário logado.');
                $("#val_senha_atual").show();
            }
        });
    return false;
}

function ValidarCPFCadastroCliente(cpf, cpfbuscado) {

    if (cpfbuscado == null || cpf != cpfbuscado) {
        if (cpf.trim() != '') {
            $.post('Ajax/Verificar_Duplicidade_CPF_Cliente.php',
                { cpf_cliente: cpf },
                function (retorno) {
                    if (retorno == 1) {
                        $("#CPF").val('');
                        $("#val_cpf").html('O CPF: ' + cpf + ', que está tentando incluir ou alterar, já está cadastrado.');
                        $("#val_cpf").show();
                    } else {
                        $("#val_cpf").hide();
                    }
                });
        }
    } else if (cpf == cpfbuscado) {
        $("#val_cpf").hide();
    }
}

function ValidarCPFCadastroFuncionario(cpf, cpfbuscado) {

    if (cpfbuscado == null || cpf != cpfbuscado) {
        if (cpf.trim() != '') {
            $.post('Ajax/Verificar_Duplicidade_CPF_Funcionario.php',
                { cpf_funcionario: cpf },
                function (retorno) {
                    if (retorno == 1) {
                        $("#CPF").val('');
                        $("#val_cpf").html('O CPF: ' + cpf + ', que está tentando incluir ou alterar, já está cadastrado.');
                        $("#val_cpf").show();
                    } else {
                        $("#val_cpf").hide();
                    }
                });
        }
    } else if (cpf == cpfbuscado) {
        $("#val_cpf").hide();
    }
}

function InserirCliente() {

    var nome = $("#nome").val().trim();
    var CPF = $("#CPF").val().trim();
    var email = $("#email").val().trim();
    var telefone = $("#telefone").val().trim();
    var endereco = $("#endereco").val().trim();

    $.post("Ajax/Cliente_Ajax.php",
        {
            nome_cliente: nome,
            cpf_cliente: CPF,
            email_cliente: email,
            tel_cliente: telefone,
            end_cliente: endereco,
            acao: 'I'
        }, function (retorno_chamada) {
            $("#nome").val('');
            $("#CPF").val('');
            $("#email").val('');
            $("#telefone").val('');
            $("#endereco").val('');

            if (retorno_chamada == 1) { MensagemSucessoSemFunction(); }
            else { MensagemErroSemFunction(); }
        });
    return false;
}

function AlterarCliente($tipo) {

    var cod_user = $("#cod").val().trim();
    var nome = $("#nome").val().trim();
    var CPF = $("#CPF").val().trim();
    var email = $("#email").val().trim();
    var telefone = $("#telefone").val().trim();
    var endereco = $("#endereco").val().trim();

    $.post("Ajax/Cliente_Ajax.php",
        {
            cod_cliente: cod_user,
            nome_cliente: nome,
            cpf_cliente: CPF,
            email_cliente: email,
            tel_cliente: telefone,
            end_cliente: endereco,
            acao: 'A'
        }, function (retorno_chamada) {
            if (retorno_chamada == 1) { MensagemSucessoComMudancadePagina($tipo); }
            else { MensagemErroSemFunction(); }
        });
    return false;
}

function AtualizarUsuario() {

    var email = $("#email").val().trim();
    var telefone = $("#telefone").val().trim();
    var endereco = $("#endereco").val().trim();

    $.post("Ajax/Usuario_Ajax.php",
        {
            email_adm: email,
            tel_adm: telefone,
            endereco_adm: endereco,
            acao: 'A'
        }, function (retorno_chamada) {
            if (retorno_chamada == 1) { MensagemSucessoSemFunction(); }
            else { MensagemErroSemFunction(); }
        });
    return false;
}

function InserirFuncionario() {

    var nome = $("#nome").val().trim();
    var CPF = $("#CPF").val().trim();
    var email = $("#email").val().trim();
    var telefone = $("#telefone").val().trim();
    var endereco = $("#endereco").val().trim();

    $.post("Ajax/Funcionario_Ajax.php",
        {
            nome_func: nome,
            cpf_func: CPF,
            email_func: email,
            tel_func: telefone,
            end_func: endereco,
            acao: 'I'
        }, function (retorno_chamada) {
            $("#nome").val('');
            $("#CPF").val('');
            $("#email").val('');
            $("#telefone").val('');
            $("#endereco").val('');

            if (retorno_chamada == 1) { MensagemSucessoSemFunction(); }
            else { MensagemErroSemFunction(); }
        });
    return false;
}

function AlterarFuncionario($tipo) {

    var cod_funcionario = $("#cod").val().trim();
    var nome = $("#nome").val().trim();
    var CPF = $("#CPF").val().trim();
    var email = $("#email").val().trim();
    var telefone = $("#telefone").val().trim();
    var endereco = $("#endereco").val().trim();

    $.post("Ajax/Funcionario_Ajax.php",
        {
            cod_func: cod_funcionario,
            nome_func: nome,
            cpf_func: CPF,
            email_func: email,
            tel_func: telefone,
            end_func: endereco,
            acao: 'A'
        }, function (retorno_chamada) {
            if (retorno_chamada == 1) { MensagemSucessoComMudancadePagina($tipo); }
            else { MensagemErroSemFunction(); }
        });
    return false;
}

function InserirOrdemServico() {

    var funcionario = $("#funcionario").val().trim();
    var cliente = $("#cliente").val().trim();
    var descricao = $("#descricao").val().trim();
    var valor = $("#valor").val().trim();

    $.post("Ajax/Ordem_Servico_Ajax.php",
        {
            id_func: funcionario,
            id_cliente: cliente,
            desc_servico: descricao,
            valor_servico: valor,
            acao: 'I'
        }, function (retorno_chamada) {

            $("#descricao").val('');
            $("#valor").val('');

            if (retorno_chamada == 1) { MensagemSucessoSemFunction(); }
            else { MensagemErroSemFunction(); }
        });
    return false;
}

function AlterarOrdemServico($tipo) {

    var cod_serv = $("#cod").val().trim();
    var funcionario = $("#funcionario").val().trim();
    var cliente = $("#cliente").val().trim();
    var descricao = $("#descricao").val().trim();
    var valor = $("#valor").val().trim();

    $.post("Ajax/Ordem_Servico_Ajax.php",
        {
            id_serv: cod_serv,
            id_func: funcionario,
            id_cliente: cliente,
            desc_servico: descricao,
            valor_servico: valor,
            acao: 'A'
        }, function (retorno_chamada) {
            if (retorno_chamada == 1) { MensagemSucessoComMudancadePagina($tipo); }
            else { MensagemErroSemFunction(); }
        });
    return false;
}
