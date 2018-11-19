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

function ValidaCampo(){
    var eu = this;
    this.ipt_login = $('#cpf');

    eu.ipt_login.keyup(function() {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = $(this);
        if (er.test(campo.val())) {
            campo.val("");
        }
    });
}
var controle = false;
function ValidaCpf(){
    var eu = this;
    this.ipt_login = $('#cpf');

    eu.ipt_login.blur(function () {
        if(!eu.ipt_login.val() == ""){

            if ( TestaCPF(eu.ipt_login.val()) === true ) {
                eu.ipt_login.parent().css({ "background-color": "#e9ecef", "border-color":"#ced4da", "color":"#495057"});
                eu.ipt_login.parent().children("a").remove();
            }else {
                eu.ipt_login.parent().css({ "background-color": "#ff0000", "border-color":"#000000", "color":"#ffffff"});
                if(!controle) {
                    eu.ipt_login.parent().append("<a>CPF Inválido!</a>");
                    controle = true;
                }
            }
        }
    });

    function TestaCPF(strCPF) {
        var Soma;
        var Resto;
        Soma = 0;
        if (strCPF == "00000000000") return false;

        for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;

        Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
        return true;
    }
}


$(window).on('load', function () {
    new Login();
    new ValidaCpf();
    new ValidaCampo();

});