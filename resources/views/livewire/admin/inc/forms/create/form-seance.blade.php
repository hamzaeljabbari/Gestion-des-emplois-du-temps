<div class="custom_seance" wire:ignore.self>
    <i class="fa-solid fa-xmark hide_form" wire:click="hideForm"></i>
    <form wire:submit.prevent="newSeance">
        @csrf
        <div class="form-check my-3">
            <input class="form-check-input" type="checkbox" wire:model="isEmpty" id="isEmpty">
            <label class="form-check-label" for="isEmpty"> Jour vide</label>
        </div>
        
        <div class="input-group mb-3">
            <label class="input-group-text" for="seance_repeat">Répétez la séance</label>
            <select class="form-select" id="seance_repeat" wire:model="seance_repeat">
            @for($i=1; $i<11 ; $i++)
                <option value="{{$i}}">{{$i}}</option>
            @endfor
            </select>
        </div>

        <div class="input-group">
            <label class="input-group-text" for="module_id">Module</label>
            <select class="form-select" id="module_id" wire:model="module_id">
                <option selected="selected" value="">Choisir...</option>
                @foreach ($modules as $module)
                    <option value="{{$module->id}}">{{$module->module}}</option>
                @endforeach
            </select>
        </div>
        @error("module_id") <p class="text-danger mb-3 mt-1">Sélectionnez le module</p> @enderror

        <div class="input-group mt-3">
            <label class="input-group-text" for="type_seance">Type de séance</label>
            <select class="form-select" id="type_seance" wire:model="type_seance">
                <option selected="selected" value="">Choisir...</option>
                <option value="Cours théorique">Cours théorique</option>
                <option value="Travaux dirigés">Travaux dirigés</option>
                <option value="Travaux pratique">Travaux pratique</option>
            </select>
        </div>
        @error("type_seance") <p class="text-danger mb-3 mt-1">Sélectionnez le type de séance</p> @enderror

        <div class="mt-3">
            <label class="form-label" for="theme_module">Thème de module</label>
            <textarea
            id="theme_module"
            class="form-control"
            wire:model="theme_module"
            placeholder="Entrer le thème de module"
            ></textarea>
        </div>
        @error("theme_module") <p class="text-danger mb-3 mt-1">Enter thème de module</p> @enderror

        <div class="input-group mt-3">
            <label class="input-group-text" for="enseignant_id">L'enseignant</label>
            <select class="form-select" id="enseignant_id" wire:model="enseignant_id">
            <option selected="selected" value="">Choisir...</option>
            @foreach ($enseignants as $enseignant)
                <option value="{{$enseignant->id}}">{{$enseignant->nom ." ".$enseignant->prenom}}</option>
            @endforeach
            </select>
        </div>
        @error("enseignant_id") <p class="text-danger mb-3 mt-1">Sélectionnez l'enseignant</p> @enderror

        <div class="input-group mt-3">
            <label class="input-group-text" for="salle_id">La salle</label>
            <select class="form-select" id="salle_id" wire:model="salle_id">
            <option selected="selected" value="">Choisir...</option>
            @foreach ($salles as $salle)
                <option value="{{$salle->id}}">{{$salle->salle}}</option>
            @endforeach
            </select>
        </div>
        @error("salle_id") <p class="text-danger mb-3 mt-1">Sélectionnez la salle</p> @enderror

        <div class="input-group mt-3">
            <label class="input-group-text" for="groupe">Groupe</label>
            <select class="form-select" id="groupe" wire:model="groupe">
                <option selected="selected" value="">Choisir...</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
                <option value="H">H</option>
            </select>
        </div>
        @error("groupe") <p class="text-danger mb-3 mt-1">Sélectionnez le groupe</p> @enderror

        <div class="mt-3">
            <label class="form-label" for="sous_groupe">Sous groupe</label>
            <input type="text" class="form-control" wire:model="sous_groupe" id="sous_groupe" />
        </div>
        @error("sous_groupe") <p class="text-danger mb-3 mt-1">Sélectionnez Sous groupe</p> @enderror

        <div class="form-check my-3">
            <input class="form-check-input" type="checkbox" wire:model="etat_seance" id="etat_seance">
            <label class="form-check-label" for="etat_seance"> Séance absence?</label>
        </div>
        @if($etat_seance == 1)
            <div class="mb-3">
                <label class="form-label" for="motif_absence">Motif d'absence</label>
                <textarea
                    required
                    rows="5"
                    id="motif_absence"
                    class="form-control"
                    wire:model="motif_absence"
                    placeholder="Enter motif d'absence"
                ></textarea>
            </div>
            {{-- @error("motif_absence") <p class="text-danger mb-3 mt-1">Enter motif d'absence</p> @enderror --}}
        @endif
        
        <button type="submit" wire:loading.remove wire:target="newSeance" class="btn btn-primary">Ajouter</button>
        <button type="submit" wire:loading wire:target="newSeance" class="btn btn-primary">Est ajouté...</button>
    </form>
</div>