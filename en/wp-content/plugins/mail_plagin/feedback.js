
jQuery(document).ready(function ($) {
    var add_form = $('#feedback'),
        div_request = $('#request');

    // Сброс значений полей
    $('#feedback input, #feedback textarea').on('blur', function () {
        $('.error,.success').remove();
        $('#submit').val('Надіслати');
    });

    // Отправка значений полей
    var options = {
        url: feedback_object.url,
        data: {
            action: 'feedback_action',
            nonce: feedback_object.nonce
        },
        type: 'POST',
        dataType: 'json',
        beforeSubmit: function (xhr) {
            // При отправке формы меняем надпись на кнопке
            $('#submit').val('Відправляємо ...');
        },
        success: function (request, xhr, status, error) {

            if (request.success === true) {
                // Если все поля заполнены, отправляем данные и меняем надпись на кнопке
                div_request.before('<div class="success">' + request.data + '</div>').slideDown();
                $('#submit').val('Надіслати');
            } else {
                if(request.constructor === Object){

                    $.each(request.data, function (key, val) {
                        // $(key).addClass('error');
                        // $(key).before('<span class="error-' + key + '">' + val + '</span>');
                        div_request.before('<div class="error">' + val + '</div>').slideDown();
                    });

                 }else{
                    div_request.before('<div class="error">' + request.data + '</div>').slideDown();
                }
                $('#submit').val('Щось пішло не так...');

            }
            // При успешной отправке сбрасываем значения полей
            $('#feedback')[0].reset();
        },
        error: function (request, status, error) {
            $('#submit').val('Щось пішло не так...');
        }
    };
    // Отправка формы
    add_form.ajaxForm(options);
});
