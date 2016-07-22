<?php

namespace rpg\Http\Controllers;

use rpg\Http\Requests;
use Request;
use Mail;


class MailController extends Controller
{
	public function mail() {

		$data = [];
		Mail::send('mails.auth.sigup', $data, function ($message) {
	    $message->from('felipe@rpgi.herokuapp.com', 'RPGi');
		  $message->to( Request::input('email') );
		});

		//return view('mails.auth.sigup');
	}
}
