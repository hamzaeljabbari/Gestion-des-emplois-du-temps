@section('title',"Departements")
<div class="departement-section">
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" id="addForm" wire:click="addForm">Ajouter</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table is-striped mytable">
                    <thead>
                        <tr>
                            <th>Departements</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($departements as $departement)
                            <tr>
                                <td><strong>{{$departement->departement}}</strong></td>
                                <td>
                                    <div>
                                        <button wire:click="edit({{$departement->id}})" class="btn btn-success btn-sm">Modifier</button>
                                        <button wire:click="DeleteConfirmation({{$departement->id}})" class="btn btn-danger btn-sm">Supprimer</button>
                                    </div>
                                </td>
                            </tr>                   
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Create new departement --}}
    @include('livewire.admin.inc.forms.create.form-departement')

    <!-- update departement --> 
    @include('livewire.admin.inc.forms.update.update-departement')

</div>