<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiLocation extends Model
{

    protected $table = "api_locations";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_id',
        'description',
        'description_ru',
        'ref',
        'delivery1',
        'delivery2',
        'delivery3',
        'delivery4',
        'delivery5',
        'delivery6',
        'delivery7',
        'area',
        'prevent_entry_new_streets_user',
        'conglomerates',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}

