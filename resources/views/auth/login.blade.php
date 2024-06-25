@extends('layouts.auth')

@section('title')
    {{ __('auth.login') }} - {{ config('app.name') }}@endsection

@section('content')
    <h2>{{__('auth.signin')}}</h2>

    <form action="{{url('/login')}}" method="post">
        @csrf
        <label for="username">{{ __('auth.email_inp') }}</label>
        <input type="email" placeholder={{ __('auth.email_inp') }} name="email">
        <label for="password">{{ __('auth.password_inp') }}</label>
        <input type="password" placeholder={{ __('auth.password_inp') }} name="password">
        <div class="remember-me">
            <label><input type="checkbox"> {{ __('auth.remember') }}</label>
            <a href="#" class="forgot">{{ __('auth.forgot') }}</a>
        </div>
        <button type="submit" class="signin-button">{{ __('auth.login') }}</button>
    </form>
    <div class="signup-link">
        {{ __('auth.not_member') }} <a href="{{url('/register')}}">{{ __('auth.signup_now') }}</a>
    </div>
    <div class="splitter">
        — {{ __('auth.or_with') }} —
    </div>
    <div class="socials">
        <button class="social-btn telegram">
            <i class="fa-brands fa-telegram"></i></button>
        <button class="social-btn google">
            <i class="fa-brands fa-google"></i></button>
        <button class="social-btn vk">
            <i class="fa-brands fa-vk"></i></button>
        <button class="social-btn yandex">
            <i class="fa-brands fa-yandex-international"></i></button>
    </div>
@endsection
