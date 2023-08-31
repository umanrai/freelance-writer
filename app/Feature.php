<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'icon',
        'title',
        'summary',
        'description',
        'slug',
    ];
}
