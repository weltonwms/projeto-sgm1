$(document).ready(function() {
    var $results = $('.vencida').filter(function() {
        return $(this).text() !== '0';
    });

    $results.addClass('pisca');
    $results.addClass('text-danger');
    fazer_efeito_pisca();

    var x = 0;
    function fazer_efeito_pisca() {
        x++;
        if (x % 2 === 0) {
            $('.pisca').addClass('danger');
        }
        else {
            $('.pisca').removeClass('danger');
        }
        setTimeout(function() {
            fazer_efeito_pisca(  );
        }, 1000);

    }

});//fechamento do document.ready
