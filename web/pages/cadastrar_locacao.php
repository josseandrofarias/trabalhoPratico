
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="Grupo2" content="">

		<title>LoCar - Cadastro de Locação</title>

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
						<h1 class="h2">Cadastrar Locação</h1>
							<!--
							<div class="btn-toolbar mb-2 mb-md-0">
								<div class="btn-group mr-2">
									<button class="btn btn-sm btn-outline-secondary">Cadastrar</button>
									<button class="btn btn-sm btn-outline-secondary">Deletar</button>
									<button class="btn btn-sm btn-outline-secondary">Editar</button>
								</div>
								<button class="btn btn-sm btn-outline-secondary dropdown-toggle">
								<span data-feather="calendar"></span>
									Hoje
								</button>		  
							</div>
							-->
					</div>

					<div class="row">
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
