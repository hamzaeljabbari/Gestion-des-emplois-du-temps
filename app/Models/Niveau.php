<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;
    public function filiere(){
        return $this->belongsTo(Filiere::class);
    }
    public function langue(){
        return $this->belongsTo(Langue::class);
    }
}
