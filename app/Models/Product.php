<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'price', 'image', 'category'];
    
    public function getImageAttribute($value)
    {
        return asset('storage/'.$value);
    }
}
