<?php

namespace rpg\Http\Controllers;

use Illuminate\Http\Request;
use rpg\Http\Requests;

use rpg\Ficha;

class FichaController extends Controller
{
    public function lista() {
      return Ficha::all();
    }
}
