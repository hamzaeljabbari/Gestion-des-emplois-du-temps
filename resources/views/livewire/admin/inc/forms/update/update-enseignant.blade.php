<div class="custom_seance_update" wire:ignore.self>
    <i class="fa-solid fa-xmark hide_form_update" wire:click="hideFormUpdate"></i>
    <form wire:submit.prevent="update">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="nom">Nom</label>
            <input type="text" class="form-control" wire:model="nom" id="nom" placeholder=" Entrer le nom  "/>
            @error('nom')<p class="text-danger my-1">Obligatoire de saisir le nom</p>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="prenom">Prenom</label>
            <input type="text" class="form-control" wire:model="prenom" id="prenom" placeholder=" Entrer le prenom  "/>
            @error('prenom')<p class="text-danger my-1">Obligatoire de saisir le prenom</p>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="text" class="form-control" wire:model="email" id="email" placeholder=" Entrer l'email  "/>
            @error('email')<p class="text-danger my-1">Obligatoire de saisir le email</p>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="tel">Télèphone</label>
            <input type="text" class="form-control" wire:model="tel" id="tel" placeholder=" Entrer le numéro de télèphone  "/>
            @error('tel')<p class="text-danger my-1">Obligatoire de saisir le numéro télèphone</p>@enderror
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="specialite_id">Spécialité</label>
            <select class="form-select" id="specialite_id" wire:model="specialite_id">
                <option selected="" value="">Choisir...</option>
                @foreach ($specialites as $specialite)
                <option value="{{$specialite->id}}">{{$specialite->specialite }}</option>
                @endforeach
            </select>
        </div>
        @error('specialite_id')<p class="text-danger my-1">Obligatoire de selectionner la spécialité</p>@enderror
        <button type="submit" class="btn btn-primary" wire:target="update">
            <span wire:loading.remove wire:target="update">Modifier</span>
            <span wire:loading wire:target="update">Est Modifié <i class="fa-solid fa-spinner fa-spin"></i></span>
        </button>
    </form>
</div>