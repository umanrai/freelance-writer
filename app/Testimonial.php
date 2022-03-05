<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'image',
        'name',
        'designation',
        'statement',
    ];

    public function getImage()
    {
        $filePath = 'storage/images/testimonial/'. ($this->image ?? 'no.png');
        if (file_exists( public_path($filePath))) {
            return asset($filePath);
        }
        return asset('assets/img/no-image.png');
    }
}
