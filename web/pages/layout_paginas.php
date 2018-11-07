
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
                    
                      

                    <!--FINAL DO SEU CODIGO-->

            </div>
            <!--finalização do Centro--> 

            <!--painel mudar de cor-->
            <?php echo TFuncoes::AddPainelCor(); ?>
        </div>
        <?php echo TFuncoes::AddJs(false) ?>
    </body>
</html>
