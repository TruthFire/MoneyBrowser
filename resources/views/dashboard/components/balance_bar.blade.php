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
