<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{

    // Fillable means mass assignment
    protected $fillable = [
        'title',
        'description',
        'slug',
    ];


}
