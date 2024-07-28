<div class="custom_seance" wire:ignore.self>
    <i class="fa-solid fa-xmark hide_form" wire:click="hideForm"></i>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="departement">Departement</label>
            <input type="text" class="form-control" wire:model="departement" id="departement" placeholder=" Entrer le departement  "/>
            @error('departement')<p class="text-danger my-1">Obligatoire de saisir le departement</p>@enderror
        </div>
        <button type="submit" class="btn btn-primary" wire:target="submit">
            <span wire:loading.remove wire:target="submit">Ajouter</span>
            <span wire:loading wire:target="submit">Est ajouté <i class="fa-solid fa-spinner fa-spin"></i></span>
        </button>
    </form>
</div>