<div>
    <h3>Rodapé</h3>
    <hr>
    @if (count($getfooter) < 1)
        <form wire:submit="storefooter">
            @csrf
            <div class="form-group">
                <label class="form-label">Telefone</label>
                <input type="text" class="form-control" name="telefone" wire:model="telefone" placeholder="Insira o seu contacto..">
            </div>

            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" wire:model="email" placeholder="Insira o seu email..">
            </div>

            <div class="form-group">
                <label class="form-label">Endereço</label>
                <input type="text" class="form-control" name="endereco" wire:model="endereco" placeholder="Insira o seu endereço..">
            </div>

            <div class="form-group">
                <label class="form-label">Destaque</label>
                <input type="text" class="form-control" name="atendimento" wire:model="atendimento" placeholder="Insira uma frase em destaque..">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Adicionar">
            </div>
        </form>
    @else
        @foreach ($getfooter as $item)
            <div class="form-group">
                <label class="form-label">Telefone</label>
                <h5>{{$item->telefone}}</h5>
            </div>

            <div class="form-group">
                <label class="form-label">Email</label>
                <h5>{{$item->email}}</h5>
            </div>

            <div class="form-group">
                <label class="form-label">Endereço</label>
                <h5>{{$item->endereco}}</h5>
            </div>

            <div class="form-group">
                <label class="form-label">Destaque</label>
                <h5>{{$item->atendimento}}</h5>
            </div>

            <div class="form-group">
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop{{$item->id}}">Editar</a>
                @include("sbadmin.includes.modal.footer")
            </div>
        @endforeach
    @endif
</div>
