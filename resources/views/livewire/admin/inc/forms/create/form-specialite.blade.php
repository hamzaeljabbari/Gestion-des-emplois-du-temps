<div class="custom_seance" wire:ignore.self>
    <i class="fa-solid fa-xmark hide_form" wire:click="hideForm"></i>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="specialite">Spécialité</label>
            <input type="text" class="form-control" wire:model="specialite" id="specialite" placeholder="Nom de specialite"/>
            @error('specialite')<p class="text-danger my-1">Obligatoire de saisir la specialite</p>@enderror
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="departement_id">Departement</label>
            <select class="form-select" id="departement_id" wire:model="departement_id">
                <option selected="" value="">Choisir...</option>
                @foreach ($departements as $departement)
                    <option value="{{$departement->id}}">{{$departement->departement}}</option>
                @endforeach
            </select>
        </div>
        @error('departement_id')<p class="text-danger my-1">Obligatoire de selectionner le departement</p>@enderror
        <button type="submit" class="btn btn-primary" wire:target="submit">
            <span wire:loading.remove wire:target="submit">Ajouter</span>
            <span wire:loading wire:target="submit">Est ajouté <i class="fa-solid fa-spinner fa-spin"></i></span>
        </button>
    </form>
</div>