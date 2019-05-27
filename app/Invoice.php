<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    
      public function kes(){
      	return $this->belongsTo('App\Kes', 'kes_id');
      }
}
