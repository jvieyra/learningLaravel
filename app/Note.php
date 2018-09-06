<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model{
  
  //asignacion masiva
  protected $fillable = ['body'];

  //relaciones polimorficas , hija
  public function notable(){
  	return $this->morphTo();
  }
}
