<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/CTRL/UsuarioCTRL.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParaleloNewBoostrap/CTRL/UtilCTRL.php';

$ctrl = new UsuarioCTRL();
$dadosWelcome = $ctrl->DetalharUsuarioCTRL('');

if(isset($_GET['close']) && $_GET['close'] == 1){
    UtilCTRL::Deslogar();
}

?>
<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">

        <div class="name" style = "color: white; font-size:18px;" data-toggle="" aria-haspopup="true" aria-expanded="false">Bem-Vindo</div>

        <div class="info-container">
            <div class="name" data-toggle="dropdown" style = "color: white; font-size:12px;" aria-haspopup="true" aria-expanded="false"> <?= $dadosWelcome[0]['nome_usuario'] ?></div>
            <div class="btn-group user-helper-dropdown"></div>
        </div>

    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">Menu</li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">perm_identity</i>
                    <span>Usuários</span>
                </a>
                <ul>
                    <li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">face</i>
                            <span>Cliente</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="adm_cliente.php">
                                    <span>Cadastrar Cliente</span>
                                </a>
                            </li>
                            <li>
                                <a href="adm_consultarclientes.php">
                                    <span>Consultar Cliente</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">face</i>
                            <span>Funcionário</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="adm_funcionario.php">
                                    <span>Cadastrar Funcionário</span>
                                </a>
                            </li>
                            <li>
                                <a href="adm_consultarfuncionarios.php">
                                    <span>Consultar Funcionário</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">assignment</i>
                    <span>Ordem de Serviço</span>
                </a>
                <ul>
                    <li class="active">
                        <a href="adm_servico.php">
                            <i class="material-icons">assignment_ind</i>
                            <span>Novo Ordem de Serviço</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="adm_consultarservicos.php">
                            <i class="material-icons">search</i>
                            <span>Consultar Ordens de Serviços</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="active">
                <a href="adm_meusdados.php">
                    <i class="material-icons">account_circle</i>
                    <span>Meus Dados</span>
                </a>
            </li>

            <li class="active">
                <a href="adm_mudarsenha.php">
                    <i class="material-icons">account_circle</i>
                    <span>Mudar Senha</span>
                </a>
            </li>

            <li class="active">
                <a href="../../Base/_menu.php?close=1">
                    <i class="material-icons">exit_to_app</i>
                    <span>Sair</span>
                </a>
            </li>

        </ul>
    </div>
