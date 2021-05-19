<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public $fillable = ['user_id', 'account_name', 'account_number', 'bank_name'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
