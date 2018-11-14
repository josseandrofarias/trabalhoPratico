function Login() {

    var eu = this;

    this.ipt_login = $('#cpf');
    this.ipt_senha = $('#senha');
    this.btn = $('button');


    this.btn.click(function (e) {
        e.preventDefault();
        $.ajax({
            url: "vLogin.php",
            type: 'post',
            data: {
                l : eu.ipt_login.val(),
                s : eu.ipt_senha.val()
            },
        }).done(function (msg) {
            // console.log(msg)
            // msg = eval(msg);
            // console.log(msg);
            if(msg == 'false'){
                bootbox.dialog({message: 'Usuário ou senha inválido!', buttons: {
                        f: {
                            label: 'Fechar',
                            className: 'btn-danger'
                        }
                    }});
            }else
            {
                // location.reload();
                window.location.replace("index.php");

            }
        });
    });

    this.ipt_login.focus();
}

$(window).on('load', function () {

    new Login();
});