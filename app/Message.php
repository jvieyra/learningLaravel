<?php

namespace App;

use App\Presenters\MessagePresenter;
use Illuminate\Database\Eloquent\Model;

class Message extends Model{
    
  /* otro nombre de tabla*/
 //protected $table = 'nombre_de_la_tabla' 

  /*massive assigment*/
  protected $fillable = ['nombre','email','mensaje'];

  //hijo
  public function user(){
  	return $this->belongsTo(User::class);
  }

  //padre, relaciones polimorficas hasOne
  public function note(){
  	return $this->morphOne(Note::class,'notable');
  }

  //relaciones polimorficas
  public function tags(){
    return $this->morphToMany(Tag::class,'taggable');
  }

  public function present(){
    //retorna una clase
    return new MessagePresenter($this);
  }
}
