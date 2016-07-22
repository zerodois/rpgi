<?php

namespace rpg\Http\Controllers;

use rpg\Http\Requests;
use rpg\User;
use Request;
use Auth;

class UserController extends Controller
{
  public function sigin() {
    
    $credentials = array(
      'email' => Request::input('email'),
      'password' => Request::input('password'),
    );
    //Verifica se a senha informada coincide
    if( Auth::validate($credentials) ) {
      //Verifica se a conta já foi confirmada via email
      $user = User::where('email', $credentials['email'])->get()[0];
      if( $user->verified && Auth::attempt($credentials) )
        return [ 'auth' => true ];
      else
        return [ 'auth' => false, 'message' => 'Você ainda não confirmou sua conta. Acesse seu email e confirme através do link disponibilizado' ];
    }
    return [ 'auth' => false ];
  }
  
  public function login() {
    return [ 'guest' => Auth::guest() ] ;
  }

  public function logout() {
    return [ 'logout' => Auth::logout() ];
  }

  public function sigup() {
     $data = Request::all();
     return User::create([
       'name'     => $data['name'],
       'email'    => $data['email'],
       'password' => bcrypt($data['password']),
       'verified' => false,
     ]);
  }

}
