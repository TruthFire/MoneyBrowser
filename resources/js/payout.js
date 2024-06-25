var widget = (function () {
    var $contPay;
    var lang = 'ru';

    var text = {
        en: {
            robot: `<p>Pass the "I'm not a robot" check</p><button id="errorpayclose" type="button" class="close-pay">Close</button>`,
            stack: '<p>The payout request has been added to the queue, it will be processed soon.</p><button id="errorpayclose" type="button" class="accept-pay">Got it</button>',
            close: 'Close',
            error: '<p>Something went wrong, please contact technical support.</p><button id="errorpayclose" type="button" class="close-pay">Close</button>',
            addTg: 'Link'
        },
        ru: {
            robot: '<p>Пройдите проверку «Я не робот»</p><button id="errorpayclose" type="button" class="close-pay">Закрыть</button>',
            stack: '<p>Заявка на выплату добавлена в очередь, в ближайшее время она будет обработана.</p><button id="errorpayclose" type="button" class="accept-pay">Понятно</button>',
            close: 'Закрыть',
            error: '<p>Что-то пошло не так, напишите в техническую поддержку.</p><button id="errorpayclose" type="button" class="close-pay">Закрыть</button>',
            addTg: 'Привязать'
        }
    };

    function createEvent() {
        $contPay.find('form').on('submit', function () {
            $btnAction.prop('disabled', true);
            $error.addClass('loading active');
            var data = $(this).serialize();

            if (!grecaptcha.getResponse()) {
                $error.removeClass('loading bad good').addClass('bad');
                $error.html(text[lang].robot);
                return false;
            }

            $.ajax({
                type: "POST",
                dataType: "json",
                url: 'action_payout.php',
                data: $(this).serialize(),
                success: function (data) {
                    grecaptcha.reset();
                    if (data.status == true) {
                        $error.removeClass('loading bad good').addClass('good');
                        $error.html(text[lang].stack);
                        if (data.balance != null) $('#balance').text(data.balance);
                        if (data.push) {
                            goReview(data.push, data.pushya);
                        }
                    } else {
                        $error.removeClass('loading bad good').addClass('bad');
                        if (data.status == 'checkTG') {
                            $error.html('<p>' + data.msg + `</p><a class="close-pay" target="_blank" href="${data.link}">${text[lang].addTg}</a>`);
                            return;
                        }
                        $error.html('<p>' + data.msg + `</p><button id="errorpayclose" type="button" class="close-pay">${text[lang].close}</button>`);
                    }
                },
                error: function (data) {
                    grecaptcha.reset();
                    $error.removeClass('loading bad good').addClass('bad');
                    $error.html(text[lang].error);
                },
            });


            return false;
        });

        $contPay.on('click', '#errorpayclose', function () {

            $error.toggleClass('active').removeClass('bad good').empty();
            $btnAction.prop('disabled', false);
        })
        $inputVal.mask('9#');
        $('input[type=radio][name=system]').change(function (e) {
            setSystemMasc($(this));

            if ($(this).val() == 'ya' || $(this).data('t') == 'p') {
                $inputVal.attr('placeholder', '1000');
            } else {
                $inputVal.attr('placeholder', '100');
            }
            if ($(this).val() == 'faucet') {
                if (!$('#currency').length) {
                    let currencies = [
                        "BTC", "ETH", "DOGE", "LTC", "BCH", "DASH", "DGB", "TRX", "USDT", "FEY", "ZEC", "BNB", "SOL", "XRP", "MATIC", "ADA"
                    ];
                    $formInputs.append('' +
                        '<div class="item-label" id="currency">\n' +
                        '<div class="title">Currency</div>\n' +
                        '<div class="custom-select">\n' +
                        '        <div class="select">\n' +
                        '          <span>BTC</span>\n' +
                        '          <i class="fa fa-chevron-left"></i>\n' +
                        '        </div>\n' +
                        '        <input type="hidden" name="currency" value="BTC">\n' +
                        '        <ul class="custom-select-menu">\n' +
                        '        </ul>\n' +
                        '      </div>\n' +
                        '</div>');
                    $formInputs.children(':first-child').addClass('w-50');
                    currencies.forEach(c => $('#currency .custom-select-menu').append(`<li data-value="${c}">${c}</li>`));
                    selectEvents();
                }
            } else {
                if ($('#currency')){
                    $formInputs.children(':first-child').removeClass('w-50');
                    $('#currency').remove();
                    $customSelect.off();
                }
            }
        });

        setSystemMasc($('input[type=radio][name=system]:checked'))
        $inputAcc.focusin(function () {
            setMascVal();
        });
        $inputAcc.focusout(function () {
            setMascVal2();
        });

    }

    var mob = ['mobile', 'qiwi']

    function setMascVal2() {
        va = $('input[type=radio][name=system]:checked')
        if (mob.includes(va.val())) {
            if ($inputAcc.val().length < 2) $inputAcc.val('');
        } else if (va.val() == 'payeer') {
            if ($inputAcc.val().length < 2) $inputAcc.val('');
        } else {
            if ($inputAcc.val().length < 2) $inputAcc.val('');
        }
    }

    function setMascVal() {
        va = $('input[type=radio][name=system]:checked')
        if (mob.includes(va.val())) {
            if ($inputAcc.val().length < 2) $inputAcc.val('+');
        } else if (va.val() == 'payeer') {
            if ($inputAcc.val().length < 2) $inputAcc.val('P');
        } else {
            if ($inputAcc.val().length < 2) $inputAcc.val('');
        }
    }

    function setMascPlace() {
        $inputAcc.val('')
        va = $('input[type=radio][name=system]:checked')
        if (mob.includes(va.val())) {
            $inputAcc.attr('placeholder', '+79991234567')
        } else if (va.val() == 'ya') {
            $inputAcc.attr('placeholder', '4100000000000000')
        } else if (va.val() == 'payeer') {
            $inputAcc.attr('placeholder', 'P1000000000')
        } else if (va.val() == 'faucet') {
            $inputAcc.attr('placeholder', '18eyA4U3h1njmnDneHmVDrVWkswqwdADv')
        } else {
            $inputAcc.attr('placeholder', '')
        }
    }

    function setSystemMasc(v) {
        $inputAcc.unmask();

        if (mob.includes(v.val())) {
            $inputAcc.mask('+9#');
        } else if (v.val() == 'ya') {
            $inputAcc.mask('9#');
        } else if (v.val() == 'payeer') {
            $inputAcc.mask('P9#');
        }else if(v.val() == 'faucet') {
            $inputAcc.unmask();
        } else {
            $inputAcc.mask('9#');
        }
        setMascPlace();
    }

    function goReview(form, target) {
        yaCounter55517188.reachGoal(target);
        var mess = $('<div>');
        $('body').append(mess);
        mess.addClass('review-mess');
        mess.html(form);
        var timer = setTimeout(function () {
            mess.toggleClass('active');
        }, 300);
        mess.find('.rm-close').click(function () {
            mess.removeClass('active');
            setTimeout(function () {
                mess.remove();
            }, 500);
        });
    }

    function selectEvents (){
        $customSelect = $('.custom-select');
        $customSelect.on('click', function () {
            $(this).attr('tabindex', 1).focus();
            $(this).toggleClass('active');
            $(this).find('.custom-select-menu').slideToggle(300);
        });
        $customSelect.on('focusout', function () {
            $(this).removeClass('active');
            $(this).find('.custom-select-menu').slideUp(300);
        });
        $customSelect.on('click', '.custom-select-menu li', function () {
            $(this).parents('.custom-select').find('span').text($(this).text());
            $(this).parents('.custom-select').find('input').attr('value', $(this).attr('data-value'));
        });
        /*End Dropdown Menu*/
    }

    return {
        init: function (ln) {
            lang = ln;
            $contPay = $('.payouts');
            $formInputs = $('.pay-form-inputs');
            $customSelect = $('.custom-select');
            $btnAction = $('#payout-action');
            $inputVal = $('#payout-value');
            $inputAcc = $('#payout-account');
            $payoutToken = $('#payout-token');
            $error = $contPay.find('.payout-form-error');
            createEvent();
        }
    };
}());
