<div class="custom_seance_update" wire:ignore.self>
    <i class="fa-solid fa-xmark hide_form_update" wire:click="hideFormUpdate"></i>
    <form wire:submit.prevent="update">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="salle">Salle</label>
            <input type="text" class="form-control" wire:model="salle" id="salle" placeholder=" Entrer le salle  "/>
            @error('salle')<p class="text-danger my-1">Obligatoire de saisir le salle</p>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="type_salle">Type de salle</label>
            <input type="text" class="form-control" wire:model="type_salle" id="type_salle" placeholder=" Entrer le type_salle  "/>
            @error('type_salle')<p class="text-danger my-1">Obligatoire de saisir le type de salle</p>@enderror
        </div>
        <div class="form-check my-3">
            <input class="form-check-input" type="checkbox"  wire:model="salleEtat" id="salleEtat">
            <label class="form-check-label" for="salleEtat"> Est ce que cette salle est indisponible?</label>
        </div>
        <button type="submit" class="btn btn-primary" wire:target="update">
            <span wire:loading.remove wire:target="update">Ajouter</span>
            <span wire:loading wire:target="update">Est ajouté <i class="fa-solid fa-spinner fa-spin"></i></span>
        </button>
    </form>
</div>