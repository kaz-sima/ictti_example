<?php

namespace App\Mail;

use App\User;
use Illuminate\Mail\Mailable;

class profileChanged extends Mailable
{
    protected $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->name = $user->name;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->view('emails.notification') // to call HTML mail
        ->text('emails.notification_plain') // to call plain mail
        ->subject(' Your profile has been changed ')
        ->with([
            'name' => $this->name
        ]);
    }
}
