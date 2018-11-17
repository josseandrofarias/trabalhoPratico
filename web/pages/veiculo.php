
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
    <link rel='stylesheet' type='text/css' href='../dados/css/dataTables.bootstrap4.min.css'/>

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
                
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">Veiculos cadastrador</h1>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group mr-2">	
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#telaNovo">
                                        <i class="fas fa-pen"></i> 
                                        Novo veículo   
                                    </button>
                                </div>
                            </div>
                        </div>
                <?php 
                    //$consulta = TFuncoes::ExecSql('select placa, nome, modelo, valorLocacao from carro;');
                    
                    $sql = 'SELECT id, nome, modelo, marca, placa, valorLocacao, cor, valorSeguro FROM carro;';
                    

                    //tive que usar mysqli_query pois a funcao pra preencher tabela nao estava funcionando
                    $resultado = mysqli_query(TFuncoes::AddConexao(), $sql);
                    

                    //var_dump($resultado);

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
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Placa</th>
                                <th scope="col">Valor locação</th>
                                <th scope="col">Valor Seguro</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- preenchendo tabela com dados do banco -->
                            <?php
                           // echo $sqlEditar;
                            while($registro = mysqli_fetch_assoc($resultado)){
                                echo '<tr>';
                                        echo '<td>'.$registro["id"].'</td>';
                                        echo '<td>'.$registro["nome"].'</td>';
                                        echo '<td>'.$registro["modelo"].'</td>';
                                        echo '<td>'.$registro["marca"].'</td>';
                                        echo '<td>'.$registro["placa"].'</td>';
                                        echo '<td>'.$registro["valorLocacao"].'</td>';
                                        echo '<td>'.$registro["valorSeguro"].'</td>';
                                        echo "  
                                        <td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#telaEditar" .$registro["id"]. "'>Editar</button></td>";
                                        echo "  
                                        <td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#telaExcluir" .$registro["id"]. "'>Excluir</button></td>";
                                    echo '</tr>';
                                }

                             ?>
                        </tbody>
                    </table>
                </div>
            </div>

                <div class="container">

                <style>
                    body {
                         overflow-y:hidden;
                    }
                </style>                
                
                <?php foreach($resultado as $aqui){ ?>
                        <!-- Modal editar -->
                        <div id="telaEditar<?php echo $aqui['id']?>" class="modal fade" role="dialog">
                            <?php
                            //pegando informacoes do carro de acordo com o id
                            $sqlEditar = 'SELECT * FROM carro where id= '.$aqui['id'];
                            
                            ?>
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Informe os dados do <?php echo 'ID: '.$aqui['id']?></h3>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" method="post" action="cad_veiculo.php">
                                            <div class="form-group">
                                                    <input id="id  <?php echo $aqui['id']; ?>" class="form-control" value=" <?php echo $aqui['id']; ?> " name="id" type="hidden">
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="marcaVeiculo">Marca:</label>
                                                    <input name="marca" type="text" class="form-control" id="marcaVeiculo" value="<?php echo $aqui['marca']?>">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="modeloVeiculo">Modelo:</label>
                                                    <input name="modelo" type="text" class="form-control" id="modeloVeiculo" value="<?php echo $aqui['modelo'];?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="placaVeiculo">Placa:</label>
                                                    <input  name="placa" type="text" class="form-control" id="placaVeiculo" value="<?php echo $aqui['placa'];?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="corVeiculo">Cor:</label>
                                                    <input name="cor" type="text" class="form-control" id="corVeiculo" value="<?php echo $aqui['cor'];?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="nomeVeiculo">Nome:</label>
                                                    <input name="nome" type="text" class="form-control" id="nomeVeiculo" value="<?php echo $aqui['nome'];?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="locacaoVeiculo">Valor locação:</label>
                                                    <input  name="locacao" type="number" class="form-control" id="locacaoVeiculo" value="<?php echo $aqui['valorLocacao'];?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="seguroVeiculo">Valor seguro:</label>
                                                    <input name="seguro" type="number" class="form-control" id="seguroVeiculo" value="<?php echo $aqui['valorSeguro'];?>">
                                                </div>
                                                <div>
                                                <br>
                                                    <input type="checkbox" name="veiculoAtivo" id="situacaoVeiculo"> Ativo<br>
                                                </div>
                                                
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" class="btn btn-default" value="Salvar" />
                                                  
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php  }  ?>


                    <!-- modal excluir -->
                    <?php foreach($resultado as $aqui){ ?>
                        <div class="modal fade" id="telaExcluir<?php echo $aqui['id']?>" role="dialog">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Deseja excluir?</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                                        </div>
                                        <div class="modal-footer">
                                            <form role="form" method="post" action="veiculo.php">
                                                <div class="form-group">
                                                    <input id="id  <?php echo $aqui['id']; ?>" class="form-control" value=" <?php echo $aqui['id']; ?> " name="id" type="hidden">
                                                    <button type="submit" class="btn btn-default" data-dismiss="modal">Confirmar</button>
                                                    <input type="submit" value="Submit me!" />
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                </div>
                                            </form>
                                        <?php
                                               
                                               
                                            
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php  }  ?>

                    <!-- modal novo veiculo -->
                    <br>
                    <div class="container">
                        <h2></h2><br>
                        <div class="container">
                            <br><br><br>
                            <div class="modal fade" id="telaNovo" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content" data-backdrop="static">
                                        <form action="cad_veiculo.php" method="post">
                                            <div class="modal-header">
                                                <h3 class="modal-title">Informe os dados</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                </div>
                                                <?php
                                                 var_dump($_POST);
                                                //$idVeiculo = $_POST["id"];
                                                //echo $idVeiculo;
                                                
                                                $resultado2 = mysqli_query(TFuncoes::AddConexao(), $sqlEditar);
                                                 while($registro = mysqli_fetch_assoc($resultado2)){
                                                    //echo '<tr>';
                                                    $marca = $registro["marca"];
                                                    $modelo = $registro["modelo"];
                                                    $placa = $registro["placa"];
                                                    $cor = $registro["cor"];
                                                    $nome = $registro["nome"];
                                                    $valorLocacao = $registro["valorLocacao"];
                                                    $valorSeguro = $registro["valorSeguro"];
                                                }    
                                                              
                                                ?>
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
                                                    
                                                    <input type="submit" class="btn btn-default" value="Salvar" />
                                                    
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
