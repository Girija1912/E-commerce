<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
