<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = ['name', 'path', 'description', 'saved'];
    protected $appends = ['fullPath'];

    public function getFullPathAttribute()
    {
        return env('STORAGE_IMAGE_PATH', '/storage/') . $this->path;
    }


}
