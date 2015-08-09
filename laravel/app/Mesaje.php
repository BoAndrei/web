<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;


class Mesaje extends Model 
{
  
 protected $guarded = array();
    protected $table = 'mesaje';
    protected $primaryKey = 'mesaj_id';

   public $timestamps = 'false' ; 

   


}
