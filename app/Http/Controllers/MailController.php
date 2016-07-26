<?php

namespace rpg\Http\Controllers;

use Carbon\Carbon;
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

	public function email() {
		return view('mails.auth.reset');
	}

	public function mailReset() {

		$data = [
			'email' => Request::input('email'),
			'hash'	=> md5( Request::input('email').Carbon::now()->timestamp )
		];

		$tmp  = User::where( 'email', $data['email'] )->get();
		if( count($tmp)<=0 )
			return [ 'mail' => false, 'message' => 'O email informado não é cadastrado em nosso sistema' ];

		$user = $tmp->first();
		$user->hash = $data['hash'];
		$user->save();

		Mail::send('mails.auth.reset', $data, function ($message) {
	    $message->subject('RPGi - Redefinição da senha');
	    $message->from('felipe@rpgi.herokuapp.com', 'RPGi');
		  $message->to( Request::input('email') );
		});

		return [ 'mail' => true, 'message' => 'Um email foi enviado para que seja realizada a redefinição de sua senha' ];
	}
}
