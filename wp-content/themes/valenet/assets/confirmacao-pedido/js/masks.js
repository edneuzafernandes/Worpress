$(document).ready(function () {

    $("#cep").mask('00000-000');
    $("#numero").mask('0000000000');
    $("#telefone1").mask("(99) 99999-9999");
    $("#data_nascimento").mask("99/99/9999");
    $("#numero_cartao").mask("9999 9999 9999 9999");

    function inputHandler(masks, max, event) {
        var c = event.target;
        var v = c.value.replace(/\D/g, '');
        var m = c.value.length > max ? 1 : 0;
        VMasker(c).unMask();
        VMasker(c).maskPattern(masks[m]);
        c.value = VMasker.toPattern(v, masks[m]);
    }

    var telMask = ['(99) 9999-99999', '(99) 99999-9999'];

    var tel = document.querySelector('input[id=telefone2]');
    VMasker(tel).maskPattern(telMask[0]);
    tel.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);

    // var telefoneValenetTeLiga = document.querySelector('input[id=valenetTeLigaTelefone]');
    // VMasker(telefoneValenetTeLiga).maskPattern(telMask[0]);
    // telefoneValenetTeLiga.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);



    // $("#cnpj_cpf").keydown(function () {
    //     try {
    //         $("#cnpj_cpf").unmask();
    //     } catch (e) { }

    //     var tamanho = $("#cnpj_cpf").val().length;

    //     $("#cnpj_cpf").mask("999.999.999-99");

    //     // if (tamanho < 11) {
    //     //     $("#cnpj_cpf").mask("999.999.999-99");
    //     // } else {
    //     //     $("#cnpj_cpf").mask("99.999.999/9999-99");
    //     // }
    // });

    var $campoCPF = $("#cnpj_cpf");
    $campoCPF.mask('000.000.000-00', {reverse: true});

});