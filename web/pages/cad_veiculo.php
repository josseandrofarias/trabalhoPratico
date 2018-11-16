<?php
    include '../TFuncao.php';
    var_dump($_POST);
    $placa = $_POST["placa"];
    $nome = $_POST["nome"];
    $modelo = $_POST["modelo"];
    $valorSeguro = $_POST["seguro"];
    $valorLocacao = $_POST["locacao"];
    $cor = $_POST["cor"];
    
    //caso o checkbox esteja deesmarcado seu status sera 0, caso marcado 1
    if (!isset($_POST['veiculoAtivo'])) {
        $ativo = 0;
    }else{
        $ativo = 1;
    }

    $marca = $_POST["marca"];
    $dataCad = date("Y-m-d H:i:s"); 
    $con = TFuncoes::AddConexao();

    $sql = "insert into carro (placa, nome, modelo, valorSeguro, valorLocacao, cor, ativo, marca, dataCad) 
    values('".$placa."','".$nome."','".$modelo."','".$valorSeguro."','".$valorLocacao."','".$cor."','".$ativo."','".$marca."','".$dataCad."')";
    echo '<br>';
    echo $sql;

    if(mysqli_query($con, $sql)){
        $msg = "Gravado com sucesso!";
    }else{
        $msg = "Erro ao gravar!";
    }
    mysqli_close($con);   

    header('Location: veiculo.php');
