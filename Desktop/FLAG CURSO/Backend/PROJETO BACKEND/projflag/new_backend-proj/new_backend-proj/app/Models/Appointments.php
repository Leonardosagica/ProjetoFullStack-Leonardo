<?php

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model {
    protected $fillable = ['specialty', 'date_time'];

    public function doctors() {
        return $this->belongsTo(Doctors::class);
    }

    public function patients() {
        return $this->belongsTo(Patients::class);
    }
}
