<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    public function user1()
        {
            return $this->belongsTo('App\User', 'user_id');
        }
}
