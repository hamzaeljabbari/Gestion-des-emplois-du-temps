<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Departement;
use App\Models\Module;
use App\Models\Salle;
use App\Models\Enseignant;
class DashboardComponent extends Component
{
    public function render()
    {
        $departements = Departement::all();
        $modules = Module::all();
        $salles = Salle::all();
        $enseignants = Enseignant::all();
        $data = compact("departements","modules","salles","enseignants");
        return view('livewire.admin.dashboard-component',$data);
    }
}
