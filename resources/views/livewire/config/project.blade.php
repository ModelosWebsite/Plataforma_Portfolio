<div>
    <h3>Projectos</h3>
    <hr>
    <form wire:submit.prevent="storeOrUpdateProject" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="form-label">Nome do Projecto:</label>
            <input type="text" class="form-control" wire:model="title" name="title" placeholder="Insira o nome do projecto...">
        </div>

        <div class="form-group">
            <label class="form-label">Fotografia</label>
            <input type="file" wire:model="image" name="image" class="form-control">
        </div>

        <!-- Campo oculto para ID do projeto (para edição) -->
        <input type="hidden" wire:model="projectId">

        <div class="form-group">
            <input type="submit" value="{{ $projectId ? 'Atualizar' : 'Adicionar' }}" class="btn btn-primary">
        </div>
    </form>

    <hr>

    <div class="table-responsive">
        <table class="table">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">Projecto</th>
                    <th scope="col">IMG</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($getproject))
                    @foreach ($getproject as $item)
                        <tr>
                            <td scope="row">{{$item->title}}</td>
                            <td><img src="{{ $item->image_url }}" alt="{{ $item->title }}" width="50"></td>
                            <td>
                                <button wire:click="edit({{ $item->id }})" class="btn btn-warning btn-sm">Editar</button>
                                <button wire:click="deleteproject({{ $item->id }})" class="btn btn-danger btn-sm">Excluir</button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">Nenhum projeto encontrado.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
        
</div>