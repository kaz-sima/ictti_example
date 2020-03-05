<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
   public $table = "staffs";
}
