@extends('layouts.app')

@section('content')
    <section class="balance-bar-wrapper">
        <div class="wrapper">
            <div class="balance-bar">
                <div class="left">
                    <div class="item">
                        <div class="title-balance">{{__('dashboard.balance')}}</div>
                        <div class="count orange">
                            <span class="icon icon-lg icon-currency"><i class="fa-solid fa-coins"></i></span>
                            <span class="currency" id="balance">{{auth()->user()->getCurrentBalance()}}</span>
                        </div>
                    </div>

                    <div class="item">
                        <div class="title-balance">{{__('dashboard.today')}}</div>
                        <div class="count">
                            <span class="icon icon-lg icon-currency-gray"><i class="fa-solid fa-coins"></i></span>
                            <span class="currency">{{auth()->user()->getEarningsToday()}}</span>
                        </div>
                    </div>

                    <div class="item">
                        <div class="title-balance">{{__('dashboard.on_referrals')}}</div>
                        <div class="count">
                            <span class="icon icon-lg icon-currency-gray"><i class="fa-solid fa-coins"></i></span>
                            <span class="currency">{{ auth()->user()->getReferralEarnings() }}</span>
                        </div>
                    </div>
                </div>

                <div class="right">
                    <input id="value-version-account" hidden="">
                    <input id="value-version-account-store" hidden="">



                    <a href="https://m.sitehelp.me/vkGroup?siteId=j1qwzyrwr7500co4bl79xddblrn5eq08&amp;clientId=v3EX9i2XX4O1fNwTTvekrEbawkuNamNr&amp;url=https%3A%2F%2Fvk.com%2Faddonmoney" target="_blank" class="hint go-group vk" data-hint="Группа ВКонтакте">
                        <i class="fab fa-vk"></i>
                    </a>
                    <a href="tg://resolve?domain=addonmoney" target="_blank" class="hint go-group tg" data-hint="Telegram-сообщество">
                        <i class="fab fa-telegram-plane"></i>
                    </a>

                    <a href="https://zismo.biz/topic/1013290-addonmoney-zarabotok-na-rasshirenii-bez-vlozhenij-ofitci/" target="_blank" class="hint go-group zismo" data-hint="Официальная тема на ZiSMO">
                        ZiSMO
                    </a>

                    <a href="https://gde.cash/extentions/addonmoney" target="_blank" class="hint go-group gdecash" data-hint="Мы в ТОПе на gde.cash!">
                        gde.cash
                    </a>

                    <a href="/addon/" class="download-addon" id="status_ext" target="_blank">
                        <span class="icon icon-sm icon-addon"></span>
                        <span id="text_status_ext">Установить расширение</span>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <section class="main-container">
        <div class="wrapper">
            <div class="widjets">
                <div class="informers-wrapper">
                    <div class="informers-wrapper-cont">
                        <div class="informers-wrapper-out">

                            <div class="informers">
                                <div class="item">
                                    <div class="i-am-online">
                                        <div class="informer-content">
                                            <div class="title">{{__('dashboard.today_online')}}                                                    <span class="info-tooltip hint" data-hint="Время, которое расширение включено, и имеется постоянное соединение с сервером. Данные обновляются каждые 4 минуты. Если расширение запущено, но продолжительное время отображается 0, напишите в техническую поддержку.">?</span>
                                            </div>
                                            <div class="i-counter">0</div>
                                        </div>
                                        <div class="progress-line dark"><span style="width: 0%"></span></div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="i-am-online">
                                        <div class="informer-content">
                                            <div class="title">{{__('dashboard.completed_tasks')}}                                                    <span class="info-tooltip hint " data-hint="Показатель отображает, какой процент заданий выполнен из доступных сегодня. Если вы достигли отметки 100%, значит все задания выполнены. Расширение перейдет в режим ожидания и продолжит работу, как только появятся новые задания или наступят новые сутки (по МСК).">?</span>
                                            </div>
                                            <div class="i-counter">0%</div>
                                        </div>
                                        <div class="progress-line dark"><span style="width: 0%"></span></div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="i-am-online">
                                        <div class="informer-content">
                                            <div class="title">{{__('dashboard.earning_lvl')}}                                                    <span class="info-tooltip hint" data-hint="Показатель отношения вашего дохода от расширения к среднему по системе с учетом страны. Рассчет ведется в рамках текущих суток.">?</span>
                                            </div>
                                            <div class="i-counter"><span class="dark">0/</span>0</div>
                                        </div>
                                        <div class="progress-line dark"><span style="width: 0%"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="payouts-wrapper">
                    <div class="payouts">
                        <header class="widjet-title between">
                            <div class="left">
                                <div class="title">{{ __('dashboard.withdraw_title') }}</div>
                                <div class="description">{{ __('dashboard.withdraw_rate') }}</div>
                            </div>

                            <div class="right">
                                <a href="/payouts" class="black solid">{{ __('dashboard.withdraw_history') }}</a>
                            </div>
                        </header>

                        <form class="payout-form-relative">
                            <div class="form-patouts">
                                <div class="pay-types">
                                    <div class="item">
                                        <input type="radio" name="system" value="payeer" id="payout6" checked="">
                                        <label for="payout6" class="payeer  hint" data-hint="Суточный лимит вывода на Payeer 5000 поинтов">
                                            <div class="pay-icon pay-icon-payeer"></div>
                                            <div class="pay-name">Payeer</div>
                                        </label>
                                    </div>
                                    <div class="item">
                                        <input type="radio" data-t="p" name="system" value="qiwi" id="payout1" disabled="">
                                        <label for="payout1" class="qiwi hint" data-hint="Этот способ временно недоступен">
                                            <div class="pay-icon pay-icon-qiwi"></div>
                                            <div class="pay-name">Qiwi</div>
                                        </label>
                                    </div>
                                    <div class="item">
                                        <input type="radio" name="system" value="ya" id="payout3" disabled="">
                                        <label for="payout3" class="ya hint" data-hint="Этот способ временно недоступен">
                                            <div class="pay-icon pay-icon-ya"></div>
                                            <div class="pay-name">YooMoney</div>
                                        </label>
                                    </div>
                                    <div class="item">
                                        <input type="radio" name="system" value="mobile" id="payout5" disabled="">
                                        <label for="payout5" class="mobile hint" data-hint="Этот способ временно недоступен">
                                            <div class="pay-icon pay-icon-mobile"></div>
                                            <div class="pay-name">Мобильный</div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="pay-form-inputs">
                                <div class="item-label">
                                    <div class="title">{{ __('dashboard.withdraw_rate') }}</div>
                                    <input id="payout-account" name="account" type="text" autocomplete="off" placeholder="P1000000000">
                                </div>
                                <div class="item-label">
                                    <div class="title">{{ __('dashboard.amount') }}</div>
                                    <input id="payout-value" name="value" type="text" value="" placeholder="1000" autocomplete="off">
                                    <input id="payout-csrf" name="csrf" type="text" value="119fb8c591c044458f6974351149f670" hidden="">
                                </div>
                            </div>
                            <div class="capcha-action">
                                <div class="item-label">
                                    <div class="g-recaptcha" data-sitekey="6LeuIL4UAAAAAHgT1ir2kCjOaU6F1UAcTmWiFr5M"><div style="width: 304px; height: 78px;"><div><iframe title="reCAPTCHA" width="304" height="78" role="presentation" name="a-jlbrdwkpgl9m" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LeuIL4UAAAAAHgT1ir2kCjOaU6F1UAcTmWiFr5M&amp;co=aHR0cHM6Ly9hZGRvbi5tb25leTo0NDM.&amp;hl=en&amp;v=KXX4ARWFlYTftefkdODAYWZh&amp;size=normal&amp;cb=2ims2fhwzf"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div><iframe style="display: none;"></iframe></div>
                                </div>
                                <div class="item-label">

                                    <button class="btn" id="payout-action">{{ __('dashboard.withdraw') }}</button>
                                    <span class="my-payout-limit">{{__('dashboard.day_limit')}}:
                                                    <span class="info-tooltip hint" data-hint="Это максимально доступная сумма к выводу за сутки. Лимит может быть индивидуально увеличен для пользователей с большой реферальной сетью. По всем вопросам обращайтесь в службу поддержки.<br><br><div style='color: #e74141; font-weight: 600;'>Победители конкурса могут сделать разовый вывод точно равный сумме приза.</div>">?</span>
                                        <b>5000</b> {{trans_choice('dashboard.points', 5000)}}</span>
                                </div>
                            </div>

                            <div class="payout-form-error"></div>
                        </form>
                    </div>
                </div>

                <div class="referals-wrapper">
                    <div class="referals">
                        <div class="referals-top">
                            <header class="widjet-title">
                                <div class="left">
                                    <div class="title">{{__('dashboard.affiliate_title')}}</div>
                                    <div class="description">{{ __('dashboard.affiliate_rates') }}</div>
                                </div>
                            </header>

                            <div class="ref-link-wrapper">
                                <div class="item-label">
                                    <div class="title">{{ __('dashboard.ref_link') }}</div>
                                    <div class="item-label-wrapper">
                                        <div class="item-label-wrapper-input">
                                            <input id="reflink" type="text" value="https://addon.money/p/{{auth()->user()->id}}" readonly>
                                            <div class="copy-ref-link hint" data-hint="Скопировать" onclick="copyLink('reflink')"><span class="icon icon-sm icon-copy"></span></div>
                                        </div>
                                        <button class="share vk hint" data-hint="Поделиться ВКонтакте" onclick="Share.vkontakte('https://addon.fun/p/{{auth()->user()->id}}', 'AddonMoney — заработок в интернете на полном автомате!', '', 'https://addon.money/socmedia.jpg')">
                                            <i class="fab fa-vk"></i>
                                        </button>
                                        <!--<button class="share fb hint" data-hint="Поделиться в Facebook" onclick="Share.facebook('https://addon.money/p/956452', 'AddonMoney — заработок в интернете на полном автомате!', '', 'https://addon.money/socmedia.jpg')">
                                                <i class="fab fa-facebook-f"></i>
                                            </button>
                                            <button class="share ok hint" data-hint="Поделиться в Одноклассники" onclick="Share.odnoklassniki('https://addon.money/p/956452', 'AddonMoney — заработок в интернете на полном автомате!', '', 'https://addon.money/socmedia.jpg')">
                                            <i class="fab fa-odnoklassniki"></i>
                                        </button>-->
                                    </div>
                                </div>
                            </div>
                            <div class="refs-title">{{ __('dashboard.ref_num') }}</div>
                            <div class="refs-count-wrapper">
                                <div class="item">
                                    <div class="ref-count">{{__('dashboard.lvl_1')}}: <span>{{ $referralsCount['first_level'] }}</span></div>
                                    <div class="ref-count">{{ __('dashboard.today_refs') }}: <span>0</span></div>
                                </div>
                                <div class="item">
                                    <div class="ref-count">{{ __('dashboard.lvl_2') }}: <span>{{$referralsCount['second_level']}}</span></div>

                                </div>
                                <div class="item">
                                    <div class="ref-count">{{__('dashboard.lvl_3')}}: <span>{{$referralsCount['third_level']}}</span></div>

                                </div>
                            </div>
                        </div>

                        <div class="ref-action-links">
                            <a href="/referals" class="black solid">{{ __('dashboard.ref_list') }}</a>
                            <a href="/referals/promo" class="black solid">{{ __('dashboard.promo_materials') }}</a>
                        </div>

                    </div>
                </div>


{{--                <div class="informers-wrapper">--}}
{{--                    <div class="informers-wrapper-cont">--}}
{{--                        <div class="informers-wrapper-out" style="text-align: center;">--}}
{{--                            <a target="_blank" href="https://bux.money/u/2">--}}
{{--                                <img src="https://bux.money/assets/media/bm/u/111123pppppa.gif" alt="">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


                <div class="charts-wrapper">

                    <div class="info-panel-help-wrapper">
                        <div class="info-panel-help">
                            <ul>
                                <li><a href="/help/#how-it-work">Как это работает?</a></li>
                                <li><a href="/help/#why-not-payed">Почему нет начислений поинтов?</a></li>
                                <li><a href="/help/#stopped-charging">Перестало начислять, что делать?</a></li>
                            </ul>

                            <div class="more-help">Ответы на все вопросы в <a href="/help">Базе знаний</a></div>
                        </div>
                        <div class="charts">
                            <header class="widjet-title between">
                                <div class="left">
                                    <div class="title">Статистика доходов</div>
                                    <div class="description">Здесь отображена статистика доходов за последние 14 дней.</div>
                                </div>

                                <div class="right">
                                    <ul class="chart-tabs">
                                        <li class="tab active" data-chart="all">
                                            Все                                            </li>
                                        <li class="tab" data-chart="addon">
                                            Расширение                                            </li>
                                        <li class="tab" data-chart="referals">
                                            Рефералы                                            </li>
                                    </ul>
                                </div>
                            </header>

                            <div class="chartplace" id="chartplace"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="myChart" style="display: block; width: 1140px; height: 300px;" width="1140" height="300" class="chartjs-render-monitor"></canvas>
                                <script>

                                    var charts = {
                                        all: {
                                            labels: ["12.06","13.06","14.06","15.06","16.06","17.06","18.06","19.06","20.06","21.06","22.06","23.06","24.06","25.06"],
                                            data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                                            backgroundColor: 'rgba(255, 160, 0, 0.4)',
                                            borderColor: 'rgba(255, 160, 0, 0.8)'
                                        },
                                        addon: {
                                            labels: ["12.06","13.06","14.06","15.06","16.06","17.06","18.06","19.06","20.06","21.06","22.06","23.06","24.06","25.06"],
                                            data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                                            backgroundColor: 'rgba(231, 65, 65, 0.4)',
                                            borderColor: 'rgba(231, 65, 65, 0.8)'
                                        },
                                        referals: {
                                            labels: ["12.06","13.06","14.06","15.06","16.06","17.06","18.06","19.06","20.06","21.06","22.06","23.06","24.06","25.06"],
                                            data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0],
                                            backgroundColor: 'rgba(77, 207, 105, 0.4)',
                                            borderColor: 'rgba(77, 207, 105, 0.8)'
                                        }

                                    }

                                    var ctx = document.getElementById('myChart').getContext('2d');
                                    var chart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: charts.all.labels,
                                            datasets: [{
                                                label: '',
                                                backgroundColor: charts.all.backgroundColor,
                                                borderColor: charts.all.borderColor,
                                                data: charts.all.data
                                            }]
                                        },

                                        // Configuration options go here
                                        options: {
                                            responsive: true,
                                            maintainAspectRatio: false,
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true
                                                    }
                                                }]
                                            },
                                            legend: {
                                                display: false
                                            },
                                            tooltips: {
                                                mode: 'index',
                                                intersect: false,
                                            },
                                            hover: {
                                                mode: 'nearest',
                                                intersect: true
                                            }
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div></section>
@endSection
