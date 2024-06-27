@php
    $currentLocale = session('locale', app()->getLocale());
@endphp

<header class="dashboard">

    <div class="wrapper">
        <div class="header account">
            <div class="left">
                <a href="/" class="project-logo">
                    <img src="/img/logotype.svg">
                    <div class="project-logo-name">Addon<span>Money</span></div>
                </a>

                <ul class="main-menu">
                    <li>
                        <a href="/referals">{{ __('navigation.refs') }}</a>
                    </li>
                    <li>
                        <a href="/payouts">{{__('navigation.payouts')}}</a>
                    </li>
                    <li>
                        <a href="/news">{{ __('navigation.news') }}</a>
                    </li>
                    <li>
                        <a href="/help">{{ __('navigation.help') }}</a>
                    </li>
                    <li class="contest">
                        <a href="/contest">{{ __('navigation.contests') }}</a>
                    </li>
                    <!--<li class="beta">
                        <a href="/beta">beta</a>
                    </li>-->

                </ul>
            </div>
            <div class="right">



                <div class="user-bar">
                    <div class="avatar" style="background-image: url(https://lh3.googleusercontent.com/a/ACg8ocLMYIjUhEchHqNL3wEmp9igkkuWoIPsJi7CsEE3ADalSe0mkg=s96-c)"></div>
                    <div class="user-account-name-wrap">
                        <div class="account-name">{{ auth()->user()->name  }}</div>
                        <div class="account-login">ID: {{auth()->user()->id}}</div>
                    </div>
                </div>
                <div class="lng-switcher-wrapper">
                    <div class="lng-line lng-ru {{ $currentLocale === 'ru' ? 'active' : '' }}">RU</div>
                    <div class="lng-line lng-en {{ $currentLocale === 'en' ? 'active' : '' }}">EN</div>
                </div>

                <a href="{{route('logout')}}" class="btn-logout">{{__('navigation.logout')}}</a>
            </div>


            <div class="block-alert">
                <div class="ba-close"></div>
                <div class="block-alert-title">Отключите блокировщики рекламы</div>
                <div class="block-alert-text">
                    <p>Если вы видите это окно, значит они включены и препятствуют работе расширения.</p>
                    <p>Обычно это расширения (Adblock, Adblock Plus), программы (AdGuard, различные встроенные фильтры в антивирусы), либо встроенная блокировка рекламы в сам браузер (Яндекс Protect и другие).</p>                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.lng-line').forEach(item => {
            item.addEventListener('click', function() {
                const langCode = this.classList.contains('lng-ru') ? 'ru' : 'en';
                fetch(`/lang/${langCode}`)
                    .then(response => {
                        location.reload();
                    })
                    .catch(error => {
                        console.error('Error switching language:', error);
                    });
            });
        });
    </script>

</header>
<div class="no-russian">
    {{__('navigation.promo')}}
</div>
