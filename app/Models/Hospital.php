<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = [
        'district_id',
        'name',
        'lat',
        'lon',
        'url',
    ];
    
    public function district()
    {
        return $this->belongsTo(Districts::class);
    }

    public function vaccines()
    {
        return $this->belongsToMany(Vaccine::class, 'vaccine_hospital')->withTimestamps();
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }


}
