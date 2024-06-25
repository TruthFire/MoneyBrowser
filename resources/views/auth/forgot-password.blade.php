@extends('layouts.auth')

@section('title')
    {{ __('auth.login') }} - {{ config('app.name') }}@endsection

@section('content')
    <h2>Forgot your password?</h2>
    <p>Enter your email address and we'll send you an email with instructions to reset your
        password.</p>
    @if (session('status'))
        <div class="status-success">
            {{ session('status') }}
        </div>
    @endif

    @if (session('errors'))
        <div class="error">
            {{ session('errors') }}
        </div>
    @endif

    <form action="{{route('password.email')}}" method="post">
        @csrf
        <label for="username">{{ __('auth.email_inp') }}</label>
        <input type="email" placeholder={{ __('auth.email_inp') }} name="email">
        <button type="submit" class="signin-button">{{ __('auth.submit') }}</button>
    </form>
@endsection
