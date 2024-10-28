<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'url',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
