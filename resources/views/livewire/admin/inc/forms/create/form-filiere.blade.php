<div class="custom_seance" wire:ignore.self>
    <i class="fa-solid fa-xmark hide_form" wire:click="hideForm"></i>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="filiere">Filière</label>
            <input type="text" class="form-control" wire:model="filiere" id="filiere" placeholder=" Entrer le filiere  "/>
            @error('filiere')<p class="text-danger my-1">Obligatoire de saisir le filiere</p>@enderror
        </div>


        <div class="input-group mb-3">
            <label class="input-group-text" for="enseignant_id">Coordinateur</label>
            <select class="form-select" id="enseignant_id" wire:model="enseignant_id">
                <option selected="" value="">Choisir...</option>
                @foreach ($enseignants as $enseignant)
                <option value="{{$enseignant->id}}">{{$enseignant->nom.' '.$enseignant->prenom  }}</option>
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