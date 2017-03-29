<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class Product extends Model 
{
     protected $table = 'products';
     
     protected $primaryKey = 'product_id';
    
    
    /*protected $fillable = [
        'name', 'email', 'password',
    ];*/

    
}
