<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model {
    protected $fillable = ['name', 'specialty'];

    /* public function appointments() {
        return $this->hasMany(Appointments::class);
    } */
}
