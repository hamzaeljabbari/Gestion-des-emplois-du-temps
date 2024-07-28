<?php

namespace App\Http\Livewire\Admin\Schedule;

use App\Models\Seance;
use App\Models\Filiere;
use App\Models\Niveau;
use App\Models\Semestre;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ScheduleComponent extends Component{
    public $daysWeek = ["Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"];
    public $calcTd=0,$calcTde=0,$morning=3,$evening=3;
    public $days =[],$start_8=[],$start_9=[],$start_10=[], $start_14=[],$start_15=[],$start_16=[],$is8 = 0,$is14 = 0;

    // Filter data
    public $filiere,$niveau,$semestre,$startDate,$endDate,$weekdate,$SeanceYear,$startDayNumber,$endDayNumber,$startMonthDate,$endMonthDate;
    public $niveaux = [],$semestres = [];

    // Validate Items On Real Time
    public function updated($fildes){
        $this->validateOnly($fildes,[
            'filiere'   =>  'required',
            'niveau'   =>  'required',
            'semestre'   =>  'required',
            'startDate'  =>  'required',
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

    public function filterSchedule(){
        $this->validate([
            'filiere'   =>  'required',
            'niveau'    =>  'required',
            'semestre'  =>  'required',
            'weekdate'  =>  'required',
        ]);

        list($year, $weekNumber) = sscanf($this->weekdate, "%u-W%u");
        $myDate = Carbon::createFromDate($year, 1, 1)->startOfWeek()->addWeeks($weekNumber);
        $this->SeanceYear = $myDate->format('Y');
        $Seanceweek = $myDate->weekOfYear;

        // Get date like new date()
        $GetDate = Carbon::now();
        setlocale(LC_TIME, 'fr_FR.utf8');

        $GetDate->setISODate($this->SeanceYear, $Seanceweek, 1); // Get Start Week;
        $this->startDate = $GetDate->format('Y-m-d');
        $this->startMonthDate = $GetDate->locale('fr')->isoFormat('MMMM');
        $this->startDayNumber = $GetDate->format('d');

        $GetDate->setISODate($this->SeanceYear, $Seanceweek, 7); // Get End Week
        $this->endDate = $GetDate->format('Y-m-d');
        $this->endMonthDate = $GetDate->locale('fr')->isoFormat('MMMM');
        $this->endDayNumber = $GetDate->format('d');
        
        $this->days = Seance::select(DB::raw('DATE(dateSeance) as date'))
                                        ->orderBy('dateSeance')
                                        ->groupBy('date')->whereBetween("start",[$this->startDate,$this->endDate])->get();
    }

    public function render(){
        $this->start_8  = Seance::where("h_start","08")->where("filiere_id",$this->filiere)
                                ->where("niveau_id",$this->niveau)
                                ->where("semestre_id",$this->semestre)
                                ->orderBy('dateSeance')->get();
                                
        $this->start_9  = Seance::where("h_start","09")->where("filiere_id",$this->filiere)
                                ->where("niveau_id",$this->niveau)
                                ->where("semestre_id",$this->semestre)
                                ->orderBy('dateSeance')->get();

        $this->start_14 = Seance::where("h_start","14")->where("filiere_id",$this->filiere)
                                ->where("niveau_id",$this->niveau)
                                ->where("semestre_id",$this->semestre)
                                ->orderBy('dateSeance')->get();
        $this->start_15 = Seance::where("h_start","15")->where("filiere_id",$this->filiere)
                                ->where("niveau_id",$this->niveau)
                                ->where("semestre_id",$this->semestre)
                                ->orderBy('dateSeance')->get();
                                
        $this->start_10 = [];
        for ($i = 0; $i < count($this->days); $i++) {
            ${$this->daysWeek[$i]} = Seance::where("dateSeance", $this->days[$i]->date)
                                            ->where('h_start', '10')
                                            ->where("filiere_id", $this->filiere)
                                            ->where("niveau_id", $this->niveau)
                                            ->where("semestre_id", $this->semestre)
                                            ->first();
            $this->start_10[] = ${$this->daysWeek[$i]};
        }
        $this->start_16 = [];
        for ($i = 0; $i < count($this->days); $i++) {
            ${$this->daysWeek[$i]} = Seance::where("dateSeance", $this->days[$i]->date)
                                            ->where('h_start', '16')
                                            ->where("filiere_id", $this->filiere)
                                            ->where("niveau_id", $this->niveau)
                                            ->where("semestre_id", $this->semestre)
                                            ->first();
            $this->start_16[] = ${$this->daysWeek[$i]};
        }

        $filieres = Filiere::all();
        $semestres = $this->semestres = $this->getSemestres();
        $niveaux = $this->niveaux = $this->getNiveaux();
        $modulesSeances = Seance::select('module_id')->groupBy('module_id')
                                        ->whereBetween("dateSeance",[$this->startDate,$this->endDate])                                    
                                        ->where("filiere_id",$this->filiere)
                                        ->where("niveau_id",$this->niveau)
                                        ->where("semestre_id",$this->semestre)->get();

        $enseignantsSeances = Seance::whereBetween("dateSeance",[$this->startDate,$this->endDate])
                                    ->where("filiere_id",$this->filiere)
                                    ->where("niveau_id",$this->niveau)
                                    ->where("semestre_id",$this->semestre)->get();

        $data = compact('filieres','semestres','niveaux','modulesSeances','enseignantsSeances');
        return view('livewire.admin.schedule.schedules-component',$data);
    }
}