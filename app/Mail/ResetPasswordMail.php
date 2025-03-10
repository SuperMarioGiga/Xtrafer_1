<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordMail extends Mailable
{
	use Queueable, SerializesModels;

	/**
	* Create a new message instance.
	*
	* @return void
	*/
	public function __construct($data)
	{
		$this->data = $data;
	}

	/**
	* Build the message.
	*
	* @return $this
	*/
	public function build()
	{
		return $this->view('email.resetPasswordMail')
		->subject('Redefinir senha')
		->with([ 'data' => $this->data, ]);
	}
}
