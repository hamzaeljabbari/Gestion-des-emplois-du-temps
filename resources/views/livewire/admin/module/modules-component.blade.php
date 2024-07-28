@section('title',"Modules")
<div class="module-section">
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" wire:click="addForm">Ajouter</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table mytable table-sm text-center">
                    <thead>
                        <tr>
                            <th scope="col">Module</th>
                            <th scope="col">Type de module</th>
                            <th scope="col">Volume horaire</th>
                            <th scope="col">Coordinateur</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($modules as $module)
                            <tr>
                                <td>{{$module->module}}</td>
                                <td>{{$module->type_module}}</td>
                                <td>{{$module->v_horaire}}h</td>
                                <td>{{$module->enseignant->nom .' '.$module->enseignant->prenom}}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button wire:click="edit({{$module->id}})" class="btn btn-success btn-sm">Modifier</button>
                                        <button wire:click="DeleteConfirmation({{$module->id}})" class="btn btn-danger btn-sm">Supprimer</button>
                                    </div>
                                </td>
                            </tr>                   
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Create new module --}}
    @include('livewire.admin.inc.forms.create.form-module')

    <!-- update module --> 
    @include('livewire.admin.inc.forms.update.update-module')

</div>