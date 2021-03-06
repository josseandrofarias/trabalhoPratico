<!-- Importa o arquivo com as funções do site -->
<?php include '../TFuncao.php';
 TFuncoes::VerificaLogin();
?>

<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="Grupo2" content="">

    <title>Relatórios - LoCar</title>

    <!-- Importar css-->
    <?php echo TFuncoes::AddCss(false); ?>

</head>

<body class="skin-blue">
<div class="wrapper" style="height: auto; min-height: 100%">

    <!--Topo site-->
    <?php echo TFuncoes::AddTopo() ?>

    <!--Menu lateral-->
    <?php echo TFuncoes::AddMenuLateral(false);?>

    <!--Centro-->
    <div class="content-wrapper" style="min-height: 717px;">

        <section class="content">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <div class="input-group mb-3">
                    <h1 class="h2">Gerar relatórios</h1>
                </div>
            </div>
            <form action="gerar_relatorio.php" method="POST" target="_blank">
<!--                Lista contendo os tipos de relatórios-->
                <div class="container-fluid">
                    <p class="input" for="inputGroupSelect01">Tipo do relatório</p>
                    <div class="input-group mb-3">
                        <select class="custom-select custom-select-lg" id="tipo" name="tipo">
                            <option disabled selected hidden>Selecione...</option>
                            <option value="carro">Km Carros</option>
                            <option value="locacao">Locações</option>
                            <option value="cliente">Clientes</option>
                            <option value="funcionario">Funcionários</option>
                        </select>
                    </div>
                </div>

                <!--         Campos para selecionar a data do relatório -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4 ">
                            <p class="label">Data Inicial</p>
                            <input class="form-control form-control-lg" type="date" name="datai">
                        </div>
                        <div class="col-md-4">
                            <p class="label">Data Final</p>
                            <input class="form-control form-control-lg" type="date" name="dataf">
                        </div>
                    </div>
                    <br>    
                    <input  class="btn btn-primary btn-md" type="submit" id="btnGerar" value="Gerar">
                </div>
            </form>
            <div id="result"></div>
        </section>
    </div>
    <!--finalização do Centro-->

    <!--painel mudar de cor-->
    <?php echo TFuncoes::AddPainelCor(); ?>
</div>
<!-- Importar js -->
<?php echo TFuncoes::AddJs(false) ?>
<!--  <script src="../dados/js/gRelatorio.js" type="text/javascript"></script>-->
</body>
</html>
