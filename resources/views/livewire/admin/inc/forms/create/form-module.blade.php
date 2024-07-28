<div class="custom_seance" wire:ignore.self>
    <i class="fa-solid fa-xmark hide_form" wire:click="hideForm"></i>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="module">Nom de Module</label>
            <input type="text" class="form-control" wire:model="module" id="module" placeholder="Nom de module"/>
            @error('module')<p class="text-danger my-1">Obligatoire de saisir le module</p>@enderror
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="type_module">Type de module</label>
            <select class="form-select" id="type_module" wire:model="type_module">
                <option selected="" value="">Choisir...</option>
                <option value="cours_theorique">Cours théorique</option>
                <option value="travaux_diriges">Travaux dirigés</option>
                <option value="travaux_pratique">Travaux pratique</option>
            </select>
        </div>
        @error('type_module')<p class="text-danger my-1">Obligatoire de selectionner le type de module</p>@enderror
        <div class="mb-3">
            <label class="form-label" for="v_horaire">Volume Horaire</label>
            <input type="number" class="form-control" wire:model="v_horaire" id="v_horaire" placeholder="Volume Horaire" />
        </div>
        @error('v_horaire')<p class="text-danger my-1">Obligatoire de saisir le Volume Horaire</p>@enderror
        <div class="input-group mb-3">
            <label class="input-group-text" for="enseignant_id">Coordinateur</label>
            <select class="form-select" id="enseignant_id" wire:model="enseignant_id">
                <option selected="" value="">Choisir...</option>
                @foreach ($enseignants as $enseignant)
                <option value="{{$enseignant->id}}">{{$enseignant->nom ." ".$enseignant->prenom}}</option>
                @endforeach
            </select>
        </div>
        @error('enseignant_id')<p class="text-danger my-1">Obligatoire de sélectionner le coordinateur</p>@enderror
        <button type="submit" class="btn btn-primary" wire:target="submit">
            <span wire:loading.remove wire:target="submit">Ajouter</span>
            <span wire:loading wire:target="submit">Est ajouté <i class="fa-solid fa-spinner fa-spin"></i></span>
        </button>
    </form>
</div>