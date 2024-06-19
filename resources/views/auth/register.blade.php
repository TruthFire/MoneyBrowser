@extends('layouts.auth')

@section('title')
    {{ __('auth.register') }} - {{ config('app.name') }}@endsection

@section('content')
    <h2>{{__('auth.create_account')}}</h2>

    <form>
        <label for="username">{{ __('auth.username_inp') }}</label>
        <input type="email" placeholder="{{ __('auth.username_inp') }}" name="username">

        <label for="email">{{ __('auth.email_inp') }}</label>
        <input type="email" placeholder="{{ __('auth.email_inp') }}" name="email">

        <label for="password">{{ __('auth.password_inp') }}</label>
        <input type="password" placeholder={{ __('auth.password_inp') }} name="password">

        <label for="password-repeat">{{ __('auth.repeat_password') }}</label>
        <input type="password" placeholder="{{ __('auth.repeat_password') }}" name="password-repeat">

        <button type="submit" class="signin-button">{{ __('auth.account_create') }}</button>
    </form>
    <div class="signup-link">
        {{ __('auth.registered') }} <a href="#">{{ __('auth.login_now') }}</a>
    </div>
@endsection
