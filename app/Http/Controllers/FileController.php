<?php

namespace rpg\Http\Controllers;

use Illuminate\Http\Request;
use rpg\Http\Requests;
use Illuminate\Support\Facades\Input;
use Storage;
use Auth;

class FileController extends Controller
{

	private $types    = [
		'music'  	 => [ 'mp3', 'wmp' ],
		'document' => [ 'pdf' ],
		'zipped'	 => [	'zip', 'rar', '7z' ],
		'image'		 =>	[ 'png', 'jpg', 'gif', 'bmp', 'webp' ]
	];

  public function lista() {

    $json  = [];
    $dir   = 'files/'.Auth::user()->email.'/';
    $files = Storage::files($dir);

    foreach ( $files as $key => $file )
    {
    	$json[$key]['extension'] = pathinfo($file, PATHINFO_EXTENSION);
    	$json[$key]['name']      = str_replace( $dir, '', $file );
    	$json[$key]['filename']  = $files[$key];
    	$json[$key]['type']			 = $this->detectType( $json[$key]['extension'] );
    }

    return $json;
  }

  public function upload() {
  	$file = Input::file('file');
  	$name = Input::get('file_name');
  	$dir  = 'files/'.Auth::user()->email.'/';

  	Storage::put(
      $dir.$name,
      file_get_contents($file->getRealPath())
    );

  }

  public function view($filename) {
  	$dir  = __DIR__.'/../../../public/files/'.Auth::user()->email.'/'.$filename;
  	return response()->file($dir);
  }

  public function delete($filename) {
    Storage::delete('files/'.Auth::user()->email.'/'.$filename);
  }

	private function detectType( $extension ) {

		foreach ( $this->types as $type => $ext )
			if( in_array($extension, $ext) ) return $type;
		return '';
	}
}
