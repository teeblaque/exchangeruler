<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public $fillable = [ 'giftcard_type', 'user_id', 'card_country', 'card_type', 'amount', 'avatar', 'get_amount'];
}
