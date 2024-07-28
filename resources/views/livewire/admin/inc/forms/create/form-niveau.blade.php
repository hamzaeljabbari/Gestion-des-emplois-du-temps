<form wire:submit.prevent="submit">
  @csrf
  <div class="row">
    <div class="col-md-4 mb-3">
      <div class="input-group">
        <label class="input-group-text" for="niveau">Niveau</label>
        <input type="text" class="form-control" wire:model="niveau" id="niveau" placeholder="Par exemple niveau 1"/>
      </div>
      @error('niveau') <p class="text-danger my-1">Veuillez saisir le niveau</p> @enderror
    </div>

    <div class="col-md-4 mb-3">
      <div class="input-group">
          <label class="input-group-text" for="langue_id">Langues</label>
          <select class="form-select" id="langue_id" wire:model="langue_id">
              <option selected="" value="">Choisir...</option>
              @foreach ($langues as $langue)
                <option value="{{$langue->id}}">{{$langue->langue}}</option>
              @endforeach
          </select>
      </div>
      @error("langue_id") <p class="text-danger my-1">Veuillez sélectionner la langue</p> @enderror
    </div>

    <div class="col-md-4">
      <div class="input-group">
          <label class="input-group-text" for="filiere_id">Filières</label>
          <select class="form-select" id="filiere_id" wire:model="filiere_id">
              <option selected="" value="">Choisir...</option>
              @foreach ($filiers as $filiere)
                <option value="{{$filiere->id}}">{{$filiere->filiere}}</option>
              @endforeach
          </select>
      </div>
      @error("filiere_id") <p class="text-danger my-1">Veuillez sélectionner la filière</p> @enderror
    </div>
  </div>
  <button type="submit" class="btn btn-primary" wire:target="submit">
    <span wire:loading.remove wire:target="submit">Ajouter</span>
    <span wire:loading wire:target="submit">Est ajouté <i class="fa-solid fa-spinner fa-spin"></i></span>
  </button>
</form>