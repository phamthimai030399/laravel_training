<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $fillable = [
        'id',
        'product_code',
        'product_name',
        'category_id',
        'price',
        'is_delete',
        'image',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
