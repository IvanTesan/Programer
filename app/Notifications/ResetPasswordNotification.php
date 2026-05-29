<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordBase;

class ResetPasswordNotification extends ResetPasswordBase
{
    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        return (new MailMessage)
            ->subject('Restablecer Contraseña - Programer')
            ->greeting('¡Hola!')
            ->line('Recibiste este correo porque solicitaste restablecer la contraseña para tu cuenta de Programer.')
            ->action('Restablecer Contraseña', $this->resetUrl($notifiable))
            ->line('Este enlace para restablecer la contraseña expirará en ' . config('auth.passwords.'.config('auth.defaults.passwords').'.expire') . ' minutos.')
            ->line('Si no realizaste esta solicitud, puedes ignorar este correo con seguridad.')
            ->salutation('Saludos, El equipo de Programer');
    }
}
