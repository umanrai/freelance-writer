<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{


    protected $fillable = [
        'name', 'slug', 'status', 'user_id',
    ];

    public function setSlugAttribute ($value)
    {
        $this->attributes['slug'] = Str::slug($value); /// if value 'Uman Rai' ====> uman-rai
    }

    public function setUserIdAttribute ($value)
    {
        $this->attributes['user_id'] = auth()->id();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
