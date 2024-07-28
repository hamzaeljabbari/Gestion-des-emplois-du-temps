<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Admin\DashboardComponent;
use App\Http\Livewire\Admin\CalendarComponent;
use App\Http\Livewire\Admin\Departement\DepartementComponent;
use App\Http\Livewire\Admin\Module\ModulesComponent;
use App\Http\Livewire\Admin\Enseignant\EnseignantsComponent;
use App\Http\Livewire\Admin\Filiere\FiliereComponent;
use App\Http\Livewire\Admin\ImprimerComponent;
use App\Http\Livewire\Admin\Schedule\ScheduleComponent;
use App\Http\Livewire\Admin\Setting\SettingComponent;
use App\Http\Livewire\Admin\ProfileComponent;
use App\Http\Livewire\Admin\Salle\SalleComponent;
use App\Http\Livewire\Admin\Seance\SeanceComponent;
use App\Http\Livewire\Admin\Specialite\SpecialiteComponent;
use App\Models\Specialite;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/', DashboardComponent::class);
    Route::get('/modules', ModulesComponent::class)->name("modules");
    Route::get('/enseignants', EnseignantsComponent::class)->name("enseignants");
    Route::get('/filieres', FiliereComponent::class)->name("filieres");
    Route::get('/departements', DepartementComponent::class)->name("departements");
    Route::get('/salles', SalleComponent::class)->name("salles");
    Route::get('/specilites', SpecialiteComponent::class)->name("specilites");
    Route::get('/newcalender', SeanceComponent::class)->name("newEmploi");
    Route::get('/schedules', ScheduleComponent::class)->name("schedules");
    Route::get('/settings',SettingComponent::class)->name('settings');
    Route::get('/profile',ProfileComponent::class)->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';