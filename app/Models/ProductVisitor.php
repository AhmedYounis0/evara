<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVisitor extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = ['product_id', 'user_id' ,'ip'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
