<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termek extends Model
{
    use HasFactory;

    public $table = "termekek";

    function kategoria() {
        return $this->belongsTo(Kategoria::class, 'kategoriaid');
    }
}
