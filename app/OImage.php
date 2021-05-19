<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OImage extends Model
{
    public $fillable = [ 'order_id', 'user_id', 'avatar'];
}
