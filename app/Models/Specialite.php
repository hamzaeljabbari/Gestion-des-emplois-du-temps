<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    use HasFactory;
    protected $filables=['specialite','deparetement_id'];
    public function departement(){
        return $this->belongsTo(Departement::class);
    }
}
