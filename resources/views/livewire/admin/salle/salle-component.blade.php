@section('title',"Les salles")
<div class="salle-section">
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" wire:click="addForm">Ajouter</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table is-striped mytable1">
                    <thead>
                        <tr>
                            <th>Salles</th>
                            <th>Type salle</th>
                            <th>Etat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($salles as $salle)
                            <tr>
                                <td><strong>{{$salle->salle}}</strong></td>
                                <td>{{$salle->type_salle}}</td>
                                <td>{{$salle->salleEtat == 1 ? "Salle occupé" : "Salle vide"}}</td>
                                <td>
                                    <div>
                                        <button wire:click="edit({{$salle->id}})" class="btn btn-success btn-sm">Modifier</button>
                                        <button wire:click="DeleteConfirmation({{$salle->id}})" class="btn btn-danger btn-sm">Supprimer</button>
                                    </div>
                                </td>
                            </tr>                   
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Create new salle --}}
    @include('livewire.admin.inc.forms.create.form-salle')

    <!-- update salle --> 
    @include('livewire.admin.inc.forms.update.update-salle')
</div>
