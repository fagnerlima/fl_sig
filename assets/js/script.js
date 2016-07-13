/*
 * Máscaras de Formulário
 */
$('#data_nascimento').mask('00/00/0000');
$('#end_cep').mask('00000-000');

$('#telefone1, #telefone2').mask('(00) 00000-0009');
$('#telefone1, #telefone2').keypress(function () {
    if ($(this).val().length == 15) // Celular com 9 dígitos -> (00) 00000-0000
        $(this).mask('(00) 00000-0009');
    else
        $(this).mask('(00) 0000-00009');
});

$('#valor').maskMoney({
    symbol : 'R$ ',
    showSymbol : true,
    thousands : '.',
    decimal : ','
});