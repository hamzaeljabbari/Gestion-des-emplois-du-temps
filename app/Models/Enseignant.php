<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;
    protected $filables=[
        'nom','prenom','email','tel','specialite_id'
    ];
    public function specialite(){
        return $this->belongsTo(Specialite::class);
    }
}
