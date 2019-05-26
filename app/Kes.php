<?php

namespace App;

use Customer;
use Category;
use Evidence;

use Illuminate\Database\Eloquent\Model;

class Kes extends Model
{
    //

      public function customer(){
      	return $this->belongsTo('App\Customer', 'customer_id');
      }
      public function category(){
      	return $this->belongsTo('App\Category', 'category_id');
      }

}
