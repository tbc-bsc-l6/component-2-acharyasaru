<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // You can define the attributes for the Product model
    protected $fillable = ['name', 'price', 'description', 'image', 'is_featured'];
}
