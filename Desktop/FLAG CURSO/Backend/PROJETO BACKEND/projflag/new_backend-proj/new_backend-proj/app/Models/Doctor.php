<?php

namespace App\Models;


use App\Models\Appointments;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model {
    protected $fillable = [/* 'id', */ 'name', 'specialty'];

    /* public function appointments() {
        return $this->hasMany(Appointments::class);
    } */
}
