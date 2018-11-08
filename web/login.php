
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
        echo TFuncoes::AddCssLogin();
        ?>
        <!--<link href="dados/css/materialize.min.css" rel="stylesheet">-->

    </head>
    <body class="login-page" style="overflow: hidden;">
        <div class="login-box">

            <!--logo-->
            <div class="login-logo">
                <a href="./index.php">
                    <b class="logo-lg">Lo</b>Car
                </a>
            </div>
            <!--Form login-->
            <div class="login-box-body">
                <p class="login-box-msg">Entre com CPF e Senha para iniciar suas vendas</p>
                <form>
                    <div class="form-group has-feedback">
                        <div class="input-group ">
                            <span class="input-group-text">
                                <span class="material-icons">person</span>
                                <input type="text" class="form-control" placeholder="CPF" required="required">
                            </span>
                        </div>
                    </div>


                    <div class="form-group has-feedback ">
                        <div class="input-group">
                            <span class="input-group-text">
                                <span class="material-icons">lock</span>
                                <input type="password" class="form-control" placeholder="Senha" required="required">
                            </span>
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
    </body>

</html>