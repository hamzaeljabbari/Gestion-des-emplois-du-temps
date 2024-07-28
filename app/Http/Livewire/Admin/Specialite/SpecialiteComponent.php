<?php

namespace App\Http\Livewire\Admin\Specialite;

use App\Models\Departement;
use App\Models\Specialite;
use Livewire\Component;

class SpecialiteComponent extends Component
{
    public $specialite,$departement_id,$specialiteDelete,$specialiteUpdate;
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
            'specialite'   =>  'required',
            'departement_id'   =>  'required'
        ]);
    }

    // Add Item
    public function submit(){
        $this->validate([
            'specialite'   =>  'required',
            'departement_id'   =>  'required'
        ]);
        $newSpecialite = new Specialite();
        $newSpecialite->specialite = $this->specialite;
        $newSpecialite->departement_id = $this->departement_id;
        $newSpecialite->save();
        $this->reset();
        $this->dispatchBrowserEvent("hideForm");
    }

    // Update Item
    public function edit($id){
        $this->specialiteUpdate = Specialite::findOrFail($id);
        $this->specialite = $this->specialiteUpdate->specialite;
        $this->departement_id = $this->specialiteUpdate->departement_id;
        $this->dispatchBrowserEvent("formUpdate");
    }
    public function update(){
        $this->validate([
            'specialite'   =>  'required',
            'departement_id'   =>  'required'
        ]);
        $this->specialiteUpdate->specialite = $this->specialite;
        $this->specialiteUpdate->departement_id = $this->departement_id;
        $this->specialiteUpdate->update();
        $this->reset();
        $this->dispatchBrowserEvent("hideFormUpdate");
    }
    
    // Delete Item
    public function DeleteConfirmation($id){
        $this->specialiteDelete = Specialite::findOrFail($id);
        $this->dispatchBrowserEvent("showDeleteConfirmation");
    }
    public function deleteModule(){
        $this->specialiteDelete->delete();
        $this->dispatchBrowserEvent("moduleDeleted");
    }
    public function render()
    {
        $specialites=Specialite::all();
        $departements=Departement::all();
        return view('livewire.admin.specialite.specialite-component',compact('specialites','departements'));
    }
}
