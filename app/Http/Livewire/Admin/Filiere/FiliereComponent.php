<?php

namespace App\Http\Livewire\Admin\Filiere;

use App\Models\Enseignant;
use App\Models\Filiere;
use Livewire\Component;

class FiliereComponent extends Component
{
    public $filiere,$enseignant_id,$filiereUpdate,$filiere_id;
    protected $listeners = ["deleteConfirmed"=>"deleteModule"];
    
    // Handle forms
    public function addForm(){
        $this->dispatchBrowserEvent("addForm");
        $this->reset();
    }
    public function hideForm(){
        $this->dispatchBrowserEvent("hideForm");
        $this->reset();
    }
    public function hideFormUpdate(){
        $this->dispatchBrowserEvent("hideFormUpdate");
        $this->reset();
    }

    // Validate Items On Real Time
    public function updated($fildes){
        $this->validateOnly($fildes,[
            'filiere'   =>  'required',
            'enseignant_id'=>'required'
        ]);
    }

    // Add Item
    public function submit(){
        $this->validate([
            'filiere'   =>  'required',
            'enseignant_id'=>'required'
        ]);
        $newFilietre = new Filiere();
        $newFilietre->filiere=$this->filiere;
        $newFilietre->enseignant_id = $this->enseignant_id;
        $newFilietre->save();
        $this->reset();
        $this->dispatchBrowserEvent("hideForm");
        $this->render();
    }

    // Update Item
    public function edit($id){
        $this->filiereUpdate = Filiere::findOrFail($id);
        $this->filiere = $this->filiereUpdate->filiere;
        $this->enseignant_id = $this->filiereUpdate->enseignant_id;
        $this->dispatchBrowserEvent("formUpdate");
    }
    public function update(){
        $this->validate([
            'filiere'   =>  'required',
            'enseignant_id'=>'required'
        ]);
        $this->filiereUpdate->filiere = $this->filiere;
        $this->filiereUpdate ->enseignant_id = $this->enseignant_id;
        $this->filiereUpdate->update();
        $this->reset();
        $this->dispatchBrowserEvent("hideFormUpdate");
    }

    // Delete Item
    public function DeleteConfirmation($id){
        $this->filiere_id = Filiere::findOrFail($id);
        $this->dispatchBrowserEvent("showDeleteConfirmation");
    }
    public function deleteModule(){
        $this->filiere_id->delete();
        $this->dispatchBrowserEvent("moduleDeleted");
    }

    public function render()
    {
        $enseignants=Enseignant::all();
        $filieres=Filiere::all();
        return view('livewire.admin.filiere.filiere-component',compact('filieres','enseignants'));
    }
}
