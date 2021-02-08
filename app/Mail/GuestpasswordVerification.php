<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GuestpasswordVerification extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }


    public function build()
    {
        return $this
        ->subject('[site]ゲスト用パスワードを設定しました')
        ->view('auth.email.guestpassword_register')
        ->with(['user' => $this->user]);
    }
}
