<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Publication;

class NotificationComment extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;
    protected $plublication;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Publication $publication)
    {
        $this->user = $user;
        $this->publication = $publication;

    }

    public function build()
    {
        $domain = env('APP_URL');
        $app_name = env('APP_NAME');

        return $this->from(env('MAIL_FROM_ADDRESS'), 'Mailtrap')
            ->to($this->user->email, $this->user->name)
            ->subject('Un nuevo mensaje ha sido enviado')
            ->view('layout.mail')
            ->with(
                [
                    'user' => $this->user,
                    'domain' => $domain,
                    'app_name' => $app_name,
                    'publication' => $this->publication
                ]
            );
    }
}
