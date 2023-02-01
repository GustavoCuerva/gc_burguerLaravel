<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //

        VerifyEmail::toMailUsing(function($notifiable, $url){
            return (new MailMessage)
                ->subject('Verifique seu email')
                ->line('Por favor clique no link a baixo para verificar seu email')
                ->action('Verifique seu email', $url)
                ->line('Se você não criou uma conta nenhuma ação é nescessária');
        });

        ResetPassword::toMailUsing(function($notifiable, $url){

            $count = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');
            $url   = route('password.reset', ['token' => $url]);
            return (new MailMessage)
            ->subject('Notificação de reset de senha')
            ->line('Recebemos um pedido de reset de senha para sua conta')
            ->action('Resetar senha', $url)
            ->line('Esse link expirará em '.$count.' minutos.')
            ->line('Se você não solicitou um reset de senha apenas ignore essa mensagem');
        });
    }
}
