<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;
    protected $table = 'vaccines'; 

    protected $fillable = [
        'name',
        'description',
        'price',
        'ageRangeStart',
        'ageRangeEnd',
    ];

    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class, 'vaccine_hospital')->withTimestamps();
    }


}
