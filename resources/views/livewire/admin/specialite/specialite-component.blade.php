@section('title',"Spécialités")

<div class="specialite-section">
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" id="addForm" wire:click="addForm">Ajouter</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                        <th>Specialité</th>
                        <th>Departement</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($specialites as $specialite)
                            <tr>
                                <td><strong>{{$specialite->specialite}}</strong></td>
                                <td>{{$specialite->departement->departement}}</td>
                                <td>
                                    <div>
                                        <button wire:click="edit({{$specialite->id}})" class="btn btn-success btn-sm">Modifier</button>
                                        <button wire:click="DeleteConfirmation({{$specialite->id}})" class="btn btn-danger btn-sm">Supprimer</button>
                                    </div>
                                </td>
                            </tr>                   
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Create new specialite --}}
    @include('livewire.admin.inc.forms.create.form-specialite')

    <!-- update specialite --> 
    @include('livewire.admin.inc.forms.update.update-specialite')
</div>
