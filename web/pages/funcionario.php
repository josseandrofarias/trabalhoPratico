
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
                            <h1 class="h2">Funcionários Cadastrados</h1>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group mr-2">    
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#telaNovoFunc"> 
                                        Novo Funcionário &nbsp;  
                                    </button>
                                </div>
                            </div>
                        </div>
                <?php 
                    //$consulta = TFuncoes::ExecSql('select placa, nome, modelo, valorLocacao from carro;');
                    
                    $sql = 'SELECT id, nome, cpf, rg, senha, endereco, cargo, deativado, supervisor, dataAdmissao, dataDemissao FROM funcionario;';

                    //tive que usar mysqli_query pois a funcao pra preencher tabela nao estava funcionando
                    $resultado = mysqli_query(TFuncoes::AddConexao(), $sql);
                            
                ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="tabelaFuncionario">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">CPF</th>
                                <th scope="col">RG</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Ativo</th>
                                <th scope="col">Gerenciar</th>
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
                                        echo '<td>'.$registro["cpf"].'</td>';
                                        echo '<td>'.$registro["rg"].'</td>';
                                        echo '<td>'.$registro["cargo"].'</td>';
                                        $status = $registro["deativado"]; 
                                        if($status == 0) 
                                            { $check = "checked"; } 
                                        else{ $check = 1; } 
                                        echo "<td><input type='checkbox' $check></td>"; 
                                        //echo '<td>'.$registro["deativado"].'</td>';
                                        echo "  
                                        <td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#telaEditar" .$registro["id"]. "'><i class='fas fa-pen'></i></button>
                                        <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#telaExcluir" .$registro["id"]. "'><i class='fas fa-trash-alt'></i></i></button></td>
                                        ";
                                        
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
                            $sqlEditar = 'SELECT * FROM funcionario where id= '.$aqui['id'];
                            
                            ?>
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Alterando os dados do <?php echo 'Funcionário: '.$aqui['nome']?></h3>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" method="post" action="cad_funcionario.php" data-toggle="validator">
                                            <div class="form-group">
                                                    <input id="id  <?php echo $aqui['id']; ?>" class="form-control" value=" <?php echo $aqui['id']; ?> " name="id" type="hidden">
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="nomeFun">Nome:</label>
                                                    <input name="nome" type="text" class="form-control" id="nomeFun" value="<?php echo $aqui['nome']?>" id="nomeFun" data-error="Insira o nome do funcionário." required>
                                                    <div class="help-block with-errors"></div>  
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="rg">RG:</label>
                                                    <input name="rg" type="text" class="form-control" id="rg" value="<?php echo $aqui['rg'];?>" data-error="Insira o RG." required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="cpf">CPF:</label>
                                                    <input  name="cpf" type="text" class="form-control" id="cpf" value="<?php echo $aqui['cpf'];?>" data-error="Informe CPF" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="senha">Senha:</label>
                                                    <input name="senha" type="text" class="form-control" id="senha" value="<?php echo $aqui['senha'];?>" data-error="Insira a senha" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="endereco">Endereço:</label>
                                                    <input name="endereco" type="text" class="form-control" id="endereco" value="<?php echo $aqui['endereco'];?>" data-error="Insira o endereço" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="cargo">Cargo:</label>
                                                    <input  name="locacao" type="text" class="form-control" id="cargo" value="<?php echo $aqui['cargo'];?>" data-error="Insira o cargo." required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="dataAdmissao">Data Admissão:</label>
                                                    <input name="dataAdmissao" type="number" class="form-control" id="dataAdmissao" value="<?php echo $aqui['dataAdmissao'];?>" data-error="Insira data de admissão" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="dataDemissao">Data Demissão:</label>
                                                    <input  name="dataDemissao" type="text" class="form-control" id="dataDemissao" value="<?php echo $aqui['dataDemissao'];?>" data-error="Informe data de demissõa." required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div>
                                                    <br>
                                                    <input type="checkbox" name="deativado" id="deativado"> Ativo                            <br>
                                                </div>
                                                <div>
                                                    <br>
                                                    <input type="checkbox" name="supervisor" id="supervisor"> Supervidor<br>
                                                </div>
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
                                            <form role="form" method="post" action="del_funcionario.php">
                                                <div class="form-group">
                                                    <input id="id  <?php echo $aqui['id']; ?>" class="form-control" value=" <?php echo $aqui['id']; ?> " name="id" type="hidden">
                                                    <input type="submit" class="btn btn-default" value="Confirmar" />
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php  }  ?>

                    <!-- modal novo funcionario -->
                    <br>
                    <div class="container">
                        <h2></h2><br>
                        <div class="container">
                            <br><br><br>
                            <div class="modal fade" id="telaNovoFunc" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content" data-backdrop="static">
                                        <form action="cad_funcionario.php" data-toggle="validator" method="post">
                                            <div class="modal-header">
                                                <h3 class="modal-title">Cadastrando um novo Funcionário</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                    <label for="nomeFun">Nome:</label>
                                                    <input name="nome" type="text" class="form-control" id="nomeFun" value="<?php echo $aqui['nome']?>" id="nomeFun" data-error="Insira o nome do funcionário." required>
                                                    <div class="help-block with-errors"></div>  
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="rg">RG:</label>
                                                    <input name="rg" type="text" class="form-control" id="rg" value="<?php echo $aqui['rg'];?>" data-error="Insira o RG." required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="cpf">CPF:</label>
                                                    <input  name="cpf" type="text" class="form-control" id="cpf" value="<?php echo $aqui['cpf'];?>" data-error="Informe CPF" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="senha">Senha:</label>
                                                    <input name="senha" type="text" class="form-control" id="senha" value="<?php echo $aqui['senha'];?>" data-error="Insira a senha" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="endereco">Endereço:</label>
                                                    <input name="endereco" type="text" class="form-control" id="endereco" value="<?php echo $aqui['endereco'];?>" data-error="Insira o endereço" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="cargo">Cargo:</label>
                                                    <input  name="locacao" type="text" class="form-control" id="cargo" value="<?php echo $aqui['cargo'];?>" data-error="Insira o cargo." required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="dataAdmissao">Data Admissão:</label>
                                                    <input name="dataAdmissao" type="number" class="form-control" id="dataAdmissao" value="<?php echo $aqui['dataAdmissao'];?>" data-error="Insira data de admissão" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="dataDemissao">Data Demissão:</label>
                                                    <input  name="dataDemissao" type="text" class="form-control" id="dataDemissao" value="<?php echo $aqui['dataDemissao'];?>" data-error="Informe data de demissão." required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div>
                                                    <br>
                                                    <input type="checkbox" name="deativado" id="deativado"> Ativo                            <br>
                                                </div>
                                                <div>
                                                    <br>
                                                    <input type="checkbox" name="supervisor" id="supervisor"> Supervidor<br>
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
    <script src="../dados/js/validator.js"></script>
</body>
</html>
