
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

        <?php
        echo TFuncoes::AddCss(true);
        ?>

        <!--        <link rel="stylesheet" href="./dados/css/bootstrap.min.css">
        <link rel="stylesheet" href="./dados/css/font-awesome.min.css">
        <link rel="stylesheet" href="./dados/css/AdminLTE.min.css">
        <link rel="stylesheet" href="./dados/css/_all-skins.min.css">
                <link rel="stylesheet" href="./dados/css/site.css">
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">-->

    </head>
    <!--<body class="loginBody">-->
    <body class="login-page">
        <div class="login-box">

            <!--logo-->
            <div class="login-logo">
                <a href="./index.php">
                    <b class="logo-lg">Lo</b>Car
                </a>
            </div>
            <!--Form login-->
            <div class="login-box-body ">
                <p class="login-box-msg">Entre com CPF e Senha para iniciar suas vendas</p>
                <form>
                    <div class="form-group has-feedback">
                        <div class="input-group ">
                            <span class="fas fa-user form-control-lg col-2"></span>
                            <input type="text" class="form-control" placeholder="CPF" required="required">
                        </div>
                    </div>

                    <div class="form-group has-feedback ">
                        <div class="input-group">
                            <span class="fas fa-key form-control-lg col-2"></span>
                            <input type="password" class="form-control" placeholder="Senha" required="required">
                        </div>
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
           <!--<script defer src="https://use.fontawesome.com/releases/v5.5.0/js/solid.js" integrity="sha384-Xgf/DMe1667bioB9X1UM5QX+EG6FolMT4K7G+6rqNZBSONbmPh/qZ62nBPfTx+xG" crossorigin="anonymous"></script>-->
<!--<script defer src="https://use.fontawesome.com/releases/v5.5.0/js/regular.js" integrity="sha384-XrvTJeiQ46fxxPrZP6fay5yejA2FV4G1XsS8E4Piz6Fz+7FaEFTw7A7GR972irVV" crossorigin="anonymous"></script>-->
<!--<script defer src="https://use.fontawesome.com/releases/v5.5.0/js/brands.js" integrity="sha384-S2C955KPLo8/zc2J7kJTG38hvFV+SnzXM6hwfEUhGHw5wPo6uXbnbjSJgw3clO4G" crossorigin="anonymous"></script>-->
<!--<script defer src="https://use.fontawesome.com/releases/v5.5.0/js/fontawesome.js" integrity="sha384-bNOdVeWbABef8Lh4uZ8c3lJXVlHdf8W5hh1OpJ4dGyqIEhMmcnJrosjQ36Kniaqm" crossorigin="anonymous"></script>-->
    </body>

</html>