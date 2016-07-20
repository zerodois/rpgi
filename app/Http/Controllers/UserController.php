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
    if( Auth::validate($credentials) && Auth::attempt($credentials) )
      return [ 'auth' => true ];
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
     ]);
  }

}
