@extends('layouts.main')

@section('title', 'Confirme seu email')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('class_body', 'body_login')

@section('content')
<section class="login">

        <h2>Confirme seu email</h2>
        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success">
                {{ __('Um novo link de verificação foi enviado para o endereço de e-mail que você forneceu nas configurações do seu perfil.') }}
            </div>
        @endif
        <br>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Antes de continuar, você poderia verificar seu endereço de e-mail clicando no link que acabamos de enviar para você? Se você não recebeu o e-mail, teremos o prazer de lhe enviar outro.') }}
        </div>

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit" style="cursor:pointer; padding: 10px; border: none; font-size: 15px; color: white; background: #ff9a00;">
                        {{ __('Reenviar email de verificação') }}
                    </x-jet-button>
                </div>
            </form>

            <div>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 ml-2" style="padding: 10px; border: none; font-size: 15px;">
                        {{ __('Sair') }}
                    </button>
                </form>
            </div>
        </div>
</section>
@endsection