<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facker extends Model
{
  protected $fillable = [
      'name', 'email', 'phone',
  ];
}
