<?php

namespace App\Http\Livewire\Admin\Departement;

use App\Models\Departement;
use Livewire\Component;

class DepartementComponent extends Component
{
    public $departement,$departementUpdate,$departementDelete;
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
            'departement'   =>  'required',
        ]);
    }

    // Add Item
    public function submit(){
        $this->validate([
            'departement'   =>  'required',
        ]);
        $newDepartement = new Departement();
        $newDepartement->departement=$this->departement;
        $newDepartement->save();
        $this->reset();
        $this->dispatchBrowserEvent("hideForm");
    }
    
    // Update Item
    public function edit($id){
        $this->departementUpdate = Departement::find($id);
        $this->departement = $this->departementUpdate->departement;
        $this->dispatchBrowserEvent("formUpdate");
    }
    public function update(){
        $this->validate([
            'departement'   =>  'required',
        ]);
        $this->departementUpdate->departement =$this->departement;
        $this->departementUpdate->update();
        $this->reset();
        $this->dispatchBrowserEvent("hideFormUpdate");
    }

    // Delete Item
    public function DeleteConfirmation($id){
        $this->departementDelete = Departement::find($id);
        $this->dispatchBrowserEvent("showDeleteConfirmation");
    }
    public function deleteModule(){
        $this->departementDelete->delete();
        $this->dispatchBrowserEvent("moduleDeleted");
    }

    public function render()
    {
        $departements = Departement::all();
        return view('livewire.admin.departement.departement-component',compact('departements'));
    }
}
