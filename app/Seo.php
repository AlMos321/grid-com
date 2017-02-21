<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $table = "seo";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'keywords',
        'title'
    ];

}
