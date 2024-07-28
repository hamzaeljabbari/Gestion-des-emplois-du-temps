<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleEnseignant extends Model
{
    use HasFactory;
    public function enseignant(){
        return $this->belongsTo(Enseignant::class);
    }
    public function module(){
        return $this->belongsTo(Module::class);
    }
}
