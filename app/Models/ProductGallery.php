<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class ProductGallery extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function getUrlAttribute($url)
    {
        return config('app.url') . Storage::url($url);
    }
}
