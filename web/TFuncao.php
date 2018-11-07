<?php

abstract class TFuncoes {

    public static function AddCss($index) {
        if ($index == true) {
            return '<link rel="stylesheet" href="./dados/css/bootstrap.min.css">
<link rel="stylesheet" href="./dados/css/font-awesome.min.css">
<link rel="stylesheet" href="./dados/css/AdminLTE.min.css">
<link rel="stylesheet" href="./dados/css/_all-skins.min.css">
        <link rel="stylesheet" href="./dados/css/site.css">';
        } else {
            return '<link rel="stylesheet" href="../dados/css/bootstrap.min.css">
<link rel="stylesheet" href="../dados/css/font-awesome.min.css">
<link rel="stylesheet" href="../dados/css/AdminLTE.min.css">
<link rel="stylesheet" href="../dados/css/_all-skins.min.css">
        <link rel="stylesheet" href="../dados/css/site.css">';
        }
    }

    public static function AddJs($index) {
        if ($index == true) {
            return '<link rel="stylesheet" href="./dados/css/bootstrap.min.css">
<link rel="stylesheet" href="./dados/css/font-awesome.min.css">
<link rel="stylesheet" href="./dados/css/AdminLTE.min.css">
<link rel="stylesheet" href="./dados/css/_all-skins.min.css">
        <link rel="stylesheet" href="./dados/css/site.css">';
        } else {
            return '<link rel="stylesheet" href="../dados/css/bootstrap.min.css">
<link rel="stylesheet" href="../dados/css/font-awesome.min.css">
<link rel="stylesheet" href="../dados/css/AdminLTE.min.css">
<link rel="stylesheet" href="../dados/css/_all-skins.min.css">
        <link rel="stylesheet" href="../dados/css/site.css">';
        }
    }

    public static function AddMenuLateral($tipo) {
        if ($tipo) {
            return '<aside class="main-sidebar">
                    <section class="sidebar" style="height: auto;">
                        <ul class="sidebar-menu tree" data-widget="tree">
                            <!--<li class="header">Opções de navegação</li>-->
                            <li>
                                <a href="../index.php">
                                    <span data-feather="home"></span>
                                    <span>Locação</span>
                                </a>
                            </li>
                            <li>
                                <a href="./pages/cad_cliente.php">
                                    <span data-feather="user"></span>
                                    <span>Clientes</span>
                                </a>
                            </li>
                            <li>
                                <a href="./pages/veiculo.php">
                                    <span data-feather="shopping-cart"></span>
                                    <span>Carros</span>
                                </a>
                            </li>
                            <li>
                                <a href="./pages/relatorios.php">
                                    <span data-feather="file"></span>
                                    <span>Relatórios</span>
                                </a>
                            </li>
                            <li>
                                <a href="./pages/cad_funcionarios.php">
                                    <span data-feather="users"></span>
                                    <span>Funcionários</span>
                                </a>
                            </li>
                        </ul>
                        <!--</div>-->
                    </section>
                    <!--</nav>-->
                </aside>';
        } else {
            return '<aside class="main-sidebar">
                    <section class="sidebar" style="height: auto;">
                        <ul class="sidebar-menu tree" data-widget="tree">
                            <!--<li class="header">Opções de navegação</li>-->
                            <li>
                                <a href="../index.php">
                                    <span data-feather="home"></span>
                                    <span>Locação</span>
                                </a>
                            </li>
                            <li>
                                <a href="./cad_cliente.php">
                                    <span data-feather="user"></span>
                                    <span>Clientes</span>
                                </a>
                            </li>
                            <li>
                                <a href="./veiculo.php">
                                    <span data-feather="shopping-cart"></span>
                                    <span>Carros</span>
                                </a>
                            </li>
                            <li>
                                <a href="./relatorios.php">
                                    <span data-feather="file"></span>
                                    <span>Relatórios</span>
                                </a>
                            </li>
                            <li>
                                <a href="./cad_funcionarios.php">
                                    <span data-feather="users"></span>
                                    <span>Funcionários</span>
                                </a>
                            </li>
                        </ul>
                        <!--</div>-->
                    </section>
                    <!--</nav>-->
                </aside>';
        }
    }

    public function AddPainelCor($tipo) {
        if ($tipo) {
            
        } else {
            
        }
    }

    public function AddTopo($tipo) {
        if ($tipo) {
            
        } else {
            
        }
    }

}
