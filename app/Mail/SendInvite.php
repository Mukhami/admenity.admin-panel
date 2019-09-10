<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendInvite extends Mailable
{
    use Queueable, SerializesModels;


    public $user;
    public $role;
    public $sender;
    public $sender_name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $role,$sender, $sender_name)
    {
        $this->user = $user;
        $this->role = $role;
        $this->sender = $sender;
        $this->sender_name = $sender_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->sender, $this->sender_name)
                    ->to($this->user)
                    ->Subject('Invitation To Register on the NSE Admin Panel')
                    ->markdown('Emails.user-invite');
    }
}
