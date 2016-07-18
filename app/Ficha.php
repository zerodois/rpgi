<?php

namespace rpg;

use Illuminate\Database\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Ficha extends Eloquent
{
  protected $connection = 'mongodb';
  protected $collection = 'ficha';
}
