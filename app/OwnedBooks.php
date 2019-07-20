<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnedBooks extends Model
{
    protected $fillable = [
        'title',
        'author',
        'description',
        'category',
        'image_link',
        'preview_link',
        'owner_id'
    ];

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
