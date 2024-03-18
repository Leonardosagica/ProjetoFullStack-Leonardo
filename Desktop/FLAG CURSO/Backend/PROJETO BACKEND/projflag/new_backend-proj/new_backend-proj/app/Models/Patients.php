<?php

use Illuminate\Database\Eloquent\Model;


class Patients extends Model {
    protected $fillable = ['name', 'age', 'history', 'phone', 'fiscal', 'address'];

    public function appointments() {
        return $this->hasMany(Appointments::class);
    }
}
