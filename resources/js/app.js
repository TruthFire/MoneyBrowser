import './bootstrap';


var $lp = $('#listPayout');
var cells = [];
var typePayout = {qiwi : '<img src="https://addon.money/img/qiwi.png"> Qiwi',
    ya : '<img src="https://addon.money/img/ya.png"> Яндекс.Кошелёк',
    mobile : '<img src="https://addon.money/img/mob.png"> Счёт мобильного',
    payeer : '<img src="https://addon.money/img/payeer.png"> Payeer'};
var $ttr;
var $money = $('#money');
var money = $money.data('id');
var a = setInterval(function(){
    $ttr = $lp.find('.pay-table-tr:first');

// number_format(/ 100, 2, ',', '')
var b = setInterval(function(){
    var cell = cells.pop();
    if(cell){
        $lp.prepend('<div style="" class="pay-table-tr hd ' + ($ttr.hasClass('odd') ? '': 'odd' ) + '" data-id="'+ cell['id'] +'">' +
            '<div class="pt-id">id'+ cell['uid'] +'</div>' +
            '<div class="pt-pay-system">' + typePayout[cell['system']] + '</div>' +
            '<div class="pt-payment">' + (cell['system'] != 'ya' ? (cell['system'] == 'payeer' ? 'P' : '+'): '') + cell['account'] + ' </div>' +
            '<div class="pt-amount">' + (cell['value'] / 100).toFixed(2).replace('.', ',') + ' <span class="r-simbol">₽</span></div>' +
            '<div class="pt-time">' + cell['time'] + ' МСК</div>' +
            '</div>');
        //$lp.find('.pay-table-tr:first').removeClass('hd');
        setTimeout(function(){
            //clearInterval(b);
            $ttr.addClass('show');
            money += (cell['value'] / 100);
            $money.text(Intl.NumberFormat('ru-RU').format(Math.floor(money)));
        }, 15);
        $ttr = $lp.find('.pay-table-tr:first');
        $lp.find('.pay-table-tr:last').remove();
    }
}, 300);}, 3000)
