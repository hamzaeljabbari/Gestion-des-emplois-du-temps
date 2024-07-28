<?php

namespace App\Http\Livewire\Admin\Seance;

use App\Models\Enseignant;
use App\Models\Filiere;
use App\Models\Langue;
use App\Models\Module;
use App\Models\Niveau;
use App\Models\Salle;
use App\Models\Seance;
use App\Models\Semestre;
use App\Models\ModuleEnseignant;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SeanceComponent extends Component
{
    public $seances = [];
    public $niveaux = [];
    public $semestres = [];
    
    public $isEmpty=0,$seance_repeat = 1,$startTime,$endTime,$filiere,$niveau,$semestre,$langue,$etat_seance,$motif_absence,$theme_module,$groupe,$sous_groupe,$type_seance,
    $enseignant_id,$module_id,$salle_id,$annee_universitaire_id,$startWeek,$endWeek;
    
    public $resetItemsSeance = ['seance_repeat','theme_module','etat_seance','motif_absence','groupe','sous_groupe','type_seance','enseignant_id','module_id','salle_id','isEmpty'];
    protected $listeners = ['updateWeek','filterChanged'];

    public function hideForm(){
        $this->dispatchBrowserEvent("hideForm");
        $this->reset($this->resetItemsSeance);
        $this->filterData();
    }

    // Validate Items On Real Time
    public function updated($fildes){
        $this->validateOnly($fildes,[
            'filiere'   =>  'required',
            'niveau'   =>  'required',
            'semestre'   =>  'required',
            'langue'   =>  'required',
            'theme_module'   =>  'required',
            'groupe'   =>  'required',
            'sous_groupe'   =>  'required',
            'type_seance'   =>  'required',
            'enseignant_id'   =>  'required',
            'module_id'   =>  'required',
            'salle_id'   =>  'required',
            'annee_universitaire_id'   =>  'required',
        ]);
    }
    public function checkFilter(){
        $this->dispatchBrowserEvent("checkFilter");
        $this->validate([
            'filiere'   =>  'required',
            'niveau'   =>  'required',
            'semestre'   =>  'required',
            'langue'   =>  'required'
        ]);
    }

    public function getNiveaux(){
        $niveaux = Niveau::where("filiere_id",$this->filiere)->get();
        return $niveaux;
    }
    public function getSemestres(){
        $semestres = Semestre::where("niveau_id",$this->niveau)->get();
        return $semestres;
    }
    public function filterData(){    
        $validateData = $this->validate([
            'filiere'   =>  'required',
            'niveau'    =>  'required',
            'semestre'  =>  'required',
            'langue'    =>  'required'
        ]);
        if($validateData){
            $this->seances = json_encode(Seance::where("filiere_id",$this->filiere)
                                                ->where("niveau_id",$this->niveau)
                                                ->where("semestre_id",$this->semestre)->get());
        }else{
            $this->seances = [];
        }
        $this->dispatchBrowserEvent("mycalender");
    }
    
    // Get Current Date (Range)
    public function updateWeek($start, $end){
        $start_date = Carbon::createFromFormat('Y-m-d\TH:i:s.uT', $start);
        $end_date = Carbon::createFromFormat('Y-m-d\TH:i:s.uT', $end);

        $this->startWeek = $start_date->format('Y-m-d');
        $this->endWeek = $end_date->format('Y-m-d');
    }

    // Methods FullCalnder
    public function eventAdd($event){
        $this->startTime = $event["start"];
        $this->endTime = $event["end"];
        $this->dispatchBrowserEvent("addForm");
    }
    public function eventRemove($myid){
        Seance::where("id",$myid)->delete();
        $this->dispatchBrowserEvent("moduleDeleted");
    }  
    public function eventChange($event){
        $e = Seance::where("id",$event["id"])->first();
        if($e){
            $e->start = $event['start'];
            if(Seance::exists($event, 'end')) {
                $end_hour = date('H', strtotime($event['end']));
                $start_hour = date('H', strtotime($event['start']));
                $e->end = $event['end'];
                $e->h_start = $start_hour;
                $e->h_end = $end_hour;
                $e->dateSeance = $event['start'];
            }
            $e->save();
            $this->dispatchBrowserEvent("updateSuccess");
            $this->filterData();
        }else{
            //
        }
    }

    // Create new seance
    public function newSeance(){
        if(!$this->isEmpty){
            $this->validate([
                'theme_module'   =>  'required',
                'groupe'   =>  'required',
                'sous_groupe'   =>  'required',
                'type_seance'   =>  'required',
                'enseignant_id'   =>  'required',
                'module_id'   =>  'required',
                'salle_id'   =>  'required',
                // 'annee_universitaire_id'   =>  'required',
            ]);
        };

        for($i=0; $i<$this->seance_repeat; $i++){
            $start_hour = date('H', strtotime($this->startTime));
            $end_hour = date('H', strtotime($this->endTime));
            $dateString = Carbon::parse($this->startTime)->addDays(7*$i)->format('Y-m-d');

            $checkExsistSeance = Seance::where("h_start",$start_hour)
                                        ->where("dateSeance",$dateString)
                                        ->where("filiere_id",$this->filiere)
                                        ->where("niveau_id",$this->niveau)
                                        ->where("semestre_id",$this->semestre)
                                        ->where("langue_id",$this->langue)->get();

            if(count($checkExsistSeance)<1){
                $newSeance = new Seance();
                $newSeance->start = Carbon::parse($this->startTime)->addDays(7*$i);
                $newSeance->end = Carbon::parse($this->endTime)->addDays(7*$i);
                $newSeance->dateSeance = Carbon::parse($this->startTime)->addDays(7*$i);
                $newSeance->h_start = $start_hour;
                $newSeance->h_end = $end_hour;
                if(!$this->isEmpty){
                    $newSeance->filiere_id  = $this->filiere;
                    $newSeance->niveau_id  = $this->niveau;
                    $newSeance->semestre_id  = $this->semestre;
                    $newSeance->langue_id  = $this->langue;
                    $newSeance->groupe = $this->groupe;
                    $newSeance->type_seance  = $this->type_seance;
                    $newSeance->theme_module  = $this->theme_module;
                    $newSeance->enseignant_id  = $this->enseignant_id;
                    $newSeance->module_id  = $this->module_id;
                    $newSeance->salle_id  = $this->salle_id;
                    $newSeance->etatSeance  = $this->etat_seance;
                    $newSeance->motifAbsence  = $this->motif_absence;
                    $newSeance->annee_universitaire_id  = $this->annee_universitaire_id;
                };
                $newSeance->save();
                
                if(!$this->isEmpty){
                    $seance_id = DB::table('seances')->select('id')->orderBy('id', 'desc')->first()->id;
                    $newModuleEnseignant = new ModuleEnseignant();
                    $newModuleEnseignant->dateSeance = Carbon::parse($this->startTime)->addDays(7*$i);
                    $newModuleEnseignant->enseignant_id  = $this->enseignant_id;
                    $newModuleEnseignant->module_id  = $this->module_id;
                    $newModuleEnseignant->seance_id  = $seance_id;
                    $newModuleEnseignant->save();
                }
            }
        }


        $this->reset($this->resetItemsSeance);
        $this->dispatchBrowserEvent("hideForm");
        $this->dispatchBrowserEvent("seanceSuccess");
        $this->filterData();

    }

    public function render(){
        $modules=Module::all();
        $enseignants=Enseignant::all();
        $salles=Salle::all();
        $filieres = Filiere::all();
        $langues = Langue::all();
        $niveaux = $this->niveaux = $this->getNiveaux();
        $semestres = $this->semestres = $this->getSemestres();
        $data = compact('filieres','semestres','langues','niveaux','modules','enseignants','salles');
        return view('livewire.admin.seance.seance-component',$data);
    }
}