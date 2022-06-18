<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $guarded = ['id'];


    public function product()
    {
        return $this->hasMany(ProductGallery::class, 'product_id');
    }
}
