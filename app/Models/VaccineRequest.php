<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'division_id', // Add other fields here
        'district_id',
        'hospital_id',
        'description',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

}
