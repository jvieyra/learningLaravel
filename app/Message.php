<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model{
    
    /* otro nombre de tabla*/
   //protected $table = 'nombre_de_la_tabla' 

    /*massive assigment*/
    protected $fillable = ['nombre','email','mensaje'];
}
