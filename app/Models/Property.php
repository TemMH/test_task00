<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

    protected $fillable = [
        'image',
        'name',
        'coordinates',
        'description',
        'price',
        'area',
        'icon_id',
    ];

    protected $casts = [
        'coordinates' => 'array',
    ];

    public function icon()
    {
        return $this->belongsTo(Icon::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    
    
}
