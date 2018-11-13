function Relatorio() {

    var eu = this;

    this.ipt_dataini = $('#datai');
    this.ipt_datafin = $('#dataf');
    this.tipo = $('#tipo');
    this.btnGerar = $('#btnGerar');


    this.btnGerar.click(function (e) {
        console.log(eu.ipt_datafin.val());
        console.log(eu.ipt_dataini.val());
        console.log(eu.tipo.val());

        $.ajax({
            url: "./gerar_relatorio.php",
            type: 'post',
            data: {
                dataini : eu.ipt_dataini.val(),
                datafin : eu.ipt_datafin.val(),
                tipo : eu.tipo.val()
            }
            // beforeSend : function(){
            //     console.log('asd')
            //     $("#result").html("ENVIANDO...");
            // }
        }).done(function (dados) {
            if(dados == false) {
                $("#result").html("<div class='row'>Não foi possível gerar relatório</div>");
            }else{
                e.preventDefault();}
            //     $('#result').html(dados);
            // console.log(dados);
            // }
        });


    });

}

$(window).on('load', function () {

    new Relatorio();
});