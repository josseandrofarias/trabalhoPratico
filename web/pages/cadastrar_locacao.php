
<?php include '../TFuncao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="Grupo2" content="">

		<title>LoCar - Cadastrar Locação</title>

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
						<h1 class="h2">Cadastrar Locação</h1>
					</div>

					<div class="col-3">
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
							<button type="submit" class="btn btn-primary">Cadastrar</button>
							<button type="submit" class="btn btn-secondary">Voltar</button>
						</form>
					</div>

				</div>		
		
				<!-- ******************************************************************* -->

			</div><!--FIM DO CENTRO--> 
			
			<?php echo TFuncoes::AddPainelCor(); ?><!--PAINEL MUDAR DE COR-->

		</div>

		<?php echo TFuncoes::AddJs(false) ?><!--INCLUIR JS-->

	</body>
</html>