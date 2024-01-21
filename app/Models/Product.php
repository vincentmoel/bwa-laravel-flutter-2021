<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    protected $guarded = ['id'];

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['name'] ?? false, function ($query, $name){
            return $query->where('name', 'like', "%$name%");
        });

        $query->when($filters['description'] ?? false, function ($query, $description){
            return $query->where('description', 'like', "%$description%");
        });

        $query->when($filters['tags'] ?? false, function ($query, $tags){
            return $query->where('tags', 'like', "%$tags%");
        });

        $query->when($filters['price_from'] ?? false, function ($query, $price_from){
            return $query->where('price_from', '>=', "$price_from");
        });

        $query->when($filters['price_to'] ?? false, function ($query, $price_to){
            return $query->where('price_to', '<=', "$price_to");
        });

        $query->when($filters['categories'] ?? false, function ($query, $categories){
            return $query->where('categories', 'like', "%$categories%");
        });
    }
}
