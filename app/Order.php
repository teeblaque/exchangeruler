<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = ['user_id', 'order_type', 'services', 'amount_dollar', 'btc_amount', 'btc_address', 'amount_naira', 'order_note', 'transaction', 'our_rate'];

    protected $hidden = [
        'btc_address'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function catalogue()
    {
        return $this->belongsTo('App\Catalogue', 'services');
    }

    public function blockchain()
    {
        return $this->belongsTo('App\BlockChain', 'transaction');
    }

    public function images()
    {
        return $this->hasMany('App\OImage');
    }
}
