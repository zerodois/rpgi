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

  public function confirma($id) {

    $user = User::find($id);
    if( count($user) == 0 )
      return [ 'err' => true, 'message' => 'Há um erro na url informada :(' ];

    if( $user->verified )
      return [ 'err' => true, 'message' => 'Essa conta já foi confirmada. Prossiga realizando o login' ];

    $user->verified = true;
    $user->save();

    return [ 'confirmed' => true ];
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
