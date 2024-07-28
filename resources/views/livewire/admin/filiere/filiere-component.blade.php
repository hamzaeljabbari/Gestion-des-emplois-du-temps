@section('title',"Filières")
<div class="filiere-section">
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" wire:click="addForm">Ajouter</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table is-striped">
                    <thead>
                        <tr>
                            <th>filières</th>
                            <th>Coordinateur</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($filieres as $filiere)
                            <tr>
                                <td><strong>{{$filiere->filiere}}</strong></td>
                                <td>{{$filiere->enseignant->nom.' '.$filiere->enseignant->prenom }}</td>                            
                                <td>
                                    <div>
                                        <button wire:click="edit({{$filiere->id}})" class="btn btn-success btn-sm">Modifier</button>
                                        <button wire:click="DeleteConfirmation({{$filiere->id}})" class="btn btn-danger btn-sm">Supprimer</button>
                                    </div>
                                </td>
                            </tr>                   
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Create new filiere --}}
    @include('livewire.admin.inc.forms.create.form-filiere')

    <!-- update filiere --> 
    @include('livewire.admin.inc.forms.update.update-filiere')
</div>