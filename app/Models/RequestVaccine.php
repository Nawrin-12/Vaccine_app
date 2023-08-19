<?php

namespace App\Models;
use App\Models\Divisions;
use App\Models\Districts;
use App\Models\Hospital;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class RequestVaccine extends Model
{
    use HasFactory;
    protected $fillable = [
        'divisions',
        'districts',
        'hospital',
    ];
}
