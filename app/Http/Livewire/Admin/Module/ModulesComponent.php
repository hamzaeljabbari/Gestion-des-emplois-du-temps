<?php

namespace App\Http\Livewire\Admin\Module;

use App\Models\Enseignant;
use App\Models\Module;
use Livewire\Component;

class ModulesComponent extends Component
{
    public $module,$type_module,$v_horaire,$enseignant_id,$moduleDelete,$moduleUpdate;
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
            'module'   =>  'required',
            'type_module'   =>  'required',
            'v_horaire'   =>  'required',
            'enseignant_id'   =>  'required'
        ]);
    }

    public function submit(){
        $this->validate([
            'module'   =>  'required',
            'type_module'   =>  'required',
            'v_horaire'   =>  'required',
            'enseignant_id'   =>  'required'
        ]);
        $newModule = new Module();
        $newModule->module = $this->module;
        $newModule->type_module = $this->type_module;
        $newModule->v_horaire = $this->v_horaire;
        $newModule->enseignant_id = $this->enseignant_id;
        $newModule->save();
        $this->reset();
        $this->dispatchBrowserEvent("hideForm");
    }

    public function edit($id){
        $this->moduleUpdate = Module::find($id);

        $this->module = $this->moduleUpdate->module;
        $this->type_module = $this->moduleUpdate->type_module ;
        $this->v_horaire = $this->moduleUpdate->v_horaire;
        $this->enseignant_id = $this->moduleUpdate->enseignant_id;
        $this->dispatchBrowserEvent("formUpdate");
    }
    public function update(){
        $this->validate([
            'module'   =>  'required',
            'type_module'   =>  'required',
            'v_horaire'   =>  'required',
            'enseignant_id'   =>  'required'
        ]);
        $this->moduleUpdate->module = $this->module;
        $this->moduleUpdate->type_module = $this->type_module;
        $this->moduleUpdate->v_horaire = $this->v_horaire;
        $this->moduleUpdate->enseignant_id = $this->enseignant_id;
        $this->moduleUpdate->update();
        $this->reset();
        $this->dispatchBrowserEvent("hideFormUpdate");

    }
    
    public function DeleteConfirmation($id){
        $this->moduleDelete = Module::find($id);
        $this->dispatchBrowserEvent("showDeleteConfirmation");
    }
    public function deleteModule(){
        $this->moduleDelete->delete();
        $this->dispatchBrowserEvent("moduleDeleted");
    }

    public function render()
    {
        $enseignants = Enseignant::all();
        $modules = Module::all();
        return view('livewire.admin.module.modules-component',compact("enseignants","modules"));
    }
}
