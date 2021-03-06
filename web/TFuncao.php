<?php

abstract class TFuncoes {

    /*
     * Verifica se o usuário está logado
     *
     * */
    public static function VerificaLogin($index = false){

        session_start();
        if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != true) {
            if($index){
                header("Location: login.php");
            }else
                header("Location: ../login.php");
        }
    }

    public static function AddConexao() {

        $host = "35.198.39.146";
        //$host = "localhost";
        $username = "locar";
        //$username = "root";
        $password = "locar258chinelo";
        //$password = "";
        $db_name = "locar";

        $conn = new mysqli($host, $username, $password, $db_name);
        if ($conn->connect_error) {
            die("Falha na Conexão com o banco" . $conn->connect_error);
        } else
            return $conn;
    }

    /* Passar por parametro campos ou um where
     * Ex: ('pessoa', 'nome, cpf')
     *  ('pessoa', 'nome, cpf', 'cpf = 0000000000')    */

    public static function Select($tabela, $campos = false, $where = false) {
        $db = TFuncoes::AddConexao();

        $cp = (!$campos) ? ' * ' : $campos;
        $busca = (!$where) ? '' : ' where ' . $where;

        $resul = $db->query("select $cp from $tabela $busca");
        if ($resul->num_rows > 0) {
            while ($row = $resul->fetch_assoc()) {

                $dados[] = $row;
            }
            return $dados;
        } else {
            return false;
        }
    }
    /*
     *Passar sql que deseja executar por parametro*/
    public static function ExecSql($sql) {
        $db = TFuncoes::AddConexao();

        $resul = $db->query($sql);
        if($resul){
//        var_dump('asd');
        if ($resul->num_rows > 0) {
            while ($row = $resul->fetch_assoc()) {

                $dados[] = $row;
            }
            return $dados;
        }} else {
            return false;
        }
    }

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
            return '<script src="./dados/js/jquery-3.3.1.min.js" type="text/javascript"></script>
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
            return '<script src="../dados/js/jquery-3.3.1.min.js" type="text/javascript"></script>
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
                                <a href="./pages/cad_cliente.php">
                                    <div class="row">
                                        <i class="material-icons">people</i> 
                                        <span>Clientes</span>
                                    </div>
                                 </a>
                            </li>
                            <li>
                                <a href="./pages/veiculo.php">
                                    <div class="row">
                                        <i class="material-icons">directions_car</i>
                                        <span>Carros</span>
                                    </div>
                                 </a>
                            </li>
                            <li>
                                <a href="./pages/gerenciar_relatorio.php">
                                    <div class="row">
                                        <i class="material-icons">print</i>
                                        <span> Relatórios</span>
                                    </div>
                                 </a>
                            </li>
                            <li>
                                <a href="./pages/cad_funcionarios.php">
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
                                    <div class="row">
                                        <i class="material-icons">home</i>
                                        <span>Locação</span>
                                    </div>
                                 </a>
                            </li>
                            <li>
                                <a href="./cad_cliente.php">
                                    <div class="row">
                                        <i class="material-icons">people</i> 
                                        <span>Clientes</span>
                                    </div>
                                 </a>
                            </li>
                            <li>
                                <a href="./veiculo.php">
                                    <div class="row">
                                        <i class="material-icons">directions_car</i>
                                        <span>Carros</span>
                                    </div>
                                 </a>
                            </li>
                            <li>
                                <a href="./gerenciar_relatorio.php">
                                    <div class="row">
                                        <i class="material-icons">print</i>
                                        <span> Relatórios</span>
                                    </div>
                                 </a>
                            </li>
                            <li>
                                <a href="./cad_funcionarios.php">
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

    public static function AddTopo($index = false) {
        $super = ($_SESSION["user_permissao"] == 1)?'Supervisor':'';
        $img = ($_SESSION["user_permissao"] == 1)?'supervised_user_circle':'account_circle';
        $logoff = ($index) ? './logoff.php': '../logoff.php';
        return '<header class="main-header">
                <a class="logo" href="index.php">
                    <span class="logo-mini"><b>LV</b></span>
                    <span class="logo-lg"><b>Loc</b>Vec</span>
                </a>
                <nav class="navbar navbar-static-top">
                    <a class="material-icons text-white" id="menu-toggle" href="#" data-toggle="push-menu" role="button">menu</a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav navbar-expand">
                            <li class="col-10 col-lg-10 dropdown user user-menu nav-item " >
                                <a class=" dropdown-toggle" href="#" data-toggle="dropdown">                         
                                    <span class="material-icons text-white">'.$img.'</span>
                                    <span class="hidden-xs">'. $_SESSION["user_nome"].'</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-body">Cargo: '.$_SESSION["user_cargo"].'</li>
                                    <li class="user-body">'.$super.'</li>
                                    <li class="user-footer">
                                    <div class="offset-8">
                                        <a href="'.$logoff.'" class="btn btn-default btn-flat btn-block">Sair</a>
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
