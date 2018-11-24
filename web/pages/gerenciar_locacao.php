<?php include '../TFuncao.php'; 
TFuncoes::VerificaLogin()?>

<?php

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        if( $_POST['acao'] == 'deletar' ) {
            deletar_locacao($_POST['id']);
        } elseif( $_POST['acao'] == 'editar' ) {
			$res = select_locacao($_POST['id']);
        } elseif( $_POST['acao'] == 'atualizar'){
			atualizar_locacao($_POST['id'], $_POST['numeroCliente'], $_POST['numeroCarro'], 
			$_POST['dataLocacao'], $_POST['dataDevolucao'], $_POST['quilometragem']);
		}
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="Grupo2" content="">

		<title>LoCar - Editar Locação</title>

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
						<h1 class="h2">Editar Locação</h1>
					</div>

					<div class="col-3">
						<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" target="_self">
							<input type='hidden' name='id' value="<?php echo $res[0]['id']?>"/>
							<div class="form-group">
								<label for="numeroCliente">Número do Cliente</label>
								<input type="text" class="form-control" id="numeroCliente" name="numeroCliente" value="<?php echo $res[0]['idCliente'];?>">
							</div>
							<div class="form-group">
								<label for="placaCarro">Número do Carro</label>
								<input type="text" class="form-control" id="numeroCarro"  name="numeroCarro" value="<?php echo $res[0]['idCarro'];?>">
							</div>
							<div class="form-group">
								<label for="dataLocacao">Data de Locação</label>
								<input type="date" class="form-control" id="dataLocacao" name="dataLocacao" value="<?php echo $res[0]['dataLocacao'];?>">
							</div>
							<div class="form-group">
								<label for="dataLocacao">Data de Devolução</label>
								<input type="date" class="form-control" id="dataDevolucao"  name="dataDevolucao" value="<?php echo $res[0]['dataDevolucao'];?>">
							</div>
							<div class="form-group">
								<label for="placaCarro">Quilometragem</label>
								<input type="text" class="form-control" id="quilometragem" name="quilometragem" value="<?php echo $res[0]['quilometragem'];?>">
							</div>
							<button type="submit" class="btn btn-success" name="acao" value="atualizar">Cadastrar</button>
							<button type="submit" class="btn btn-danger">Voltar</button>
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

<?php 

	function atualizar_locacao($id, $numeroCliente, $numeroCarro, $dataLocacao, $dataDevolucao, $quilometragem) {
		if( validar_numero( $numeroCliente ) &&
        validar_placa( $numeroCarro ) && 
        validar_data( $dataLocacao ) ) {
			if(empty($dataDevolucao) && empty($quilometragem)) {
				TFuncoes::ExecSql("
				UPDATE locacao
				SET idCliente = '" . $numeroCliente . "' , idCarro = '" . $numeroCarro . "' , dataLocacao = '" . $dataLocacao . "'
				WHERE id = " . $id . "
				");
				header("Location: " . "http://" . "$_SERVER[HTTP_HOST]" . "/trabalhoPratico/web");
			} else {
				TFuncoes::ExecSql("
				UPDATE locacao
				SET idCliente = '" . $numeroCliente . "' , idCarro = '" . $numeroCarro . "' , dataLocacao = '" . $dataLocacao . "'
				, dataDevolucao = '" . $dataDevolucao . "' , quilometragem = '" . $quilometragem . "'
				WHERE id = " . $id . "
				");
				header("Location: " . "http://" . "$_SERVER[HTTP_HOST]" . "/trabalhoPratico/web");
			}
		} else {
			header("Location: " . "http://" . "$_SERVER[HTTP_HOST]" . "/trabalhoPratico/web");
		}
	}

	function select_locacao($id) {
		return TFuncoes::Select("locacao", "id, idCliente, idCarro, dataLocacao, dataDevolucao, quilometragem", "id='" . $id . "'");
	}

	function deletar_locacao($id) {
		TFuncoes::ExecSql("
			DELETE FROM locacao WHERE id='" . $id .  "'
		");
		header("Location: " . "http://" . "$_SERVER[HTTP_HOST]" . "/trabalhoPratico/web");
	}

	function validar_numero($numeroCliente) {
        if( ( !isset( $numeroCliente ) || empty( $numeroCliente ) ) ) {
            return false;
        } else {
            if(TFuncoes::Select("cliente", "id", "id = " . $numeroCliente) != false) {
                return true;
            } else {
                return false;
            }  
        }
    }

    function validar_placa($numeroCarro) {
        if( ( !isset( $numeroCarro ) || empty( $numeroCarro ) ) ) {
            return false;
        } else {
            if(TFuncoes::Select("carro", "id", "id = " . $numeroCarro) != false) {
                return true;
            } else {
                return false;
            }  
        }
    }

    function validar_data($dataLocacao) {
        if( ( !isset( $dataLocacao ) || empty( $dataLocacao ) ) ) {
            return false;
        } else {
            return true;
        }
	}

?>
