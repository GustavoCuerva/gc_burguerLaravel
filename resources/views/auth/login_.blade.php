@extends('layouts.main')

@section('title', 'Login')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection
    
@section('class_body', 'body_login')

@section('content')
<main class="corpo">

    <x-jet-validation-errors class="mb-4" />

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <section class="login">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" placeholder="exemplo@email.com" name="email" :value="old('email')" required autofocus>
            <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password">
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Esqueceu a senha?') }}
                    </a>
                @endif
                    <a href="{{route('register')}}">Cadastrar-se</a>
            </div>
            <x-jet-button class="ml-4 submit-logar">
                {{ __('Log in') }}
            </x-jet-button>
        </form>
    </section>
</main><!--Corpor-->
@endsection