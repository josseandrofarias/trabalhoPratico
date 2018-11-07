
<?php
include './TFuncao.php';
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="Grupo2" content="">

        <title>LoCar - Login</title>

        <!--<link href="dados/css/materialize.min.css" rel="stylesheet">-->
        <!--        <link rel="stylesheet" href="./dados/css/bootstrap.css">
                <link rel="stylesheet" href="./dados/css/_all-skins.min.css">
                <link rel="stylesheet" href="./dados/css/bootstrap.min.css">
                <link rel="stylesheet" href="./dados/css/AdminLTE.min.css">
                <link rel="stylesheet" href="./dados/css/font-awesome.min.css">
                <link rel="stylesheet" href="./dados/css/site.css">-->

        <?php
        echo TFuncoes::AddCss(true);
        ?>
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">-->


    </head>
    <!--<body class="loginBody">-->
    <body class="hold-transition login-page">
        <div class="login-box">

            <!--logo-->
            <div class="login-logo">
                <a href="./index.php">
                    <b>Lo</b>Car
                </a>
            </div>
            <!--Form login-->
            <div class="login-box-body ">
                <p class="login-box-msg">Entre com CPF e senha para iniciar suas vendas</p>
                <form>
                    <div class="form-group has-feedback">
                        <span data-feather="user"></span>
                        <i class="fas fa-user"></i>
                        <span class="glyphicon glyphicon-user"></span>
                            <input type="text" class="form-control" placeholder="CPF" required="required">
                            </div>

                            <div class="form-group">
                                <span class="input-group-addon">
                                    <!--<i class="fa fa-lock"></i>-->
                                </span>
                                <input type="password" class="form-control" placeholder="Senha" required="required">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary login-btn btn-block">
                                    Entrar
                                </button>
                            </div>

                            <div class="clearfix">
                                <label class="pull-left checkbox-inline"><input type="checkbox">Lembrar dados</label>
                            </div>
                            </form>
                    </div>
            </div>

            <?php
            echo TFuncoes::AddJs(true);
            ?>
            <!--<script src="./dados/js/site.js" type="text/javascript"></script>-->
            <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">-->
    </body>

</html>