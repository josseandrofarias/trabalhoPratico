
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
					<h2>Cadastrar Cliente</h2><br>
                    
                     <input class="form-control form-control-lg" type="text" placeholder="Nome"></br/>
					
					<input class="form-control form-control-lg" type="text" placeholder="RG"></br/>
					
					<input class="form-control form-control-lg" type="text" placeholder="CPF"></br/>
					
					<input class="form-control form-control-lg" type="text" placeholder="CNH"></br/>
					
					<input class="form-control form-control-lg" type="text" placeholder="Endereço"></br/>
					
					<input class="form-control form-control-lg" type="text" placeholder="Numero de dependentes"></br/>
					
					 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#telaNovo">Editar</button>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#telaEditar">Excluir</button>

                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#telaExcluir">Salvar</button>

                    <!--FINAL DO SEU CODIGO-->

            </div>
            <!--finalização do Centro--> 

            <!--painel mudar de cor-->
            <?php echo TFuncoes::AddPainelCor(); ?>
        </div>
        <?php echo TFuncoes::AddJs(false) ?>
    </body>
</html>
