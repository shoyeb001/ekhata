<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
    ];

    public function Orderitem(){
        return $this->belongsTo(Orderitem::class,"product_id","product_code");
    }
}
