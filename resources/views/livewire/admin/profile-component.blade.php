@section('title',"Mon profil")
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">Détails du profil</div>
            <!-- Account -->
            {{-- <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img
                        src="../assets/img/avatars/1.png"
                        alt="user-avatar"
                        class="d-block rounded"
                        height="100"
                        width="100"
                        id="uploadedAvatar"
                    />
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Télécharger une nouvelle photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg"/>
                        </label>
                        <p class="text-muted mb-0">JPG, GIF ou PNG autorisés. Taille maximale de 800K</p>
                    </div>
                </div>
            </div>
            <hr class="my-0" /> --}}
            
            <div class="card-body">
                <form wire:submit.prevent="updateUser">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Nom et prénom</label>
                            <input class="form-control" type="text" wire:model="name" id="name"/>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input
                                class="form-control"
                                type="text"
                                id="email"
                                wire:model="email"
                            />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="tel">Numéro de téléphone</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">MA (+212)</span>
                                <input
                                type="text"
                                id="tel"
                                wire:model="tel"
                                class="form-control"
                                placeholder="202 555 0111"
                                />
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="address"
                            wire:model="address" placeholder="Address" />
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">
                            <span wire:loading.remove wire:target="updateUser">Modifier</span>
                            <span wire:loading wire:target="updateUser">Est modifié <i class="fa-solid fa-spinner fa-spin"></i></span>
                        </button>
                        <button type="button" wire:click="ResetData" class="btn btn-outline-secondary">Réinitialiser</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header">Supprimer le compte</h5>
            <div class="card-body">
                <div class="mb-3 col-12 mb-0">
                    <div class="alert alert-warning">
                        <h6 class="alert-heading fw-bold mb-1">Êtes-vous sûr de vouloir supprimer votre compte?</h6>
                        <p class="mb-0">Une fois que vous avez supprimé votre compte, il n'y a plus de retour en arrière. Soyez certain.</p>
                    </div>
                </div>
                <form wire:submit.prevent="DeleteConfirmation">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" wire:model="condition" id="condition" required/>
                        <label class="form-check-label" for="condition">
                            <span @error('condition') class="text-danger" @enderror>Je confirme la suppression de mon compte</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-danger deactivate-account">
                        <span wire:loading.remove wire:click="DeleteConfirmation">Supprimer le compte</span>
                        <span wire:loading wire:target="DeleteConfirmation">Est Supprimé <i class="fa-solid fa-spinner fa-spin"></i></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>