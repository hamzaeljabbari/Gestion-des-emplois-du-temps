<?php

namespace App\Http\Livewire\Admin\Salle;

use App\Models\Salle;
use Livewire\Component;

class SalleComponent extends Component
{
    public $salle,$salleUpdate,$salleDelete,$type_salle,$salleEtat;
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
            'salle'   =>  'required',
            'type_salle'   =>  'required',
        ]);
    }

    // Add Item
    public function submit(){
        $this->validate([
            'salle'   =>  'required',
            'type_salle'   =>  'required',
        ]);
        $newSalle = new Salle();
        $newSalle->salle=$this->salle;
        $newSalle->type_salle=$this->type_salle;
        if($this->salleEtat === true){
            $newSalle->salleEtat=1;
        }
        $newSalle->save();
        $this->reset();
        $this->dispatchBrowserEvent("hideForm");
    }
    
    // Update Item
    public function edit($id){
        $this->salleUpdate = Salle::find($id);
        $this->salle = $this->salleUpdate->salle;
        $this->type_salle = $this->salleUpdate->type_salle;
        $this->salleEtat = $this->salleUpdate->salleEtat;
        $this->dispatchBrowserEvent("formUpdate");
    }
    public function update(){
        $this->validate([
            'salle'   =>  'required',
            'type_salle'   =>  'required',
        ]);
        $this->salleUpdate->salle = $this->salle;
        $this->salleUpdate->type_salle = $this->type_salle;
        if($this->salleEtat === true){
            $this->salleUpdate->salleEtat=1;
        }
        $this->salleUpdate->update();
        $this->dispatchBrowserEvent("hideFormUpdate");
        $this->reset();
    }

    // Delete Item
    public function DeleteConfirmation($id){
        $this->salleDelete = Salle::find($id);
        $this->dispatchBrowserEvent("showDeleteConfirmation");
    }
    public function deleteModule(){
        $this->salleDelete->delete();
        $this->dispatchBrowserEvent("moduleDeleted");
    }
    
    public function render()
    {
        $salles=Salle::all();
        return view('livewire.admin.salle.salle-component',compact('salles'));
    }
}
