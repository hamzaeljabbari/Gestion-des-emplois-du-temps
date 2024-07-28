<?php

namespace App\Http\Livewire\Admin\Enseignant;

use App\Models\Enseignant;
use App\Models\Specialite;
use Livewire\Component;

class EnseignantsComponent extends Component
{
    public $nom,$prenom,$email,$tel,$specialite_id,$enseigantUpdate,$enseignantDelete;
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
            'nom'   =>  'required',
            'prenom'   =>  'required',
            'email'   =>  'required',
            'tel'   =>  'required',
            'specialite_id'=>'required'
        ]);
    }

    // Add Item
    public function submit(){
        $this->validate([
            'nom'   =>  'required',
            'prenom'   =>  'required',
            'email'   =>  'required',
            'tel'   =>  'required',
            'specialite_id'=>'required'
        ]);
        $newEnseignant = new Enseignant();
        $newEnseignant->nom = $this->nom;
        $newEnseignant->prenom = $this->prenom;
        $newEnseignant->email = $this->email;
        $newEnseignant->tel = $this->tel;
        $newEnseignant->specialite_id = $this->specialite_id;
        $newEnseignant->save();
        $this->reset();
        $this->dispatchBrowserEvent("hideForm");
    }

    // Update Item
    public function edit($id){
        $this->enseigantUpdate = Enseignant::find($id);
        $this->nom = $this->enseigantUpdate->nom;
        $this->prenom = $this->enseigantUpdate->prenom ;
        $this->email = $this->enseigantUpdate->email;
        $this->tel = $this->enseigantUpdate->tel;
        $this->specialite_id = $this->enseigantUpdate->specialite_id;
        $this->dispatchBrowserEvent("formUpdate");
    }
    public function update(){
        $this->validate([
            'nom'   =>  'required',
            'prenom'   =>  'required',
            'email'   =>  'required',
            'tel'   =>  'required',
            'specialite_id'=>'required'
        ]);
        $this->enseigantUpdate->nom = $this->nom;
        $this->enseigantUpdate->prenom = $this->prenom;
        $this->enseigantUpdate->email = $this->email;
        $this->enseigantUpdate->tel = $this->tel;
        $this->enseigantUpdate->specialite_id = $this->specialite_id;
        $this->enseigantUpdate->update();
        $this->reset();
        $this->dispatchBrowserEvent("hideFormUpdate");
    }
    
    // Delete Item
    public function DeleteConfirmation($id){
        $this->enseignantDelete = Enseignant::find($id);
        $this->dispatchBrowserEvent("showDeleteConfirmation");
    }
    public function deleteModule(){
        $this->enseignantDelete->delete();
        $this->dispatchBrowserEvent("moduleDeleted");
    }

    public function render(){
        $enseignants    =   Enseignant::all();
        $specialites    =   Specialite::all();
        return view('livewire.admin.enseignant.enseignants-component',compact("enseignants","specialites"));
    }
}
