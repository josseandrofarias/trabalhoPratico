<?php
    include '../TFuncao.php';
    $id = $_POST["id"];

    $con = TFuncoes::AddConexao();

    $sql = "DELETE FROM funcionario WHERE ID=".$id.";";

    echo '<br>';
    
    if(mysqli_query($con, $sql)){
        $msg = "Gravado com sucesso!";
        header('Location: cad_funcionario.php');
        mysqli_close($con);  
    }else{
        $msg = "Erro ao gravar!";
        echo "
        window.location.href = 'cad_funcionario.php'  //redirecionar para a pagina de veiculo
        </script>";
    }
    mysqli_close($con);  
    