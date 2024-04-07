<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hogare extends Model
{
    use HasFactory;

    protected $table = 'hogares';

    public function hoja() {
        return $this->belongsTo(Hoja::class);
    }
}
