<?php

namespace App\Http\Livewire\Admin\Setting;

use Livewire\Component;
use App\Models\Langue;
use App\Models\Niveau;
use App\Models\Filiere;
class SettingComponent extends Component
{
    public $niveau,$langue_id,$filiere_id;
        public function updated($fildes){
            $this->validateOnly($fildes,[
                'niveau'        =>  'required',
                'langue_id'     =>  'required',
                'filiere_id'    =>  'required',
            ]);
        }
    
    public function submit(){
        $this->validate([
            'niveau'        =>  'required',
            'langue_id'     =>  'required',
            'filiere_id'    =>  'required',
        ]);
        $newNiveau = new Niveau();
        $newNiveau->niveau = $this->niveau;
        $newNiveau->langue_id = $this->langue_id;
        $newNiveau->filiere_id = $this->filiere_id;
        $newNiveau->save();
        $this->reset();
        $this->dispatchBrowserEvent("eventSuccess");
    }
    public function render(){
        $niveaux = Niveau::all();
        $langues = Langue::all();
        $filiers = Filiere::all();
        $data = compact("niveaux","langues","filiers");
        return view('livewire.admin.setting.setting-component',$data);
    }
}
