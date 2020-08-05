<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{

    protected $fillable = ['name', 'path', 'description', 'saved'];
    protected $appends = ['fullPath'];

    public function getFullPathAttribute()
    {
        return '/storage/' . $this->path;
    }


}
