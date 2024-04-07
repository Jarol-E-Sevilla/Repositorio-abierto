<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoja extends Model
{
    use HasFactory;

    public function hogar() {
        return $this->hasOne(Hogare::class);
    }

    public function miembro() {
        return $this->hasOne(Miembro::class);
    }

    public function mortalidad() {
        return $this->hasOne(Mortalidade::class);
    }

    public function riesgo() {
        return $this->hasOne(Riesgo::class);
    }
}
