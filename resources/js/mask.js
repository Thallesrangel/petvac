$(function(){
    //$('.telefone').mask('(00) 00000-0000');
    $('.data').mask("00/00/0000", {placeholder: "__/__/____"});
    //$('.porcentagem').mask('##0,00%', {reverse: true});
    $('.dose').mask('000.000,00', {reverse: true});
    //$('.valor-unitario').mask('000,00', {reverse: true});
    //$('.valor-limite').mask('000.000,00', {reverse: true});
    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.cpf').mask('000.000.000-00', {reverse: false});
});

// Remove a formatação das máscaras ao enviar formulário

$(document).on("submit", "form", function (e) {
    $("input[type=text]").each(function() {
        $(this).unmask();
    });
});
