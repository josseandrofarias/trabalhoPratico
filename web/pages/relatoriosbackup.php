
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="Grupo2" content="">

  <title>LoCar - Locadora de veículos</title>

  <!--<link href="dados/css/materialize.min.css" rel="stylesheet">-->
  <?php include '../CSSLink.php';?>

</head>

<body>

  <div class="wrapper" style="height: auto; min-height: 100%">

    <!--Topo site-->
    <?php include '../topo.php'; ?>
    <!--Menu lateral-->
    <?php include '../menuLateral.php'; ?>

    <!--centro meio que irá mudar-->
    <div class="content-wrapper" style="min-height: 717px;">
      <main role="main" class="col-md-9 col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <div class="input-group mb-3">
            <h1 class="h2">Gerar relatórios</h1>
          </div>
        </div>

        <div class="container-fluid">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01"><strong>Tipo do relatório</strong></label>
            </div>
            <select class="custom-select col-2" id="inputGroupSelect01">
              <option selected>Selecione...</option>
              <option value="1">Km Carros</option>
              <option value="2">Locações</option>
              <option value="3">Clientes</option>
              <option value="4">Funcionários</option>
            </select>
          </div>
        </div>

        <div class="container-fluid">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01"><strong>Data inicial</strong></label>
            </div>
            <input class="form-control col-2" type="date" value="" id="data_final">
          </div>
        </div>

        <div class="container-fluid">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01"><strong>Data final</strong></label>
            </div>
            <input class="form-control col-2" type="date" value="" id="data_final">
          </div>
          <button type="button" class="btn btn-primary btn-lg" style="background-color: #545254; border-color: #000">Gerar relatório</button>
        </div>




      </main>
    </div>
    <!--finalização do meio--> 

    <!--painel mudar de cor-->
    <?php include '../painelConfCor.php'; ?>
  </div>
  <?php include '../JSLink.php';?>
</body>
</html>