
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="Grupo2" content="">

		<title>LoCar - Cadastro de Funcionários	</title>

		<!-- Bootstrap core CSS -->
		<link href="../dados/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../dados/css/AdminLTE.min.css">

		<!-- Custom styles for this template -->
		<!--<link  rel="stylesheet" href="../dados/css/dashboard.css">-->
	</head>

	<body>


		<nav class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">
			<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">LoCar</a>
			<ul class="navbar-nav px-3">
				<li class="nav-item text-nowrap">
					<a class="nav-link" href="#">Sair</a>
				</li>
			</ul>
		</nav>

		<div class="container-fluid">
			<div class="row">

				<nav class="col-md-2 d-none d-md-block bg-light sidebar">
					<div class="sidebar-sticky">
						<ul class="nav flex-column">
							<li class="nav-item">
								<a class="nav-link active" href="#">
									<span data-feather="home"></span>
									Locação<span class="sr-only">(current)</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="pages/clientes.php">
									<span data-feather="user"></span>
									Clientes
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="pages/veiculo.php">
									<span data-feather="shopping-cart"></span>
									Carros
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="pages/relatorios.php">
									<span data-feather="file"></span>
									Relatórios
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="pages/cad_funcionarios.php">
									<span data-feather="users"></span>
									Funcionários
								</a>
							</li>
						</ul>
					</div>
				</nav>

				<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
						<h1 class="h2">Gerenciar Funcionários</h1>
					</div>

                    <!-- ESCREVER CODIGO AQUI! -->
					
					<input class="form-control form-control-lg" type="text" placeholder="Nome"></br/>
					
					<input class="form-control form-control-lg" type="text" placeholder="CPF"></br/>
					
					<input class="form-control form-control-lg" type="text" placeholder="RG"></br/>
					
					<input class="form-control form-control-lg" type="text" placeholder="Endereço"></br/>
					
					<input class="form-control form-control-lg" type="text" placeholder="Cargo"></br/>
					
					<div class="form-check">
  						<input class="form-check-input" type="checkbox" value="" id="ckbxSupervisor">
 						<label class="form-check-label" for="defaultCheck1">Supervisor</label>
					</div>

					<div class="well">
  						<div id="datetimepicker2" class="input-append">
    						<input data-format="MM/dd/yyyy HH:mm:ss PP" type="text"></input>
    						<span class="add-on">
     							<i data-time-icon="icon-time" data-date-icon="icon-calendar"> </i>
   							</span>
  						</div>
					</div>
					<script type="text/javascript">
					  $(function() {
					    $('#datetimepicker2').datetimepicker({
					      language: 'en',
					      pick12HourFormat: true
					    });
					  });
					</script>
					
					<button type="button" class="btn btn-primary btn-sm">Editar</button>
					
					<button type="button" class="btn btn-primary btn-sm">Excluir</button>
					
					<button type="button" class="btn btn-primary btn-sm">Salvar</button>
					

				</main>

	 		</div>
		</div>


		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="../dados/js/bootstrap.min.js"></script>

		<!-- Icons -->
		<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
		<script>
	 		feather.replace()
		</script>
		<!-- Graphs -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

	</body>
</html>
