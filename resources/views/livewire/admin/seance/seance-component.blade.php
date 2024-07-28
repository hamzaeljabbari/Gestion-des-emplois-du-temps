@section('title',"Créer un nouvel emploi du temps")
<div>
    <div class="card mb-4">
        <div class="card-body">
            <form wire:submit.prevent="filterData">
                @csrf
                <div class="row align-items-center">
                    <div class="col-md-3 mb-3">
                        <label for="filiere" class="form-label">filière</label>
                        <select class="form-select" id="filiere" wire:model="filiere" wire:change="getNiveaux">
                            <option selected="selected" value="" >liste des filières</option>
                            @foreach ($filieres as $filiere)
                                <option value="{{$filiere->id}}">{{$filiere->filiere}}</option>
                            @endforeach
                        </select>
                        @error("filiere") <div class="text-danger">Obligatoire de selectionner</div> @enderror
                    </div>

                    <div class="col-md-3 mb-3" wire:loading.remove wire:target="filiere">
                        <label for="niveau" class="form-label">niveau</label>
                        <select class="form-select" id="niveau" wire:model="niveau" wire:change="getSemestres" aria-label="Default select example">
                            <option selected="selected" value="" >liste des niveaux</option>
                            @foreach ($niveaux as $niveau)
                            <option value="{{$niveau->id}}">{{$niveau->niveau}}</option>
                            @endforeach
                        </select>
                        @error("niveau") <div class="text-danger">Obligatoire de selectionner</div> @enderror
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
                        @error("semestre") <div class="text-danger">Obligatoire de selectionner</div> @enderror
                    </div>
                    <div class="col-md-3 spinner-border text-primary" wire:loading wire:target="niveau" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>

                    <div class="col-md-3 mb-3" wire:loading.remove wire:target="semestre" >
                        <label for="langue" class="form-label">langue</label>
                        <select class="form-select" id="langue" wire:model="langue" aria-label="Default select example">
                            <option selected="selected" value="" >liste des langues</option>
                            @foreach ($langues as $langue)
                                <option value="{{$langue->id}}">{{$langue->langue}}</option>
                            @endforeach
                        </select>
                        @error("langue") <div class="text-danger">Obligatoire de selectionner</div> @enderror
                    </div>
                    <div class="col-md-3 spinner-border text-primary " wire:loading wire:target="semestre" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <button type="submit" wire:loading.remove wire:target="filterData" class="btn btn-primary col-md-1">Filter</button>
                <div class="spinner-border text-primary" wire:loading wire:target="filterData" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </form>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div id="calendar-container" wire:target="filterData">
                <a href="{{route('schedules')}}" class="btn btn-success mb-3">Suivi les emplois du temps</a>
                <div id="events"></div>
                <div id="calendar" wire:ignore></div>
            </div>
        </div>
    </div>
    


    @push('scripts')
        <script>
            document.addEventListener('mycalender', function () {
                let Calendar = FullCalendar.Calendar;
                let calendarEl = document.getElementById('calendar');
                let Draggable = FullCalendar.Draggable;
                let calendar = new Calendar(calendarEl, {

                    headerToolbar: {
                        left: 'prev,next',
                        center: 'title',
                        {{-- right: 'timeGridWeek', --}}
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                    },
                    timeZone: 'America/New_York',
                    events: JSON.parse(@this.seances),
                    editable: true,       
                    selectable: true,
                    navLinks: true,
                    allDaySlot: false,
                    selectMirror : true,
                    slotMinTime: "08:00:00",
                    slotMaxTime: "19:00:00",
                    hiddenDays: [ 0 ],
                    eventColor: 'green',

                    datesSet: function(info) {
                        Livewire.emit('updateWeek', info.start, info.end);
                    },

                    eventResize: info => @this.eventChange(info.event),
                    eventDrop: info => @this.eventChange(info.event),

                    select: arg => {
                            let dataSeance = calendar.addEvent({
                                start: arg.start,
                                end: arg.end,
                            });
                            @this.eventAdd(dataSeance);
                            calendar.unselect();
                        document.querySelector(".hide_form").onclick=()=>{
                            document.querySelector(".custom_seance").classList.remove("show_custom_seance");
                        };
                    },

                    eventClick: info => {
                        if (confirm("Voulez-vous vraiment supprimer cet événement?")) {
                            info.event.remove();
                            @this.eventRemove(info.event.id);
                        }
                    },
                });
                
                calendar.setOption('locale', 'fr');
                calendar.render();
                calendar.changeView('timeGridWeek');
            });
        </script>
    @endpush

    {{-- Create new seance --}}
    @include('livewire.admin.inc.forms.create.form-seance')
</div>
