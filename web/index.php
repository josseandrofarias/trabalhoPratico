<?php include './TFuncao.php'; ?>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if( validar_numero( $_POST['numeroCliente'] ) &&
        validar_placa( $_POST['numeroCarro'] ) && 
        validar_data( $_POST['dataLocacao'] ) ) {
            TFuncoes::ExecSql("
            INSERT INTO locacao (idCliente, idCarro, dataLocacao)
            VALUES('" . $_POST['numeroCliente'] . "','" . $_POST['numeroCarro'] . "','" . $_POST['dataLocacao'] . "')
            ");
            header("Location: " . "http://" . "$_SERVER[HTTP_HOST]" . "/trabalhoPratico/web");
        } else {
            header("Location: " . "http://" . "$_SERVER[HTTP_HOST]" . "/trabalhoPratico/web");
        }
    }

?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="Grupo2" content="">

        <title>LoCar - Locadora de Veículos</title>

        <?php echo TFuncoes::AddCss(true); ?>
        <link rel='stylesheet' type='text/css' href='dados/css/dataTables.bootstrap4.min.css'/> <!--LINKAGEM TEMPORARIA!-->
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
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCadastro">
                                        <i class="fas fa-pen"></i> 
                                        Nova Locação   
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="tabelaLocacao" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Veículo</th>
                                        <th>Data de Locação</th>
                                        <th>Data de Devolução</th>
                                        <th>KM</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <?php 
                                    
                                        $res = TFuncoes::ExecSql('
                                            SELECT locacao.dataLocacao, locacao.dataDevolucao, locacao.quilometragem, cliente.nome, carro.placa
                                            FROM (( locacao
                                            INNER JOIN cliente ON locacao.idcliente = cliente.id)
                                            INNER JOIN carro ON locacao.idcarro = carro.id);
                                        ');
                                        foreach($res as $tabela) {
                                            
                                            $habilitaBotao = true;
                                            echo "<tr>";
                                                echo "<th>" . $tabela['nome'] . "</th>";
                                                echo "<th>" . $tabela['placa'] . "</th>";
                                                echo "<th>" . date("d-m-Y", strtotime($tabela['dataLocacao'])) . "</th>";

                                                if($tabela['dataDevolucao']) {
                                                    echo "<th>" . date("d-m-Y", strtotime($tabela['dataDevolucao'])) . "</th>";
                                                    $habilitaBotao = false;
                                                } else
                                                    echo "<th></th>";

                                                echo "<th>" . $tabela['quilometragem'] . "</th>";

                                                if($habilitaBotao == true) {
                                                    echo "<th><button class='btn btn-primary'><i class='fas fa-edit'></i> </button>
                                                    <button class='btn btn-danger'><i class='fas fa-trash-alt'></i> </button>
                                                    <button class='btn btn-dark'><i class='fas fa-check'></i></i> </button></th>";
                                                } else {
                                                    echo "<th><button class='btn btn-primary'><i class='fas fa-edit'></i> </button>
                                                    <button class='btn btn-danger'><i class='fas fa-trash-alt'></i> </button>
                                                    <button class='btn btn-dark' disabled><i class='fas fa-check'></i></i> </button></th>";
                                                }                                  
                                            echo "</tr>";
                                            
                                        }
                                    
                                    ?>

                                </tbody>
                            </table>
                        </div>

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
                                        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" target="_self" id="consulta" >
                                            <div class="form-group">
                                                <label for="numeroCliente">Número do Cliente</label>
                                                <input type="text" class="form-control" id="numeroCliente" name="numeroCliente" >
                                            </div>
                                            <div class="form-group">
                                                <label for="placaCarro">Número do Carro</label>
                                                <input type="text" class="form-control" id="numeroCarro" name="numeroCarro" >
                                            </div>
                                            <div class="form-group">
                                                <label for="dataLocacao">Data de Locação</label>
                                                <input type="date" class="form-control" id="dataLocacao" name="dataLocacao" >
                                            </div>
                                        </form>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" form="consulta">Cadastrar</button>
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

        <script src='dados/js/jquery.dataTables.min.js'></script><!--LINKAGEM TEMPORARIA!-->
        <script src='dados/js/dataTables.bootstrap4.min.js'></script>
        <script src='dados/js/site.js'></script>

    </body>
</html>

<?php 

    function validar_numero($numeroCliente) {
        if( ( !isset( $numeroCliente ) || empty( $numeroCliente ) ) ) {
            return false;
        } else {
            if(TFuncoes::Select("cliente", "id", "id = " . $numeroCliente) != false) {
                return true;
            } else {
                return false;
            }  
        }
    }

    function validar_placa($numeroCarro) {
        if( ( !isset( $numeroCarro ) || empty( $numeroCarro ) ) ) {
            return false;
        } else {
            if(TFuncoes::Select("carro", "id", "id = " . $numeroCarro) != false) {
                return true;
            } else {
                return false;
            }  
        }
    }

    function validar_data($dataLocacao) {
        if( ( !isset( $dataLocacao ) || empty( $dataLocacao ) ) ) {
            return false;
        } else {
            return true;
        }
    }

?>