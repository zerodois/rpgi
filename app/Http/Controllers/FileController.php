<?php

namespace rpg\Http\Controllers;

use Illuminate\Http\Request;
use rpg\Http\Requests;
use Illuminate\Support\Facades\Input;
use rpg\File;
use rpg\User;
use Storage;
use Auth;
use Image;

class FileController extends Controller
{

	private $types    = [
		'music'  	 => [ 'mp3', 'wmp' ],
		'document' => [ 'pdf' ],
		'zipped'	 => [	'zip', 'rar', '7z' ],
		'image'		 =>	[ 'png', 'jpg', 'gif', 'bmp', 'webp' ]
	];

  public function __construct() {
    //Cria o simbolic link se ele não existir
    $path = __DIR__.'/../../../storage/app/files';
    if( !file_exists(__DIR__.'/../../../public/files') )
    {
      Storage::makeDirectory('files');
      symlink($path, __DIR__.'/../../../public/files');
    }
  }

  public function lista() {
    $files = User::find( Auth::user()->id )->files;
    return $files->toJson();
  }

  //Upload de arquivos
  public function upload() {
  	
    //Informações do upload
    $file = Input::file('file');
  	$name = Input::get('file_name');
  	$dir  = 'files/'.Auth::user()->email.'/';
    $ext  = pathinfo( $name, PATHINFO_EXTENSION );
    $type = $this->detectType($ext);

    //Informações do item que serão guardadas no banco
    $insert = [
      'name' => $name,
      'path' => $dir,
      'extension' => $ext,
      'type' => $type
    ];
    
    //Salva no banco o caminho do arquivo e adiciona no inventario do usuario
    $obj  = new File( $insert );
    $user = User::find( Auth::user()->id );
    $user->files()->save($obj);

    //Guarda a imagem
    Storage::put(
      $dir.$obj->id.'.'.$ext,
      file_get_contents($file->getRealPath())
    );

    //Se for uma imagem, salva um icone com tamanho reduzido
    if( $type == 'image' )
      $this->createIcon( $file->getRealPath(), $dir."{$obj->id}.{$ext}", $ext );
  }

  //Visualizar arquivo
  public function view($id) {
    $file = File::find( $id );
    if( count($file)<=0 ) return false;
    $dir  = __DIR__.'/../../../public/'.$file->path.$file->id.'.'.$file->extension;
    if( is_file($dir) )
      return response()->file($dir);
    return 'Arquivo não existe';
  }

  //Download arquivo
  public function download($id) {
    $file = File::find( $id );
    if( count($file)<=0 )
      return false;
    $dir  = __DIR__.'/../../../public/'.$file->path.$file->id.'.'.$file->extension;
    return response()->download( $dir, $file->name );
  }

  //Apaga o arquivo do disco
  public function delete($id) {
    $file = File::find( $id );
    if( count($file)<=0 )
      return false;
    File::destroy($id);
    Storage::delete($file->path.'/'.$id.'.'.$file->extension);
    if( $file->extension=='image' )
      Storage::delete($file->path.'/'.$id.'_icon.jpg');
  }

  private function createIcon($path, $dest, $extension) {
    $img = Image::make($path);
    $dest = str_replace( ".{$extension}", "_icon.jpg", $dest );
    $img->encode('jpg')
        ->resize(null, 300, function ($constraint) {
            $constraint->aspectRatio();
          })
        ->save($dest);
  }

  //Detecta o tipo do arquivo (musica, imagem, etc)
	private function detectType( $extension ) {
		foreach ( $this->types as $type => $ext )
			if( in_array($extension, $ext) ) return $type;
		return '';
	}
}
