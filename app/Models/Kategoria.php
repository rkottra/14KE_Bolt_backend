<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model
{
    use HasFactory;
    
    public $table="kategoriak";

    function termekek() {
        return $this->hasMany(Termekek::class, "kategoriaid");
    }
}
