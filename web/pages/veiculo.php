
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

            <div class="container-fluid">
                <h2>Veiculos cadastrados</h2><br>
                
                
               <?php 
                    //$consulta = TFuncoes::ExecSql('select placa, nome, modelo, valorLocacao from carro;');
                    
                    $sql = 'SELECT nome, modelo, marca, placa, valorLocacao, valorSeguro FROM carro;';
                    //tive que usar mysqli_query pois a funcao pra preencher tabela nao estava funcionando
                    $resultado = mysqli_query(TFuncoes::AddConexao(), $sql);
                    //var_dump($consulta);

                    /*while($registro = mysqli_fetch_assoc($resultado)){
                    echo '<tr>';
                    echo '<td>'.$registro["placa"].'</td>';
                    echo '<td>'.$registro["nome"].'</td>';
                    echo '<td>'.$registro["modelo"].'</td>';
                    echo '</tr>';
                    } */
                            
                ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="tabelaVeiculo">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Placa</th>
                                <th scope="col">Valor locação</th>
                                <th scope="col">Valor Seguro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- preenchendo tabela com dados do banco -->
                            <?php
                            while($registro = mysqli_fetch_assoc($resultado)){
                                echo '<tr>';
                                    echo '<td>'.$registro["nome"].'</td>';
                                    echo '<td>'.$registro["modelo"].'</td>';
                                    echo '<td>'.$registro["marca"].'</td>';
                                    echo '<td>'.$registro["placa"].'</td>';
                                    echo '<td>'.$registro["valorLocacao"].'</td>';
                                    echo '<td>'.$registro["valorSeguro"].'</td>';
                                echo '</tr>';
                                }
                                
                             ?>
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
                                        <label for="campo1">Marca:</label>
                                            <input type="text" class="form-control" id="campo1">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="campo2">Modelo:</label>
                                            <input type="text" class="form-control" id="campo2">
                                        </div>


                                        <div class="form-group col-md-4">
                                            <label for="campo3">Placa:</label>
                                            <input type="text" class="form-control" id="campo3">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="campo3">Cor:</label>
                                            <input type="text" class="form-control" id="campo4">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="campo3">Nome:</label>
                                            <input type="text" class="form-control" id="campo4">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="campo3">Valor locação:</label>
                                            <input type="number" class="form-control" id="campo4">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="campo3">Valor seguro:</label>
                                            <input type="text" class="form-control" id="campo4">
                                        </div>
                                        <div class="dropdown">
                                            <label for="menu1">Situação:</label><br>
                                            <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Selecionar
                                            <span class="caret"></span></button>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Ativo</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Inativo</a></li>
                                            </ul>
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
                                        <form action="cad_veiculo.php" method="post">
                                            <div class="modal-header">
                                                <h3 class="modal-title">Informe os dados</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="marcaVeiculo">Marca:</label>
                                                            <input name="marca" type="text" class="form-control" id="marcaVeiculo">
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="modeloVeiculo">Modelo:</label>
                                                            <input name="modelo" type="text" class="form-control" id="modeloVeiculo">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="placaVeiculo">Placa:</label>
                                                            <input  name="placa" type="text" class="form-control" id="placaVeiculo">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="corVeiculo">Cor:</label>
                                                            <input name="cor" type="text" class="form-control" id="corVeiculo">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="nomeVeiculo">Nome:</label>
                                                            <input name="nome" type="text" class="form-control" id="nomeVeiculo">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="locacaoVeiculo">Valor locação:</label>
                                                            <input  name="locacao" type="number" class="form-control" id="locacaoVeiculo">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="seguroVeiculo">Valor seguro:</label>
                                                            <input name="seguro" type="number" class="form-control" id="seguroVeiculo">
                                                        </div>
                                                        <div>
                                                        <br>
                                                            <input type="checkbox" name="veiculoAtivo" id="situacaoVeiculo"> Ativo<br>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-default" data-dismiss="modal">Salvar</button>
                                                    <input type="submit" value="Submit me!" />
                                                    
                                                </div>
                                            </div>
                                        </form>
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
    <script src='../dados/js/jquery.dataTables.min.js'></script><!--LINKAGEM TEMPORARIA!-->
    <script src='../dados/js/dataTables.bootstrap4.min.js'></script>
    <script src='../dados/js/site.js'></script>
</body>
</html>
