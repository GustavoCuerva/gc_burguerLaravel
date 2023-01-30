@extends('layouts.main')

@section('title', 'Mudar senha')

@section('styles')
    <link rel="stylesheet" href="{{asset('/css/login.css')}}">
    <style>
        .meus_dados_box, .meus_dados, .px-4, .grid{
            flex-direction: column;
        }

        .grid>div{
            width: 100%;
        }
    </style>
@endsection

@section('class_body', 'body_login')

@section('content')
<div  class="login meus_dados_box" >
<x-jet-form-section submit="updatePassword" class="meus_dados">
    <x-slot name="title">
        {{ __('Alterar sua senha') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Certifique-se de que sua conta esteja usando uma senha longa e aleatória para se manter segura.') }}
    </x-slot>

    <x-slot name="form" class="meus_dados">
        @csrf
        @method('put')
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="current_password" value="{{ __('Sua senha') }}" />
            <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password" value="{{ __('Nova senha') }}" />
            <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password_confirmation" value="{{ __('Confirme sua senha') }}" />
            <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        {{-- <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message> --}}

        <input type="submit" name="alterar" value="Alterar">
    </x-slot>
</x-jet-form-section>
</div>
@endsection