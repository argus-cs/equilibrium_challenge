<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
  public function sector() {
    return $this->belongsTo('App\Sector');
  }
}
