<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    public $fillable = ['product_type', 'product_name', 'denomination', 'rate', 'avatar'];
}
