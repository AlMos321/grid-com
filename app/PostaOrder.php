<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostaOrder extends Model
{

    protected $table = "posta_orders";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_poster',
        'type-of-services',
        'departyre-type',
        'phone_recipient',
        'phone_poster',
        'name_recipient',
        'name_poster',
        'sender',
        'recipient',
        'product-type',
        'product-count',
        'email_poster',
        'email_recipient',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}

