<?php
    include '../TFuncao.php';
    //var_dump($_POST);
    $id = $_POST["id"];


    $con = TFuncoes::AddConexao();

   $sql = "DELETE FROM carro WHERE ID=".$id.";";

    echo '<br>';
    //echo $sql;
    
    if(mysqli_query($con, $sql)){
        $msg = "Gravado com sucesso!";
        header('Location: veiculo.php');
        mysqli_close($con);  
    }else{
        $msg = "Erro ao gravar!";
        echo "
        <script>alert('O veículo possui uma locação ativa e não pode ser excluído.');
        window.location.href = 'veiculo.php'  //redirecionar para a pagina de veiculo
        
        </script>";
       
    }
    mysqli_close($con);  
    
   
    
    
