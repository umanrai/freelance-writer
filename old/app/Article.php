<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Article extends Model
{
    protected $fillable = [
        'title', 'body', 'slug', 'status',
    ];
    public function setSlugAttribute ($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function setUserIdAttribute ($value)
    {
        $this->attributes['user_id'] = auth()->id() ?? 1;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
