<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $fillable = [
        'id',
        'category_code',
        'category_name',
        'is_active',
    ];

    public function products() {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
