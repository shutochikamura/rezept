<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewGuestpasswordVerification extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct($user)
    {
        $this->user = $user;
    }


    public function build()
    {
        return $this
        ->subject('[site]ゲスト用パスワードを変更しました')
        ->view('auth.email.new_guestpassword_register')
        ->with(['user' => $this->user]);
    }
}
