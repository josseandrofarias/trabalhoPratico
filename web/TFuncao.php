<?php

abstract class TFuncoes {

    public static function AddCssLogin() {
        return'<link rel="stylesheet" href="./dados/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="./dados/css/AdminLTE.min.css">
        <link rel="stylesheet" href="./dados/css/site.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> 
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">';
    }

    public static function AddCss($index) {
        if ($index) {
            return '<link rel="stylesheet" href="./dados/css/bootstrap.min.css">
<link rel="stylesheet" href="./dados/css/font-awesome.min.css">
<link rel="stylesheet" href="./dados/css/AdminLTE.min.css">
<link rel="stylesheet" href="./dados/css/_all-skins.min.css">
        <link rel="stylesheet" href="./dados/css/site.css">
            <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">';
        } else {
            return '<link rel="stylesheet" href="../dados/css/bootstrap.min.css">
<link rel="stylesheet" href="../dados/css/font-awesome.min.css">
<link rel="stylesheet" href="../dados/css/AdminLTE.min.css">
<link rel="stylesheet" href="../dados/css/_all-skins.min.css">
        <link rel="stylesheet" href="../dados/css/site.css">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">';
        }
    }

    public static function AddJs($index) {
        if ($index) {
            return '<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="./dados/js/bootstrap.min.js" type="text/javascript"></script>
                <script src="./dados/js/adminlte.min.js" type="text/javascript"></script>
                <script src="./dados/js/demo.js" type="text/javascript"></script>
                <script src="./dados/js/bootbox.min.js" type="text/javascript"></script>
                <!-- Icons -->
                <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
                <script>
                    feather.replace()
                </script>
                <!-- Graphs -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>';
        } else {
            return '<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="../dados/js/bootstrap.min.js" type="text/javascript"></script>
                <script src="../dados/js/adminlte.min.js" type="text/javascript"></script>
                <script src="../dados/js/demo.js" type="text/javascript"></script>
                <script src="../dados/js/bootbox.min.js" type="text/javascript"></script>
                <!-- Icons -->
                <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
                <script>
                    feather.replace()
                </script>
                <!-- Graphs -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>';
        }
    }

    public static function AddMenuLateral($tipo) {
        if ($tipo) {
            return '<aside class="main-sidebar">
                    <section class="sidebar" style="height: auto;">
                        <ul class="sidebar-menu tree" data-widget="tree">
                            <!--<li class="header">Opções de navegação</li>-->
                            <li>
                                <a href="./index.php">
                                    <div class="row">
                                        <i class="material-icons">home</i>
                                        <span>Locação</span>
                                    </div>
                                 </a>
                            </li>
                            <li>
                                <a href="./index.php">
                                    <div class="row">
                                        <i class="material-icons">people</i> 
                                        <span>Clientes</span>
                                    </div>
                                 </a>
                            </li>
                            <li>
                                <a href="./index.php">
                                    <div class="row">
                                        <i class="material-icons">directions_car</i>
                                        <span>Carros</span>
                                    </div>
                                 </a>
                            </li>
                            <li>
                                <a href="./index.php">
                                    <div class="row">
                                        <i class="material-icons">print</i>
                                        <span> Relatoórios</span>
                                    </div>
                                 </a>
                            </li>
                            <li>
                                <a href="./index.php">
                                    <div class="row">
                                        <i class="material-icons">work</i>
                                        <span>Funcionários</span>
                                    </div>
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

    public static function AddPainelCor() {
        return '<aside class="control-sidebar control-sidebar-dark">
                <div>
                    <div class="col-xs-12">
                        <div id="sel_cores">
                            <div id="control-sidebar-theme-demo-options-tab" class="tab-pane active">
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="control-sidebar-bg"></div>';
    }

    public static function AddTopo() {
        return '<header class="main-header">
                <a class="logo" href="index.php">
                    <span class="logo-mini"><b>LV</b></span>
                    <span class="logo-lg"><b>Loc</b>Vec</span>
                </a>
                <nav class="navbar navbar-static-top">
                    <a class="material-icons text-white" id="menu-toggle" href="#" data-toggle="push-menu" role="button">menu</a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav navbar-expand">
                            <li class="col-9 dropdown user user-menu nav-item ">
                                <a class=" dropdown-toggle" href="#" data-toggle="dropdown">                         
                                    <span class="material-icons text-white">account_circle</span>
                                    <span class="hidden-xs">Usuário</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-body">Usuário: Master</li>
                                    <li class="user-footer">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <a class="btn btn-success btn-flat btn-block" href="?acao=logoff&amp;pgn=inicio">Ajustes</a>
                                            </div>
                                            <div class="col-sm-4">
                                                <a class="btn btn-default btn-flat btn-block" href="?acao=sair&amp;pgn=inicio">Sair</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="col-3 nav-item">
                                <a href="#" data-toggle="control-sidebar">
                                    <span data-feather="settings"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>';
    }

}
