
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="Grupo2" content="">

        <title>LoCar - Locadora de veículos</title>

        <!--<link href="dados/css/materialize.min.css" rel="stylesheet">-->
        <link rel="stylesheet" href="dados/css/bootstrap.min.css">
        <link rel="stylesheet" href="dados/css/font-awesome.min.css">
        <link rel="stylesheet" href="dados/css/AdminLTE.min.css">
        <link rel="stylesheet" href="dados/css/_all-skins.min.css">
        <link rel="stylesheet" href="dados/css/site.css">

    </head>

    <body>

        <div class="wrapper" style="height: auto; min-height: 100%">

            <header class="main-header">
                <a class="logo" href="index.php">
                    <span class="logo-mini"><b>LV</b></span>
                    <span class="logo-lg"><b>Loc</b>Vec</span>
                </a>
                <nav class="navbar navbar-static-top">
                    <a id="menu-toggle" href="#" data-toggle="push-menu" role="button">
                        <span data-feather="menu"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="row nav navbar-nav navbar-expand">
                            <li class="col-9 dropdown user user-menu nav-item">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                    <!--<img class="user-image" src="imgcaminho">-->
                                    <span data-feather="user"></span>
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
            </header>
            
            <!--Menu lateral-->
            <aside class="main-sidebar">
                <section class="sidebar" style="height: auto;">
                    <ul class="sidebar-menu tree" data-widget="tree">
                        <!--<li class="header">Opções de navegação</li>-->
                        <li>
                            <a href="index.php">
                                <span data-feather="home"></span>
                                <span>Locação</span>
                            </a>
                        </li>
                        <li>
                            <a href="pages/clientes.php">
                                <span data-feather="user"></span>
                                <span>Clientes</span>
                            </a>
                        </li>
                        <li>
                            <a href="pages/veiculo.php">
                                <span data-feather="shopping-cart"></span>
                                <span>Carros</span>
                            </a>
                        </li>
                        <li>
                            <a href="pages/relatorios.php">
                                <span data-feather="file"></span>
                                <span>Relatórios</span>
                            </a>
                        </li>
                        <li>
                            <a href="pages/cad_funcionarios.php">
                                <span data-feather="users"></span>
                                <span>Funcionários</span>
                            </a>
                        </li>
                    </ul>
                    <!--</div>-->
                </section>
                <!--</nav>-->
            </aside>

            <!--centro-->
            <div class="content-wrapper" style="min-height: 717px;">
                <section class="content">

                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Locação</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group mr-2">
                                <a href="pages/cadastrar_locacao.php" class="btn btn-sm btn-outline-secondary">Cadastrar</a>
                                <a class="btn btn-sm btn-outline-secondary">Deletar</a>
                                <a class="btn btn-sm btn-outline-secondary">Editar</a>
                            </div>
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                                <span data-feather="calendar"></span>
                                Hoje
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Data Locação</th>
                                    <th>Data Devolução</th>
                                    <th>Km</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1,001</td>
                                    <td>Lorem</td>
                                    <td>ipsum</td>
                                    <td>dolor</td>
                                    <td>sit</td>
                                </tr>
                                <tr>
                                    <td>1,002</td>
                                    <td>amet</td>
                                    <td>consectetur</td>
                                    <td>adipiscing</td>
                                    <td>elit</td>
                                </tr>
                                <tr>
                                    <td>1,003</td>
                                    <td>Integer</td>
                                    <td>nec</td>
                                    <td>odio</td>
                                    <td>Praesent</td>
                                </tr>
                                <tr>
                                    <td>1,003</td>
                                    <td>libero</td>
                                    <td>Sed</td>
                                    <td>cursus</td>
                                    <td>ante</td>
                                </tr>
                                <tr>
                                    <td>1,004</td>
                                    <td>dapibus</td>
                                    <td>diam</td>
                                    <td>Sed</td>
                                    <td>nisi</td>
                                </tr>
                                <tr>
                                    <td>1,005</td>
                                    <td>Nulla</td>
                                    <td>quis</td>
                                    <td>sem</td>
                                    <td>at</td>
                                </tr>
                                <tr>
                                    <td>1,006</td>
                                    <td>nibh</td>
                                    <td>elementum</td>
                                    <td>imperdiet</td>
                                    <td>Duis</td>
                                </tr>
                                <tr>
                                    <td>1,007</td>
                                    <td>sagittis</td>
                                    <td>ipsum</td>
                                    <td>Praesent</td>
                                    <td>mauris</td>
                                </tr>
                                <tr>
                                    <td>1,008</td>
                                    <td>Fusce</td>
                                    <td>nec</td>
                                    <td>tellus</td>
                                    <td>sed</td>
                                </tr>
                                <tr>
                                    <td>1,009</td>
                                    <td>augue</td>
                                    <td>semper</td>
                                    <td>porta</td>
                                    <td>Mauris</td>
                                </tr>
                                <tr>
                                    <td>1,010</td>
                                    <td>massa</td>
                                    <td>Vestibulum</td>
                                    <td>lacinia</td>
                                    <td>arcu</td>
                                </tr>
                                <tr>
                                    <td>1,011</td>
                                    <td>eget</td>
                                    <td>nulla</td>
                                    <td>Class</td>
                                    <td>aptent</td>
                                </tr>
                                <tr>
                                    <td>1,012</td>
                                    <td>taciti</td>
                                    <td>sociosqu</td>
                                    <td>ad</td>
                                    <td>litora</td>
                                </tr>
                                <tr>
                                    <td>1,013</td>
                                    <td>torquent</td>
                                    <td>per</td>
                                    <td>conubia</td>
                                    <td>nostra</td>
                                </tr>
                                <tr>
                                    <td>1,014</td>
                                    <td>per</td>
                                    <td>inceptos</td>
                                    <td>himenaeos</td>
                                    <td>Curabitur</td>
                                </tr>
                                <tr>
                                    <td>1,015</td>
                                    <td>sodales</td>
                                    <td>ligula</td>
                                    <td>in</td>
                                    <td>libero</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>

            <!--painel mudar de cor-->
            <aside class="control-sidebar control-sidebar-dark">
                <div>
                    <div class="col-xs-12">
                        <div id="sel_cores">
                            <div id="control-sidebar-theme-demo-options-tab" class="tab-pane active">
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            
            <div class="control-sidebar-bg"></div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="dados/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="dados/js/adminlte.min.js" type="text/javascript"></script>
        <script src="dados/js/demo.js" type="text/javascript"></script>
        <script src="dados/js/bootbox.min.js" type="text/javascript"></script>

        <!-- Icons -->
        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script>
            feather.replace()
        </script>
        <!-- Graphs -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    </body>
</html>
