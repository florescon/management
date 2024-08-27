<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Food extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'price', 'image', 'description', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $casts = [
        'image' => 'array',
    ];
}
