<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function doctors() {
        return $this->hasMany(Doctor::class);
    }

    public function cities() {
        return $this->belongsToMany(City::class);
    }
}
