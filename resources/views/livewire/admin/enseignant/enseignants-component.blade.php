@section('title',"Enseignants")
<div class="teacher-section">
    <div class="card">
        <div class="card-header"><button class="btn btn-primary" id="addForm" wire:click="addForm">Ajouter</button></div>
        <div class="card-body">
            <div class="table-responsive text-center">
                <table class="table is-striped mytable">
                    <thead>
                        <tr>
                            <th>Enseignant</th>
                            <th>Email</th>
                            <th>Specialité</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($enseignants as $enseignant)
                            <tr>
                                <td><strong>{{$enseignant->nom .' '.$enseignant->prenom}}</strong></td>
                                <td>{{$enseignant->email}}</td>
                                <td>{{$enseignant->specialite->specialite}}</td>                            
                                <td>
                                    <div>
                                        <button wire:click="edit({{$enseignant->id}})" class="btn btn-success btn-sm">Modifier</button>
                                        <button wire:click="DeleteConfirmation({{$enseignant->id}})" class="btn btn-danger btn-sm">Supprimer</button>
                                    </div>
                                </td>
                            </tr>                   
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Create new enseignant --}}
    @include('livewire.admin.inc.forms.create.form-enseignant')

    <!-- update enseignant --> 
    @include('livewire.admin.inc.forms.update.update-enseignant')

</div>