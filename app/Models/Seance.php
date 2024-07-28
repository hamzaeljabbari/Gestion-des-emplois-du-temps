<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'h_debut', 'h_fin' , 'start','end','etatSeance','niveau_id ','enseignant_id','module_id','salle_id','annee_universitaire_id'];
    public function enseignant(){
        return $this->belongsTo(Enseignant::class);
    }
    public function salle(){
        return $this->belongsTo(Salle::class);
    }
    public function filiere(){
        return $this->belongsTo(Filiere::class);
    }
    public function module(){
        return $this->belongsTo(Module::class);
    }
    public function anneeUniversitaire(){
        return $this->belongsTo(Annee_Universitaire::class);
    }
}
