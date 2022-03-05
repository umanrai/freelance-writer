<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{

    // Fillable means mass assignment
    protected $fillable = [
        'title',
        'image',
        'type',
        'slug',
        'description',
        'url',
        'date',
    ];


    // Carbon instance
    protected $dates = [ 'date', ];

    public function getImage()
    {
        $filePath = 'storage/images/portfolio/'. ($this->image ?? 'no.png');
        if (file_exists( public_path($filePath))) {
            return asset($filePath);
        }
        return asset('assets/img/no-image.png');
    }

}
