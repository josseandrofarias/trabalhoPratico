
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
               
                    <!--SEU CODIGO AQUI DENTRO--> 
                    <section class="content">

                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Gerenciar Funcionários</h1>
                    </div>

                    <!-- ESCREVER CODIGO AQUI! -->
                    
                    <form>
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="text" placeholder="Nome"></br/>
                            <input class="form-control form-control-lg" type="text" placeholder="Endereço"></br/>
                            <div class="row">
                                <div class="col-md-4">
                                    <input class="form-control form-control-lg" type="text" placeholder="CPF"></br/>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control form-control-lg" type="text" placeholder="RG"></br/> 
                                </div>
                                
                                <div class="col-md-4">
                                <input class="form-control form-control-lg" type="text" placeholder="Cargo"></br/>
                            </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 ">
                                	<p class="label">Data de Admissão</p>
                                    <input class="form-control form-control-lg" type="date" placeholder="Admissao">

                                </div>
                                <div class="col-md-4">
                                	<p class="label">Data de Demissão</p>
                                    <input class="form-control form-control-lg" type="date" placeholder="Admissao">   
                                </div>
                            </div>

                            
                            
                        </div>

                        <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="ckBoxSupervisor">
                                        <label class="form-check-label" for="ckBoxSupervisor">Funcionário Supervisor</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="ckBoxDesativado">
                                        <label class="form-check-label" for="ckBoxDesativado">Funcionário Desativado</label>
                                    </div>  
                                </div>
                            </div>
                        
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                      

                    <!--FINAL DO SEU CODIGO-->
                </section>
            </div>
            <!--finalização do Centro--> 

            <!--painel mudar de cor-->
            <?php echo TFuncoes::AddPainelCor(); ?>
        </div>
        <?php echo TFuncoes::AddJs(false) ?>
    </body>
</html>
