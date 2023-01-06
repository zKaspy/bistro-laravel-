<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'price','weight', 'desc','img', 'title',
    ];

    public function category() {
        return $this->belongsTo('App\Models\Product', 'category_id');
    }
}
