<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
class ProfileComponent extends Component
{
    public $name,$email,$address,$tel,$userUpdate,$condition;
    protected $listeners = ["deleteConfirmed"=>"deleteUser"];

    public function mount(){
        $this->userUpdate = User::find(Auth::user()->id);
        $this->name = $this->userUpdate->name;
        $this->email = $this->userUpdate->email ;
        $this->tel = $this->userUpdate->tel;
        $this->address = $this->userUpdate->address;
    }
    public function ResetData(){
        $this->name = $this->userUpdate->name;
        $this->email = $this->userUpdate->email ;
        $this->tel = $this->userUpdate->tel;
        $this->address = $this->userUpdate->address;
    }

    public function updated($fildes){
        $this->validateOnly($fildes,[
            'condition' => 'required',
        ]);
    }

    public function updateUser(){
        $this->validate([
            'name'      =>  'required',
            'email'     =>  'required',
        ]);
        $this->userUpdate->name = $this->name;
        $this->userUpdate->email = $this->email;
        $this->userUpdate->tel = $this->tel;
        $this->userUpdate->address = $this->address;
        $this->userUpdate->update();
        $this->dispatchBrowserEvent("updateSuccess");
    }

    public function DeleteConfirmation(){
        if($this->condition){
            $this->dispatchBrowserEvent("showDeleteConfirmation");
        }else{
            $this->validate([
                'condition' =>'required',
            ]);
        }
    }

    public function deleteUser(){
        User::find(Auth::user()->id)->delete();
        $this->dispatchBrowserEvent("moduleDeleted");
        return redirect()->route("login");
    }

    public function render()
    {
        return view('livewire.admin.profile-component');
    }
}