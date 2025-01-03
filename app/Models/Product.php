<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

        protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamped = true;
    public $fillable = ['title', 'description', 'quantity', 'price', 'category_id', 'image'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}