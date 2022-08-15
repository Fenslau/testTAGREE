<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function clinic() {
      return $this->belongsTo(Clinic::class);
    }

    public function service() {
        return $this->belongsToMany(Service::class);
    }
}