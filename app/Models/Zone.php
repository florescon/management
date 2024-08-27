<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zone extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'note',
    ];

    public function tables()
    {
        return $this->hasMany(Refectory::class)->withTrashed();
    }
}
