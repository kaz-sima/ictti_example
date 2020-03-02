<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class bookAvailable extends Mailable
{
    use Queueable, SerializesModels;
    protected $name;
    protected $text;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $book)
    {
        $this->name = $user->name;
        $this->text = $book->book_title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->view('emails.available_notification')
        ->text('emails.available_notification_plain')
        ->subject('Now your reservation book is available')
        ->with([
            'name' => $this->name,
            'text' => $this->text
        ]);
    }
}
