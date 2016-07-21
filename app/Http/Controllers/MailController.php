<?php

namespace rpg\Http\Controllers;

use Illuminate\Http\Request;

use rpg\Http\Requests;
use Mail;


class MailController extends Controller
{
	public function confirmacao() {

		$data = [
			'user' => 'Usuário',
			'email' => 'felipelopesrita@gmail.com'
		];
		
		Mail::send('welcome', $data, function ($message) {
	    $message->from('felipelopesrita@gmail.com', 'Felipe J. L. Rita');
		  $message->to('felipelopesrita@hotmail.com');
		});

		return view('welcome');

	}
}
