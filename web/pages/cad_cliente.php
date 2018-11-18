
<?php
include '../TFuncao.php';
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="Grupo2" content="">

        <title>LoCar - Cadastro de Cliente</title>

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
                    <!--SEU CODIGO AQUI DENTRO--> 
					<h2>Cadastrar Cliente</h2>
                    
                    <div class="table-responsive">
                        <table id="tabelaCliente" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>CNH</th>
                                    <th>Endereço</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php 
                                    
                                    $res = TFuncoes::ExecSql('
                                        SELECT * FROM cliente;
                                    ');
                                    foreach($res as $tabela) {
                                        echo "<tr>";
                                            echo "<th>" . $tabela['id'] . "</th>";
                                            echo "<th>" . $tabela['nome'] . "</th>";
                                            echo "<th>" . $tabela['cpf'] . "</th>";
                                            echo "<th>" . $tabela['cnh'] . "</th>";
                                            echo "<th>" . $tabela['endereco'] . "</th>";
                                        echo "</tr>";        
                                    }

                                ?>

                            </tbody>
                        </table>
                    </div>

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalNovo">Novo</button>

                    <!--FINAL DO SEU CODIGO-->
                </div>

            </div>
            <!--finalização do Centro--> 

            <!--painel mudar de cor-->
            <?php echo TFuncoes::AddPainelCor(); ?>
        </div>

        <div class="modal" tabindex="-1" role="dialog" id="modalNovo">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastrar Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="text" placeholder="Nome">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="text" placeholder="RG">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="text" placeholder="CPF">
                            </div>    
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="text" placeholder="CNH">
                            </div>
                            <div class="form-group"> 
                                <input class="form-control form-control-lg" type="text" placeholder="Endereço">
                            </div>   
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="text" placeholder="Número de Dependentes">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success">Salvar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <?php echo TFuncoes::AddJs(false) ?>
        <script src='../dados/js/jquery.dataTables.min.js'></script>
        <script src='../dados/js/dataTables.bootstrap4.min.js'></script>
        <script src='../dados/js/site.js'></script>
    </body>
</html>
