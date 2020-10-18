<?php

namespace App\Mail;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mailtrap extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($user)
    {
        //

        $this->data=$user;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $userDetails=$this->data;
        $email=$this->data['email'];
        
        $encryemail = Crypt::encrypt($email);

        $url   = url('/')."/mail/verify/".$encryemail;

        $dataa = array(
            'name' =>$userDetails['name'] ,
            'email' =>$userDetails['email'] ,
            'slug' =>$userDetails['slug'] ,
            'email_url' =>$url
             );
        
        
        return $this->subject('Hello there!')->view('email.register',$dataa);
    }
}
