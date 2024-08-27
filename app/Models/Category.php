<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'note', 'parent_id',
    ];

    public function parent()
    {
        return $this->belongsTo(self::class)->withTrashed();
    }

    public function foods()
    {
        return $this->hasMany(Category::class)->withTrashed();
    }
}
