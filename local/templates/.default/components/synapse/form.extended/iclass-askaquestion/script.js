$(document).ready(function () {
    $(".dialog").fancybox({
        'hideOnContentClick': true
    });

    $("#form_" + FORM_ID +" [name=NAME]")
        .valAttr('', 'required')
        .valAttr('error-msg-container', '#NAME-error-dialog');
    $("#form_" + FORM_ID + " [name=PHONE]")
        .valAttr('', 'required')
        .valAttr('error-msg-container', '#PHONE-error-dialog');
    $("#form_" + FORM_ID + " [name=EMAIL]")
        .valAttr('', 'required mymail')
        .valAttr('error-msg-required', 'Поле не заполнено!')
        .valAttr('error-msg-mymail', 'E-mail некорректен!')
        .valAttr('error-msg-container', '#EMAIL-error-dialog');
    $("#form_" + FORM_ID + " [name=MESSAGE]")
        .valAttr('', 'required')
        .valAttr('error-msg-container', '#MESSAGE-error-dialog');
    $("#form_" + FORM_ID + " [name=PERSONAL_DATA]:eq(0)")
        .valAttr('', 'checkbox_group')
        .valAttr('qty', 'min1')
        .valAttr('error-msg', 'Необходимо дать согласие на обработку персональных данных!')
        .valAttr('error-msg-container', '#checkbox-error-dialog');
    $("#form_" + FORM_ID + " [name=RECAPTCHA]")
        .valAttr('', 'recaptcha')
        .valAttr('error-msg', 'Пройдите защиту от автоматической регистрации!');

    $("#form_" + FORM_ID).on("submit", function (event) {
        event.preventDefault();
    });
    $("[name=AJAX_MODE]").val("Y");

    $.formUtils.addValidator({
        name: 'mymail',
        validatorFunction: function (value, $el, config, language, $form) {
            var val = removeDoubleSpacesAndTrim(value);
            val = punycode.ToASCII(val);

            if ($el.attr("data-validation").indexOf('required') == -1) {
                if (val.length == 0) {

                    return true;
                }
            }
            if (val.length > 320) {
                return false;
            }
            var atom = "=_0-9a-z+~'!\$&*^`|\\#%/?{}-";
            var pattern = '^[' + atom + ']+(\\.[' + atom + ']+)*@(([-0-9a-z_]+\\.)+)([a-z0-9-]{2,20})$';
            var matches = val.match(new RegExp(pattern, "gi"));

            if (matches != null) {
                if (matches[0].length > 0) {
                    return true;
                }
                else {
                    return false;
                }
            } else {
                return false;
            }

        },
        errorMessage: 'Неверный формат e-mail',
        errorMessageKey: 'badEmail'
    });
    var myLanguage = {
        requiredField: "Поле не заполнено!",
        badEmail: 'Неверный формат e-mail',
    };
    $.validate(
        {
            debug: true,
            lang: 'ru',
            form: '#form_' + FORM_ID,
            modules: 'security',
            language: myLanguage,
            reCaptchaSiteKey: RE_SITE_KEY,
            reCaptchaTheme: 'light',
            reCaptchaSize: screen.width <= 320 ? 'compact' : 'normal',
            onError: function () {
                console.log('on err');
            },
            onSuccess: function ($form) {
                console.log('on success');
                $form.find("[name=submit]").html("Отправка...").attr("disabled", "disabled");
                submitForm($form);
            },
        }
    );

    function submitForm($form) {
        $form.ajaxSubmit({
            data: {
                submit: 'Отправить'
            },
            success: function (data) {
                var start_label = '<div id="start_errors" hidden></div>';
                var end_label = '<div id="end_errors" hidden></div>';
                var first_pos = data.indexOf(start_label) + start_label.length;
                var _data = data.substr(first_pos).trim();
                var last_pos = _data.indexOf(end_label);
                var error_block = _data.substr(0, last_pos);
                if (last_pos > 0) {
                    $("[name=submit]").val("Отправить").removeAttr('disabled');
                    $("#form_submit_errors").removeAttr('hidden').html(error_block);
                } else {
                    $("#form_submit_errors").attr('hidden', '').html('');
                    $form.closest('.footer-form').addClass('sended').append("<span class=\"success-ajax-submit\">" + SUCCESS_MESSAGE + "</span>");
                }
                ;
            }
        });
        return false;
    };

    function removeDoubleSpacesAndTrim(str) {
        str = str.replace(/\s\s/g, '');

        if (!String.prototype.trim) {
            (function () {
                var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                String.prototype.trim = function () {
                    return this.replace(rtrim, '');
                };
            })();
        }

        str = str.trim();
        return str;
    }

    $('.PHONE-mfask-field input').inputmask("+7 (999) 999-99-99", {
        placeholder: "_",
    });
    console.log('inputmask')
});
