<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="open-iconic-master/font/css/open-iconic-bootstrap.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">

</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="home.html">Locadora</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
		aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="agendar.html">Gerenciar</a>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0" action="index.html">
			<button class="btn btn-outline-success my-2 my-sm-0" type="exit">Sair</button>
		</form>
		<br><br>
	</div>
</nav>
<br>



<div class="container">
	<h1>Gerenciar Veiculos</h1><br><br>
	<h2>Veiculos cadastrados</h2><br>
	<form class="form-inline my-2 my-lg-0">
		<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar Veiculo</button>
	</form><br>
	<div class="row">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th scope="col">Código</th>
					<th scope="col">Tipo</th>
					<th scope="col">Placa</th>
					<th scope="col">Capacidade (Passageiros)</th>
					<th scope="col">Motorista</th>
					<th scope="col">Selecionar</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">1</th>
					<td>Van</td>
					<td>HKY-3912</td>
					<td>10</td>
					<td>José A.</td>
					<td>
						<div class="radio">
							<label><input type="radio" name="optradio"></label>
						</div>
					</td>
				</tr>
				<tr>
					<th scope="row">2</th>
					<td>Van</td>
					<td>HTN-5531</td>
					<td>13</td>
					<td>Lucas B.</td>
					<td>
						<div class="radio">
							<label><input type="radio" name="optradio"></label>
						</div>
					</td>
				</tr>
				<tr>
					<th scope="row">3</th>
					<td>Ônibus</td>
					<td>NME-0574</td>
					<td>45</td>
					<td>Bruno L.</td>
					<td>
						<div class="radio">
							<label><input type="radio" name="optradio"></label>
						</div>
					</td>
				</tr>
				<tr>
					<th scope="row">4</th>
					<td>Ônibus</td>
					<td>KJG-7711</td>
					<td>60</td>
					<td>Pedro K.</td>
					<td>
						<div class="radio">
							<label><input type="radio" name="optradio"></label>
						</div>
					</td>
				</tr>
				
			</tbody>
		</table>
	</div>
	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#telaNovo">Novo</button>

	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#telaEditar">Editar</button>

	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#telaExcluir">Excluir</button>
</div>
<div class="container">

	<div class="modal fade" id="telaEditar" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Editar dados</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="form-group col-md-4">
								<label for="campo1">Tipo</label>
								<input type="text" class="form-control" id="campo1">
							</div>
							
							<div class="form-group col-md-4">
								<label for="campo2">Placa</label>
								<input type="text" class="form-control" id="campo2">
							</div>
							
							<div class="form-group col-md-4">
								<label for="campo3">Capacidade</label>
								<input type="text" class="form-control" id="campo3">
							</div>
							<div class="form-group col-md-4">
								<label for="campo3">Motorista</label>
								<input type="text" class="form-control" id="campo4">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Salvar</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">

		<div class="modal fade" id="telaExcluir" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title">Deseja excluir?</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Confirmar</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		
		<br>
		<div class="container">
			<h2></h2><br>
			<div class="container">
				<br><br><br>

				<div class="modal fade" id="telaNovo" role="dialog">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title">Informe os dados</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="form-group col-md-4">
											<label for="campo1">Tipo</label>
											<input type="text" class="form-control" id="campo1">
										</div>
										
										<div class="form-group col-md-4">
											<label for="campo2">Placa</label>
											<input type="text" class="form-control" id="campo2">
										</div>

										
										<div class="form-group col-md-4">
											<label for="campo3">Capacidade</label>
											<input type="text" class="form-control" id="campo3">
										</div>
										<div class="form-group col-md-4">
											<label for="campo3">Motorista</label>
											<input type="text" class="form-control" id="campo4">
										</div>
										
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Salvar</button>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>


			<script src="js/jquery-3.3.1.min.js"></script>
			<script src="js/bootstrap.js"></script>
			<script src="js/main.js"></script>
		</body>

		</html>