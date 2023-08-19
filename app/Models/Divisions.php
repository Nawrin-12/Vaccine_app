<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisions extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bn_name',
        'url',
    ];

    public function districts()
    {
        return $this->hasMany(Districts::class);
    }

}
