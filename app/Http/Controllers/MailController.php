<?php

namespace rpg\Http\Controllers;

use rpg\Http\Requests;
use Request;
use rpg\User;
use Mail;


class MailController extends Controller
{
	public function mail() {

		$data = [
			'email' => Request::input('email'),
			'id'    => User::where( 'email', Request::input('email') )->get()[0]->id
		];

		Mail::send('mails.auth.sigup', $data, function ($message) {
	    $message->subject('RPGi - Confirmação da conta');
	    $message->from('felipe@rpgi.herokuapp.com', 'RPGi');
		  $message->to( Request::input('email') );
		});

		//return view('mails.auth.sigup');
	}
}
