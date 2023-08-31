<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $fillable = [
        'title', 'body', 'slug', 'status',
        'category_id', 'tag_id',
        'description', 'client_id', 'writer_id',
        'wages', 'is_completed_by_writer',
    ];

    public function setSlugAttribute ($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function setUserIdAttribute ($value)
    {
        $this->attributes['user_id'] = auth()->id() ?? 1;
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function writer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'writer_id');
    }
}
