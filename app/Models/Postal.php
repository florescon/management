<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Postal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code', 'description', 'price', 'coverage'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'coverage' => 'boolean',
    ];
}
