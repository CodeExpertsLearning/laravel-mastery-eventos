<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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
        VerifyEmail::toMailUsing(function($notifiable, $url) {

            return (new MailMessage)
                ->subject('Verique Seu E-mail')
                ->line('Por favor clique no link abaixo para verificar seu e-mail')
                ->action('Verifique Seu E-mail', $url)
                ->line('Se você não criou uma conta, nenhuma ação é requerida!');

        });

        ResetPassword::toMailUsing(function($notifiable, $url) {

            $expires = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');

            return (new MailMessage)
                ->subject('Notificação de Resete de Senha')
                ->line('Se você está recebendo este e-mail é porque recebemos um pedido de resete de senha para sua conta.')
                ->action('Resetar Senha', $url)
                ->line('Este link de resete de senha expirará em ' . $expires . ' minutos.')
                ->line('Se você não requisitou o resete, ignore esta mensagem.');

        });
    }
}
