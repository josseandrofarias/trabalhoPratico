
<?php include './TFuncao.php'; ?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="Grupo2" content="">

        <title>LoCar - Locadora de Veículos</title>

        <?php echo TFuncoes::AddCss(true); ?>
    </head>

    <body class="skin-blue">

        <div class="wrapper" style="height: auto; min-height: 100%">

            <!--Topo site-->
            <?php echo TFuncoes::AddTopo() ?>

            <!--Menu lateral-->
            <?php echo TFuncoes::AddMenuLateral(true); ?>

            <div class="content-wrapper" style="min-height: 717px;"><!--INICIO DO CENTRO-->

                    <!--**********************************************************-->

                    <div class="container-fluid">

                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">Locações</h1>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group mr-2">	
                                    <a href="cadastrar_locacao.php" class="btn btn-success" data-toggle="modal" data-target="#modalCadastro">
                                    <i class="fas fa-pen"></i>
                                    Nova Locação</a>
                                </div>
                            </div>
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

                    <!-- INICIO DOS MODALS-->
                    <div class="modal" id="modalCadastro"> <!--MODAL PARA CADASTRO-->
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title">Cadastrar Locação</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    
                                    <div class="col-6">
                                        <form>
                                            <div class="form-group">
                                                <label for="numeroCliente">Número do Cliente</label>
                                                <input type="text" class="form-control" id="numeroCliente">
                                            </div>
                                            <div class="form-group">
                                                <label for="placaCarro">Placa do Carro</label>
                                                <input type="text" class="form-control" id="placaCarro">
                                            </div>
                                            <div class="form-group">
                                                <label for="dataLocacao">Data de Locação</label>
                                                <input type="date" class="form-control" id="dataLocacao" value="" >
                                            </div>
                                        </form>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                </div>

                            </div>
                        </div>
				    </div>

                    <div class="modal" id="modalEditar"> <!--MODAL PARA EDIÇÃO-->
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Locação</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    
                                    <div class="col-6">
                                        <form>
                                            <div class="form-group">
                                                <label for="numeroCliente">Número do Cliente</label>
                                                <input type="text" class="form-control" id="numeroCliente">
                                            </div>
                                            <div class="form-group">
                                                <label for="placaCarro">Placa do Carro</label>
                                                <input type="text" class="form-control" id="placaCarro">
                                            </div>
                                            <div class="form-group">
                                                <label for="dataLocacao">Data de Locação</label>
                                                <input type="date" class="form-control" id="dataLocacao" value="" >
                                            </div>
                                        </form>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Salvar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                </div>
                                
                            </div>
                        </div>
				    </div>
                    <!--FIM DOS MODALS-->

                    <!--**********************************************************-->

            </div><!--FIM DO CENTRO--> 

            <?php echo TFuncoes::AddPainelCor(); ?> <!--PAINEL MUDAR DE COR-->

        </div>

        <?php echo TFuncoes::AddJs(true) ?> <!--INCLUIR JS-->

    </body>
</html>
