(function($){
    jQuery.fn.popup = function(options) {
        var popup = $(this);

        options = $.extend({
            openers: null,
            beforeOpen: null,
            beforeClose: null,
        }, options);

        if (options.openers) {

            if (options.openers == 'auto') {
                if (options.beforeOpen) {
                    var result = options.beforeOpen(popup, this);
                    if (result === false) return;
                }
                popup.addClass('open');
                $('body').addClass('popup-oh');
            }

            $(options.openers).on('click', function() {
                if (options.beforeOpen) {
                    var result = options.beforeOpen(popup, this);
                    if (result === false) return;
                }
                popup.addClass('open');
                $('body').addClass('popup-oh');
            });

        }

        $('.popup-close, .overlay', popup).on('click', function() {
            if (options.beforeClose) {
                var result = options.beforeClose(popup);
                if (result === false) return;
            }
            popup.removeClass('open');
            $('body').removeClass('popup-oh');
        });

        return popup;
    };
})(jQuery);

$('#auth-popup').popup({
    openers: $('[data-popup="auth"]')
});

$('#reg-popup').popup({
    openers: $('[data-popup="reg"]')
});



// ACCORDION //
$('.a-title').on('click', function(){
    var ac = $(this).parent();
    if (ac.hasClass('a-opened')) {
        ac.removeClass('a-opened');
        ac.find('.a-content').slideUp(500);
    }
    else {
        ac.addClass('a-opened');
        ac.find('.a-content').slideDown(500);
    }
});
// ACCORDION //



$(window).on('load', function(){
    var pnURL = location.href.split('#');
    var pnLen = $('[name="'+pnURL[1]+'"]');

    if (pnURL[1] && pnLen.length > 0 ) {
        $('html, body').animate({ scrollTop: $('[name="'+pnURL[1]+'"]').offset().top +1  }, 0 );

        if ( pnLen.children('.a-title').length > 0 ) {
            $(pnLen).find('.a-title').click();
        }
    }
    if (pnURL[1] && pnURL[1] == 'auth') {
        $('[data-popup="auth"]').click();
    }
});


(function($){
    $(document).on('click', 'a[href*=\\#]', function () {
        if ( $('[name="'+this.hash.slice(1)+'"]').length > 0 ) {
            $('html, body').animate({ scrollTop: $('[name="'+this.hash.slice(1)+'"]').offset().top +1 }, 1000 );
            $('[name="'+this.hash.slice(1)+'"]').find('.a-title').click();
            return false;
        }
    });
})(jQuery);


var X_MARGIN = 24;
var Y_MARGIN = 12;
var DELAY = 200;

var hints = document.getElementsByClassName('hint');
var tip = document.createElement('div');
var enterHandler = function enterHandler(event) {
    timer = setTimeout(function () {
        var text = event.target.getAttribute('data-hint');

        tip.innerHTML = '<span>' + text + '</span>';
        tip.style.left = '0px';
        tip.style.top = '-1000px';
        tip.style.bottom = 'auto';

        var tipWidth = tip.clientWidth;
        var tipHeight = tip.clientHeight;
        var elementPosition = event.target.getBoundingClientRect();

        var overflowNode = event.target;
        do {
            overflowNode = overflowNode.parentNode;
        } while (overflowNode.style.overflow === 'visible');

        var overflowNodePosition = overflowNode.getBoundingClientRect();
        var visibleLeft = Math.max(overflowNodePosition.left, elementPosition.left);
        var visibleRight = Math.min(overflowNodePosition.right, elementPosition.right);
        var elementCenter = (visibleRight + visibleLeft) / 2;
        var windowWidth = window.innerWidth;
        var windowHeight = window.innerHeight;
        var isFromTopDir = tipHeight + 2 * Y_MARGIN > elementPosition.top;
        var defaultMargin = -tipWidth / 2;
        var marginByLeft = Math.max(X_MARGIN - elementCenter, defaultMargin);
        var marginByRight = Math.min(windowWidth - elementCenter - X_MARGIN - tipWidth, defaultMargin);
        var marginLeft = marginByLeft > defaultMargin ? marginByLeft : marginByRight;

        tip.style.left = elementCenter + 'px';

        if (isFromTopDir) {
            tip.style.top = elementPosition.bottom + Y_MARGIN + 'px';
            tip.style.bottom = 'auto';
        } else {
            tip.style.top = 'auto';
            tip.style.bottom = windowHeight - elementPosition.top + Y_MARGIN + 'px';
        }

        tip.childNodes[0].style.marginLeft = marginLeft + 'px';
        tip.classList.toggle('tip-from-top-dir', isFromTopDir);
        tip.classList.add('tip-show');
    }, DELAY);
};
var leaveHandler = function leaveHandler() {
    clearTimeout(timer);
    tip.classList.remove('tip-show');
};
var timer = void 0;

tip.classList.add('tip');
document.body.appendChild(tip);

[].map.call(hints, function (element) {
    element.addEventListener('mouseenter', enterHandler);
    element.addEventListener('mouseleave', leaveHandler);
});





var tabsLi = $('.chart-tabs li');
tabsLi.on('click', function() {
    var activeTab = $(this);
    if (!activeTab.hasClass('active')) {
        tabsLi.removeClass('active');
        activeTab.toggleClass('active');


        chart.data.labels = charts[activeTab.data('chart')].labels;
        chart.data.datasets[0].backgroundColor = charts[activeTab.data('chart')].backgroundColor;
        chart.data.datasets[0].borderColor = charts[activeTab.data('chart')].borderColor;
        chart.data.datasets[0].data = charts[activeTab.data('chart')].data;
        chart.update();

    }
});


Share = {
    vkontakte: function(purl, ptitle, text, pimg) {
        url  = 'http://vk.com/share.php?';
        url += 'url='          + encodeURIComponent(purl);
        url += '&title='       + encodeURIComponent(ptitle);
        url += '&description=' + encodeURIComponent(text);
        url += '&image='       + encodeURIComponent(pimg);
        url += '&noparse=true';
        Share.popup(url);
    },
    odnoklassniki: function(purl, text) {
        url  = 'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1';
        url += '&st.comments=' + encodeURIComponent(text);
        url += '&st._surl='    + encodeURIComponent(purl);
        Share.popup(url);
    },
    facebook: function(purl, ptitle, text, pimg) {
        url  = 'http://www.facebook.com/sharer.php?s=100';
        url += '&p[title]='     + encodeURIComponent(ptitle);
        url += '&p[summary]='   + encodeURIComponent(text);
        url += '&p[url]='       + encodeURIComponent(purl);
        url += '&p[images][0]=' + encodeURIComponent(pimg);
        Share.popup(url);
    },
    twitter: function(purl, ptitle) {
        url  = 'http://twitter.com/share?';
        url += 'text='      + encodeURIComponent(ptitle);
        url += '&url='      + encodeURIComponent(purl);
        url += '&counturl=' + encodeURIComponent(purl);
        Share.popup(url);
    },
    mailru: function(purl, ptitle, text, pimg) {
        url  = 'http://connect.mail.ru/share?';
        url += 'url='          + encodeURIComponent(purl);
        url += '&title='       + encodeURIComponent(ptitle);
        url += '&description=' + encodeURIComponent(text);
        url += '&imageurl='    + encodeURIComponent(pimg);
        Share.popup(url)
    },

    popup: function(url) {
        var win = window.open(url, 'displayWindow', 'width=700, height=400, left=200, top=100, scrollbars=yes');
    }
};

function copyLink(element) {
    var copyText = document.getElementById(element);
    copyText.select();
    document.execCommand('copy');
}

function copyToClipboard(text) {
    var $temp = $("<textarea>");
    $("body").append($temp);
    $temp.val(text).select();
    document.execCommand("copy");
    $temp.remove();
}
