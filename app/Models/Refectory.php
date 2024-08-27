<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Refectory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'note', 'zone_id',
    ];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}
