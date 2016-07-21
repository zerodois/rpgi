<?php

namespace rpg;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class File extends Eloquent
{
  protected $connection = 'mongodb';
  protected $collection = 'files';

  protected $fillable = [ 'name', 'path', 'extension', 'type' ];

  public function user() {
  	return $this->belongsTo('rpg\User');
  }

}
