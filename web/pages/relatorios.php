
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

  <?php
  echo TFuncoes::AddCss(false);
  ?>

</head>

<body class="skin-blue">

  <div class="wrapper" style="height: auto; min-height: 100%">

    <!--Topo site-->
    <?php echo TFuncoes::AddTopo() ?>
    <!--Menu lateral-->
    <?php echo TFuncoes::AddMenuLateral(false);?>

    <!--centro-->
    <div class="content-wrapper" style="min-height: 717px;">
      <section class="content">
        <!--Meio a ser mudado--> 

          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="input-group mb-3">
              <h1 class="h2">Gerar relatórios</h1>
            </div>
          </div>

          <div class="container-fluid">
                <p class="input" for="inputGroupSelect01">Tipo do relatório</p>
            <div class="input-group mb-3">
              <select class="custom-select custom-select-lg" id="inputGroupSelect01">
                <option selected>Selecione...</option>
                <option value="1">Km Carros</option>
                <option value="2">Locações</option>
                <option value="3">Clientes</option>
                <option value="4">Funcionários</option>
              </select>
            </div>
          </div>

          <div class="container-fluid">

            <div class="row">
                <div class="col-md-4 ">
                  <p class="label">Data Inicial</p>
                    <input class="form-control form-control-lg" type="date" placeholder="Inicial">

                </div>
                <div class="col-md-4">
                  <p class="label">Data Final</p>
                    <input class="form-control form-control-lg" type="date" placeholder="Final">   
                </div>
            </div>
            <br>
            <button type="button" class="btn btn-primary btn-lg" id="btnGerar">Gerar</button>
          </div>



        <!--Final do centro aonde irá ocorrer Edição-->
      </section>
    </div>
    <!--finalização do Centro--> 

    <!--painel mudar de cor-->
    <?php echo TFuncoes::AddPainelCor(); ?>
  </div>
  <?php echo TFuncoes::AddJs(false) ?>
</body>
</html>
