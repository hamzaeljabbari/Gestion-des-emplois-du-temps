<div class="custom_seance_update" wire:ignore.self>
    <i class="fa-solid fa-xmark hide_form_update" wire:click="hideFormUpdate"></i>
    <form wire:submit.prevent="update">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="specialite">Spécialité</label>
            <input type="text" class="form-control" wire:model="specialite" id="specialite" placeholder="Nom de specialite"/>
            @error('specialite')<p class="text-danger my-1">Obligatoire de saisir la specialite</p>@enderror
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="departement_id">Departement</label>
            <select class="form-select" id="departement_id" wire:model="departement_id">
                @foreach ($departements as $departement)
                    <option value="{{$departement->id}}">{{$departement->departement}}</option>
                @endforeach
            </select>
        </div>
        @error('departement_id')<p class="text-danger my-1">Obligatoire de selectionner le departement</p>@enderror
        <button type="submit" class="btn btn-primary" wire:target="update">
            <span wire:loading.remove wire:target="update">Modifier</span>
            <span wire:loading wire:target="update">Est modifié <i class="fa-solid fa-spinner fa-spin"></i></span>
        </button>
    </form>
</div>