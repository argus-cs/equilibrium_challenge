<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
  public function sector() {
    return $this->belongsTo(Sector::class, 'sectors_id');
  }

  public function phones() {
    return $this->hasMany(Phone::class);
  }
}
