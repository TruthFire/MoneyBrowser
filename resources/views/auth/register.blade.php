@extends('layouts.auth')

@section('title')
    {{ __('auth.register') }} - {{ config('app.name') }}@endsection

@section('content')
    <h2>{{__('auth.create_account')}}</h2>

    <form action="{{ url('/register') }}" method="post">
        @csrf
        <div class="input-group">
            <label for="name">{{ __('auth.username_inp') }}</label>
            <input type="text" placeholder="{{ __('auth.username_inp') }}" name="name">
            @if($errors->has('name'))
                <span class="error">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="input-group">
            <label for="email">{{ __('auth.email_inp') }}</label>
            <input type="email" placeholder="{{ __('auth.email_inp') }}" name="email">
            @if($errors->has('email'))
                <span class="error">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="input-group">
            <label for="password">{{ __('auth.password_inp') }}</label>
            <input type="password" placeholder={{ __('auth.password_inp') }} name="password">
            @if($errors->has('password'))
                <span class="error">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="input-group">
            <label for="password-repeat">{{ __('auth.repeat_password') }}</label>
            <input type="password" placeholder="{{ __('auth.repeat_password') }}" name="password_confirmation">
            @if($errors->has('password_confirmation'))
                <span class="error">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <button type="submit" class="signin-button">{{ __('auth.account_create') }}</button>
    </form>
    <div class="signup-link">
        {{ __('auth.registered') }} <a href="{{url('/login')}}">{{ __('auth.login_now') }}</a>
    </div>
@endsection
