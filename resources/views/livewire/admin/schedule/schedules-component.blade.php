@section("custom_head") <link rel="stylesheet" href="{{asset('assets/vendor/css/custom-print.css')}}" type="text/css" media="print"> @endsection
@php
  function weekVide(){
      for($i = 0 ; $i<8 ;$i++){
          echo "<td></td>";
      };
  };

  function partieVide(){
      for($i = 0 ; $i<4 ;$i++){
        echo "<td></td>";
      };
  };
@endphp

<div>
    <div class="card mb-4 print-hide">
      <div class="card-body">
        <form wire:submit.prevent="filterSchedule">
            @csrf
            <div class="row align-items-center">

                <div class="col-md-3 mb-3">
                    <label for="filiere" class="form-label">filière</label>
                    <select class="form-select" id="filiere" wire:model="filiere" wire:change="getNiveaux">
                        <option selected="selected" value="">liste des filières</option>
                        @foreach ($filieres as $filiere)
                            <option value="{{$filiere->id}}">{{$filiere->filiere}}</option>
                        @endforeach
                    </select>
                    @error("filiere") <p class="text-danger mt-2">Sélectionnez la filiére</p> @enderror
                </div>

                <div class="col-md-3 mb-3" wire:loading.remove wire:target="filiere">
                    <label for="niveau" class="form-label">niveau</label>
                    <select class="form-select" id="niveau" wire:model="niveau" wire:change="getSemestres" aria-label="Default select example">
                        <option selected="selected" value="" >liste des niveaux</option>
                        @foreach ($niveaux as $niveau)
                        <option value="{{$niveau->id}}">{{$niveau->niveau}}</option>
                        @endforeach
                    </select>
                    @error("niveau") <p class="text-danger mt-2">Sélectionnez le niveau</p> @enderror
                </div>
                <div class="col-md-3 spinner-border text-primary" wire:loading wire:target="filiere" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>

                <div class="col-md-3 mb-3" wire:loading.remove wire:target="niveau">
                    <label for="semestre" class="form-label">Semestre</label>
                    <select class="form-select" id="semestre"  wire:model="semestre" aria-label="Default select example">
                        <option selected="selected" value="" >liste des semestres</option>
                        @foreach ($semestres as $semestre)
                        <option value="{{$semestre->id}}">{{$semestre->semestre}}</option>
                        @endforeach
                    </select>
                    @error("semestre") <p class="text-danger mt-2">Sélectionnez le seméstre</p> @enderror
                </div>
                <div class="col-md-3 spinner-border text-primary" wire:loading wire:target="niveau" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>

                <div class="col-md-3 mb-3" wire:loading.remove wire:target="semestre">
                    <label for="weekdate" class="form-label">Semaine</label>
                    <div class="col-md-12">
                        <input type="week" id="weekdate" @if(count($semestres)<1) disabled @endif class="form-control" wire:model="weekdate">
                        @error("weekdate") <p class="text-danger mt-2">Sélectionnez la semaine</p> @enderror
                    </div>
                </div>
                <div class="col-md-3 spinner-border text-primary" wire:loading wire:target="semestre" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>

            </div>
            <button type="submit" class="btn btn-primary col-md-1" wire:loading.remove wire:target="filterSchedule">Filter</button>
            <div class="spinner-border text-primary" wire:loading wire:target="filterSchedule" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
        </form>
      </div>
    </div>
    @if($this->startDate && count($days)>0)
        <div class="card">
            <div class="card-header">
                <button class="btn btn-success print-hide" onclick="window.print()">Imprimer</button>
            </div>
            <div class="card-body">
                <div class="table-responsive rounded">
                    <div class="text-center h2"><b style="color:#000">2<sup>éme</sup> Année de @foreach ($filieres as $filiere) @if($filiere->id == $this->filiere) {{$filiere->filiere}} @endif @endforeach<b></div>
                    <div class="second-header text-center">
                        <div class="h4" style="text-transform: uppercase;color:#000"><u>Programmation des horaires</u></div>
                        <div class="h3"><b style="color:#000"><u>Semaine {{$startDayNumber." ".$startMonthDate}} au {{$endDayNumber." ".$endMonthDate}}</u><b></div>
                    </div>
                    <div class="text-end mt-2">Année universitaire: {{$SeanceYear ." - ". $SeanceYear+1}}</div>
                    
                    <table class="table table-bordered text-center align-middle border-dark" style="color:#000" wire:loading.remove wire:target="filterSchedule">
                        <thead class="table-bordered">
                            <tr>
                                <td></td>
                                <td>08h:30 - 09h:30</td>
                                <td>09h:30 - 10h:30</td>
                                <td>10h:30 - 11h:30</td>
                                <td>11h:30 - 12h:30</td>
                                <td style="background:grey"></td>
                                <td>14h:30 - 15h:30</td>
                                <td>15h:30 - 16h:30</td>
                                <td>16h:30 - 17h:30</td>
                                <td>17h:30 - 18h:30</td>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0 ; $i < 6 ; $i++)
                                <tr>
                                    @if(isset($days[$i]->date))
                                        @php
                                            $dateDay = new DateTime($days[$i]->date);
                                            $DateDayNumber = $dateDay->format('d'); //Get Day number
                                        @endphp
                                        <td>{{$daysWeek[$i]}} {{$DateDayNumber}}</td>
                                        @foreach ($start_8 as $seance8) 
                                            @if($seance8->dateSeance === $days[$i]->date)
                                                <td colspan="{{$seance8->h_end - $seance8->h_start}}">{{$seance8->module->module}}<br>{{$seance8->enseignant->nom}}<br>{{"(".$seance8->salle->salle.")"}}</td>
                                                <span class="d-none">{{$is8 = 1}}</span>
                                                <span class="d-none">{{$morning -= 1}}</span>

                                                @switch($seance8->h_end)
                                                    @case(10)
                                                        @if(!isset($start_10[$i]))
                                                            <td></td>
                                                            <td></td>
                                                        @endif
                                                        @break
                                                    @case(11)
                                                        <td></td>
                                                    @break
                                                @endswitch
                                            @endif
                                        @endforeach

                                        @foreach ($start_9 as $seance9) 
                                            @if($seance9->dateSeance === $days[$i]->date)
                                                <td></td>
                                                <td colspan="{{$seance9->h_end - $seance9->h_start}}">{{$seance9->module->module}}<br>{{$seance9->enseignant->nom}}<br>{{"(".$seance9->salle->salle.")"}}</td>
                                                <span class="d-none">{{$morning -= 1}}</span>
                                                @switch($seance9->h_end)
                                                    @case(10)
                                                        @if(!isset($start_10[$i]))
                                                            <td></td>
                                                            <td></td>
                                                        @endif
                                                    @break
                                                    @case(11)
                                                        <td></td>
                                                    @break
                                                @endswitch
                                            @endif
                                        @endforeach
                                        
                                        @if(isset($start_10[$i]))
                                            @if ($is8 === 1)
                                                <td colspan="{{$start_10[$i]->h_end - $start_10[$i]->h_start}}">{{$start_10[$i]->module->module}}<br>{{$start_10[$i]->enseignant->nom}}<br>{{"(".$start_10[$i]->salle->salle.")"}}</td>
                                                <span class="d-none">{{$morning -= 1}}</span>
                                            @else    
                                                <td></td>
                                                <td></td>
                                                <td colspan="{{$start_10[$i]->h_end - $start_10[$i]->h_start}}">{{$start_10[$i]->module->module}}<br>{{$start_10[$i]->enseignant->nom}}<br>{{"(".$start_10[$i]->salle->salle.")"}}</td>
                                                <span class="d-none">{{$morning -= 1}}</span>
                                            @endif
                                        @endif

                                        {{-- Check if exsiste seance --}}
                                        @if($morning === 3)
                                            {{partieVide()}}
                                        @endif                                
                                        <td style="background:grey"></td>

                                        @foreach ($start_14 as $seance14) 
                                            @if($seance14->dateSeance === $days[$i]->date)
                                                <td colspan="{{$seance14->h_end - $seance14->h_start}}">{{$seance14->module->module}}<br>{{$seance14->enseignant->nom}}<br>{{"(".$seance14->salle->salle.")"}}</td>
                                                <span class="d-none">{{$is14 = 1}}</span>
                                                <span class="d-none">{{$evening -= 1}}</span>
                                                @switch($seance14->h_end)
                                                    @case(16)
                                                        @if(!isset($start_16[$i]))
                                                            <td></td>
                                                            <td></td>
                                                        @endif
                                                    @break
                                                    @case(17)
                                                        <td></td>
                                                    @break
                                                @endswitch
                                            @endif
                                        @endforeach

                                        @foreach ($start_15 as $seance15) 
                                            @if($seance15->dateSeance === $days[$i]->date)
                                                <td></td>
                                                <td colspan="{{$seance15->h_end - $seance15->h_start}}">{{$seance15->module->module}}<br>{{$seance15->enseignant->nom}}<br>{{"(".$seance15->salle->salle.")"}}</td>
                                                <span class="d-none">{{$evening -= 1}}</span>
                                                @switch($seance15->h_end)
                                                    @case(16)
                                                        @if(!isset($start_16[$i]))
                                                            <td></td>
                                                            <td></td>
                                                        @endif
                                                    @break
                                                    @case(17)
                                                        <td></td>
                                                    @break
                                                @endswitch
                                            @endif
                                        @endforeach
                                        
                                        @if(isset($start_16[$i]))
                                            @if ($is14 === 1)
                                                <td colspan="{{$start_16[$i]->h_end - $start_16[$i]->h_start}}">{{$start_16[$i]->module->module}}<br>{{$start_16[$i]->enseignant->nom}}<br>{{"(".$start_16[$i]->salle->salle.")"}}</td>
                                                <span class="d-none">{{$evening -= 1}}</span>
                                            @else    
                                                <td></td>
                                                <td></td>
                                                <td colspan="{{$start_16[$i]->h_end - $start_16[$i]->h_start}}">{{$start_16[$i]->module->module}}<br>{{$start_16[$i]->enseignant->nom}}<br>{{"(".$start_16[$i]->salle->salle.")"}}</td>
                                                <span class="d-none">{{$evening -= 1}}</span>
                                            @endif
                                        @endif
                                        
                                        @if($evening === 3)
                                            {{partieVide()}}
                                        @endif

                                    @else
                                        <td>{{$daysWeek[$i]}} @if(isset($DateDayNumber)) {{$DateDayNumber + $i}} @endif</td>
                                        {{weekVide()}}
                                    @endif
                                </tr>

                                {{-- Reset to values Initiale --}}
                                <span class="d-none">{{$morning = 3}}</span>
                                <span class="d-none">{{$evening = 3}}</span>
                                <span class="d-none">{{$calcTd = 0}}</span>
                                <span class="d-none">{{$calcTde = 0}}</span>
                                <span class="d-none">{{$is8 = 0}}</span>
                                <span class="d-none">{{$is14 = 0}}</span>
                            @endfor
                        </tbody>
                    </table>
                    <h4 style="color:#000;text-transform:uppercase">Enseignants:</h4>
                    <div style="border: 1px solid black;">
                        @foreach ($modulesSeances as $module)
                            <div style="border-bottom: 1px solid black;" class="p-3">
                                <p class="d-inline-block"><u>{{$module->module->module}}</u> :</p>
                                @foreach ($enseignantsSeances as $enseignant)
                                    @if($module->module_id == $enseignant->module_id)
                                        {{$enseignant->enseignant->nom}} - 
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="divider">
            <p class="pider-text">Aucune donnée trouvée à afficher</div>
        </div>
    @endif
</div>