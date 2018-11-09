
<?php
include '../TFuncao.php';
?>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="Grupo2" content="">

    <title>LoCar - Locadora de veículos</title>

    <!--<link href="dados/css/materialize.min.css" rel="stylesheet">-->
    <?php
    echo TFuncoes::AddCss(false);
    ?>

</head>

<body class="skin-blue">
    <div class="wrapper" style="height: auto; min-height: 100%">

        <!--Topo site-->
        <?php echo TFuncoes::AddTopo() ?>
        <!--Menu lateral-->
        <?php echo TFuncoes::AddMenuLateral(false);// include './dados/menuLateral.php'; ?>

        <!--centro-->
        <div class="content-wrapper" style="min-height: 717px;">

            <div class="container">
                <h2>Veiculos cadastrados</h2><br>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar Veiculo</button>
                </form><br>
                <div class="row">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Placa</th>
                                <th scope="col">Capacidade (Passageiros)</th>
                                <th scope="col">Motorista</th>
                                <th scope="col">Selecionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Van</td>
                                <td>HKY-3912</td>
                                <td>10</td>
                                <td>José A.</td>
                                <td>
                                    <div class="radio">
                                        <label><input type="radio" name="optradio"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Van</td>
                                <td>HTN-5531</td>
                                <td>13</td>
                                <td>Lucas B.</td>
                                <td>
                                    <div class="radio">
                                        <label><input type="radio" name="optradio"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Ônibus</td>
                                <td>NME-0574</td>
                                <td>45</td>
                                <td>Bruno L.</td>
                                <td>
                                    <div class="radio">
                                        <label><input type="radio" name="optradio"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Ônibus</td>
                                <td>KJG-7711</td>
                                <td>60</td>
                                <td>Pedro K.</td>
                                <td>
                                    <div class="radio">
                                        <label><input type="radio" name="optradio"></label>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#telaNovo">Novo</button>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#telaEditar">Editar</button>

                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#telaExcluir">Excluir</button>
            </div>

            <div class="container">

                <div class="modal fade" id="telaEditar" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Editar dados</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="campo1">Tipo</label>
                                            <input type="text" class="form-control" id="campo1">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="campo2">Placa</label>
                                            <input type="text" class="form-control" id="campo2">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="campo3">Capacidade</label>
                                            <input type="text" class="form-control" id="campo3">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="campo3">Motorista</label>
                                            <input type="text" class="form-control" id="campo4">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="modal fade" id="telaExcluir" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Deseja excluir?</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Confirmar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="container">
                        <h2></h2><br>
                        <div class="container">
                            <br><br><br>
                            <div class="modal fade" id="telaNovo" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Informe os dados</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="campo1">Tipo</label>
                                                        <input type="text" class="form-control" id="campo1">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="campo2">Placa</label>
                                                        <input type="text" class="form-control" id="campo2">
                                                    </div>


                                                    <div class="form-group col-md-4">
                                                        <label for="campo3">Capacidade</label>
                                                        <input type="text" class="form-control" id="campo3">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="campo3">Motorista</label>
                                                        <input type="text" class="form-control" id="campo4">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Salvar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <!--finalização do Centro--> 

        <!--painel mudar de cor-->
        <?php echo TFuncoes::AddPainelCor(); ?>
    </div>
    <?php echo TFuncoes::AddJs(false) ?>
</body>
</html>
