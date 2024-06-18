<!DOCTYPE html>
<html lang="ru" prefix="og: http://ogp.me/ns#">
<head>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>AddonMoney &ndash; Site Title</title>
    <meta name="description" content="Meta Description" />
    <meta property="og:title" content="Meta Title" />
    <meta property="og:description" content="Meta Description Property" />
    <meta property="og:image" content="https://addon.money/socmedia.jpg" />
    <meta property="og:url" content="https://addon.money/" />
    <meta property="og:site_name" content="Meta Description" />
    @vite(['resources/js/app.js', 'resources/css/app.css', 'resources/js/landing/ui.js'])
</head>
<body>
<div class="oh">
    <section class="landing no-ru">
        <header class="page-header main-header">
            <div class="wrapper">
                <div class="header-wrapper">
                    <div class="logo-lng-sw-container">
                        <a class="logotype main" href="/">
                            <img src="/img/logotype-main.svg">
                            <div class="logo-name">Addon<span>Money</span></div>
                        </a>
                        <div class="lng-switcher-wrapper">
                            <div class="lng-line lng-ru">RU</div>
                            <div class="lng-line lng-en active">EN</div>
                        </div>
                    </div>
                    <div class="header-wrapper-right">
                        <div class="not-auth-user main">
                            <button class="btn-auth login">Registration</button>
                            <button class="btn-auth login">Signin</button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="first-viewport-wrapper">
            <div class="wrapper">
                <div class="first-viewport">
                    <div class="main-h1-title">
                        <h1>Passive earnings</h1>
                    </div>
                    <p>Install a free browser extension</p>
                    <a href="/addon/" class="btn-get-addon" target="_blank">
                        <span class="icon icon-lg icon-chrome"></span>
                        Install Extension
                    </a>
                    <div class="get-another-addons">And also for Google Chrome or Opera</div>
                </div>
            </div>
        </div>
    </section>
    <section class="pay-table-wrapper-section">
        <div class="wrapper relative">
            <div class="pay-table-wrapper">
                <div class="pay-sticker">Recent payouts to users</div>
                <div class="pay-table">
                    <div class="pay-table-tr pay-table-header">
                        <div class="pt-id">User</div>
                        <div class="pt-pay-system">Payment system</div>
                        <div class="pt-payment">Wallet</div>
                        <div class="pt-amount">Total</div>
                        <div class="pt-time">MSK time</div>
                    </div>
                    <div style="height: 616px; overflow: hidden;" id="listPayout">
                        <div class="pay-table-tr odd" data-id="1">
                            <div class="pt-id">id1</div>
                            <div class="pt-pay-system"><img src="/img/qiwi.png"> Qiwi</div>
                            <div class="pt-payment">+123456789</div>
                            <div class="pt-amount">12,34 <span class="r-simbol">$</span></div>
                            <div class="pt-time">12:34 MSK</div>
                        </div>
                        <!-- More rows as needed -->
                    </div>
                </div>
            </div>
            <div class="am-in-numbers">
                <div class="item">
                    <div class="number">1,234 <span class="today">+56</span></div>
                    <p>Users in the service</p>
                </div>
                <div class="item">
                    <div class="number"><span id="money" data-id="12345">12,345</span> <span class="r-simbol">$</span></div>
                    <p>Paid to users</p>
                </div>
                <div class="item">
                    <div class="number">1,234 days</div>
                    <p>Service is running</p>
                </div>
            </div>
        </div>
    </section>
    <section class="how-it-work">
        <div class="wrapper relative">
            <header class="section-title-wrap">
                <h2 class="section-title">How to make money</h2>
            </header>
            <div class="steps">
                <div class="step-line">
                    <div class="left">
                        <img src="/img/step1.png" class="step-img">
                        <span class="step-count" data-count="1"></span>
                    </div>
                    <div class="right text">
                        Register an account with AddonMoney
                    </div>
                </div>
                <div class="step-line">
                    <div class="left text">
                        <div class="step-title">Install the extension</div>
                        <p>Install the AddonMoney extension from the official Chrome store</p>
                        <ul class="browser-step">
                            <li><a href="/addon/" target="_blank"><img src="/img/chrome.png">Google Chrome</a></li>
                            <li><a href="/addon/" target="_blank"><img src="/img/opera.png">Opera</a></li>
                            <li><a href="/addon/" target="_blank"><img src="/img/yandex.png">Yandex browser</a></li>
                        </ul>
                        <span class="step-count" data-count="2"></span>
                    </div>
                    <div class="right">
                        <img src="/img/step2.png" class="step-img">
                    </div>
                </div>
                <div class="step-line">
                    <div class="left">
                        <img src="/img/step3.png" class="step-img">
                        <span class="step-count" data-count="3"></span>
                    </div>
                    <div class="right text">
                        Mind your own business
                    </div>
                </div>
                <div class="step-line">
                    <div class="left text">
                        <div class="step-title">Get money</div>
                        <p>The extension in a separate window</p>
                        <ul class="money-step">
                            <li><img src="/img/qiwi.png">Qiwi</li>
                            <li><img src="/img/ya.png">Yoomoney</li>
                            <li><img src="/img/payeer.png">Payeer</li>
                            <li><img src="/img/mob.png">Mobile account</li>
                        </ul>
                        <span class="step-count" data-count="4"></span>
                    </div>
                    <div class="right">
                        <img src="/img/step4.png" class="step-img">
                    </div>
                </div>
            </div>
            <div class="get-addon-wrapper">
                <a href="/addon/" class="btn-get-addon" target="_blank">
                    <span class="icon icon-lg icon-chrome"></span>
                    Install Extension
                </a>
                <div class="get-another-addons">And also for Google Chrome or Opera</div>
            </div>
        </div>
    </section>
    <section class="partners-programm">
        <div class="wrapper relative">
            <div class="main-pp-container">
                <div class="left">
                    <header>Affiliate program</header>
                    <ul class="pp-items">
                        <li>
                            <div class="pp-items-title">3 levels of referrals</div>
                            <p>Get from each level respectively</p>
                        </li>
                        <li>Instant accruals to the balance</li>
                        <li>Recurring contests</li>
                    </ul>
                </div>
                <div class="right">
                    <img src="/img/pp.png">
                </div>
            </div>
            <div class="awards-block">
                <div class="left">
                    Take part in the referral contest
                    <a href="/contest" class="more">More about the competition</a>
                </div>
                <div class="right">
                    <img src="/img/pig.png">
                </div>
            </div>
        </div>
    </section>
    <section class="support-section">
        <div class="wrapper">
            <header class="section-title-wrap">We are always connected</header>
            <ul class="support-links">
                <li><a href="https://vk.com/addonmoney" target="_blank"><img src="/img/vk.png"> vk.com/addonmoney</a></li>
                <li><a href="mailto:support@addon.money"><img src="/img/mail.png"> support@addon.money</a></li>
                <li><a href="tg://resolve?domain=addonmoney_bot"><img src="/img/tg.png"> Telegram Bot</a></li>
            </ul>
        </div>
    </section>
</div>
</body>
</html>
