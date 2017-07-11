$(document).on("ready", inicio);

function inicio() {
    $("span.help-block").hide();
    $("#btnvalidar").click(function () {

    });
    $("#campos").keyup(validar);
    $("#campos1").keyup(validar);
   
}

function validar() {
    var valor = document.getElementById("campos").value;
    var valor1 = document.getElementById("campos1").value;
   
    var verifica = 0;
    if (valor == null || valor.length == 0) {
        $("#iconotexto1").remove();
        $("#campos").parent().parent().attr("class", "form-group has-error has-feedback");
        $("#campos").parent().children("span").text("Digite seu nome do login").show();
        $("#campos").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-remove form-control-feedback'></span>");


    } else {
        $("#iconotexto1").remove();
        $("#campos").parent().parent().attr("class", "form-group has-success has-feedback");
        $("#campos").parent().children("span").text("").hide();
        $("#campos").parent().append("<span id='iconotexto1' class='glyphicon glyphicon-ok form-control-feedback'></span>");
        verifica++;
    }
    if (valor1 == null || valor1.length == 0) {
        $("#iconotexto").remove();
        $("#campos1").parent().parent().attr("class", "form-group has-error has-feedback");
        $("#campos1").parent().children("span").text("Digite sua senha").show();
        $("#campos1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
    } else {
        $("#iconotexto").remove();
        $("#campos1").parent().parent().attr("class", "form-group has-success has-feedback");
        $("#campos1").parent().children("span").text("").hide();
        $("#campos1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
        verifica++;
    }
     if (verifica == 2) {
        $("button").prop("disabled", false);
    } else {
        $("button").prop("disabled", true);
    }

}

