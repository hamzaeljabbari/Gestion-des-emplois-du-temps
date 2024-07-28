{{-- <div>
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="accordion mt-3" id="accordionNiveau" wire:ignore>
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOneNiveau" aria-expanded="false" aria-controls="accordionOneNiveau">
                            Paramètres de niveau
                        </button>
                    </h2>

                    <div id="accordionOneNiveau" class="accordion-collapse collapse" data-bs-parent="#accordionNiveau" style="">
                        <div class="accordion-body">
                            <div class="table-responsive">
                                <table class="table table-sm text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Niveau</th>
                                            <th scope="col">Filière</th>
                                            <th scope="col">Langue</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($niveaux as $niveau)
                                            <tr>
                                                <td>{{$niveau->niveau}}</td>
                                                <td>{{$niveau->filiere->filiere}}</td>
                                                <td>{{$niveau->langue->langue}}</td>
                                            </tr>                   
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <hr class="m-0">
                            <h5>Ajouter un niveau</h5>
                            @include('livewire.admin.inc.forms.create.form-niveau')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div> --}}