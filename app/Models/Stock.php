<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    // relation
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', "id");
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', "id");
    }
}
