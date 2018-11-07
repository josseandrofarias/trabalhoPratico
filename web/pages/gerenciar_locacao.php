
<?php include '../TFuncao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="Grupo2" content="">

		<title>LoCar - Gerenciamento de Locações</title>

		<?php echo TFuncoes::AddCss(false); ?> <!--INCLUIR CSS-->

	</head>

	<body class="skin-blue">

		<div class="wrapper" style="height: auto; min-height: 100%">

			<?php echo TFuncoes::AddTopo() ?><!--TOPO DO SITE-->
			
			<?php echo TFuncoes::AddMenuLateral(false); ?><!--MENU LATERAL-->

			<div class="content-wrapper" style="min-height: 717px;"><!--INICIO DO CENTRO-->
				
				<!-- ******************************************************************* -->

				<div class="container-fluid">

					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
						<h1 class="h2">Gerenciamento de Locações</h1>
						<div class="btn-toolbar mb-2 mb-md-0">
							<div class="btn-group mr-2">
								<a href="cadastrar_locacao.php" class="btn btn-sm btn-outline-secondary">Cadastrar</a>
								<a href="#" class="btn btn-sm btn-outline-secondary">Deletar</a>
								<a href="#" class="btn btn-sm btn-outline-secondary">Editar</a>
							</div>
						</div>
					</div>

				</div>		
		
				<!-- ******************************************************************* -->

			</div><!--FIM DO CENTRO--> 
			
			<?php echo TFuncoes::AddPainelCor(); ?><!--PAINEL MUDAR DE COR-->

		</div>

		<?php echo TFuncoes::AddJs(false) ?><!--INCLUIR JS-->

	</body>
</html>
