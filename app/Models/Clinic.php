<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function doctor() {
        return $this->hasMany(Doctor::class);
    }

    public function city() {
        return $this->belongsToMany(City::class);
    }
}
