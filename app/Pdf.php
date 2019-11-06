<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
   public function proizvodi()
   {
       return $this->belongsTo('App\Proizvodi');

   }
}
