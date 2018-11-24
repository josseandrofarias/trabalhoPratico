<?php
    include '../TFuncao.php';
    $id = $_POST["id"];

    $con = TFuncoes::AddConexao();

   $sql = "DELETE FROM funcionario WHERE ID=".$id.";";

    echo '<br>';
    
    if(mysqli_query($con, $sql)){
        $msg = "Gravado com sucesso!";
        header('Location: funcionario.php');
        mysqli_close($con);  
    }else{
        $msg = "Erro ao gravar!";
        echo "
        <script>alert('O veículo possui uma locação ativa e não pode ser excluído.');
        window.location.href = 'veiculo.php'  //redirecionar para a pagina de veiculo
        
        </script>";
       
    }
    mysqli_close($con);  
    