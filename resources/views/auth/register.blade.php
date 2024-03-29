@extends('layouts.main')

@section('title', 'Cadastro')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection
    
@section('class_body', 'body_login')

@section('content')
<section class="login cadastro">
    <h2>Cadastro</h2>

    <x-jet-validation-errors class="mb-4" />

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-jet-label for="name" value="{{ __('Nome') }}" />
            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Nome" required autofocus autocomplete="name" />
        </div>

        <div>
            <label for="tel">Celular:</label>
            <input type="tel" name="tel" id="tel" placeholder="(11) 911111111" required>
        </div>

        <div class="mt-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="exemplo@email.com" required />
        </div>

        <div class="mt-4">
            <x-jet-label for="password" value="{{ __('Senha') }}" />
            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
        </div>

        <div class="mt-4">
            <x-jet-label for="password_confirmation" value="{{ __('Confirme a Senha') }}" />
            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
        </div>

        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Já possui um cadastro?') }}
                </a>
            </div>

            <x-jet-button class="ml-4 submit-logar">
                {{ __('Cadastar') }}
            </x-jet-button>
    </form>
</section>
@endsection
@section('scripts')
    <script src="{{ asset('/js/jquery-3.6.1.js') }}"></script>
    <script src="{{ asset('/js/messages_pt_BR.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/additional-methods.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.mask.min.js') }}"></script>

    <script>
        $('#tel').mask('(00) 00000-0000').on('keyup', function(event){
            event.preventDefault();
            var v = this.value;
            console.log(v.length);
            if (v.length == 3) this.value = v+') 9';
        });
    </script>
@endsection