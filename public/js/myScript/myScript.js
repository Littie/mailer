$(document).ready(function(){
    hideDiv();
    $('.shiftCheckbox').shiftcheckbox();
    $('#checkbox').on('click', function(){
        if($('#checkbox>span').text() == 'check'){
            $("input[type=checkbox]").prop('checked', true);
            $('#checkbox>span').text('uncheck');
        }
        else {
            $("input[type=checkbox]").prop('checked', false);
            $('#checkbox>span').text('check');
        }


        //  $("input[type=checkbox]").prop('checked', false);
    });

    $('html').keydown(function(eventObject){ //отлавливаем нажатие клавиш
        if (event.keyCode == 46) { //если нажали Enter, то true
            $('#mail-form').submit();
        }
    });

    function hideDiv(){
        setTimeout(function(){$('.notification').fadeOut()}, 3000);
    }

});