@extends("layouts.index")
@section("title", "Painel Admin - Hero")
@section("content")
@include("sweetalert::alert")
    {{-- side bar --}}
    @include("sbadmin.includes.sidebar")

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include("sbadmin.includes.topbar")

            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-12 col-lg-6">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header bg-primary py-3 flex-row align-items-center justify-content-between col-xl-12">
                                <div class="col-xl-6">
                                    <h6 class="m-0 font-weight-bold text-white">Elementos Website</h6>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body d-flex">
                                <div class="col-xl-6 {{count($skills) > 3 ? "d-none" : ""}}">
                                    <form action="{{route("admin.store.detail")}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <select name="elements" class="form-control">
                                                <option disabled selected>Escolha a tematica</option>
                                                <option value="Trabalhos">Trabalhos Concluidos</option>
                                                <option value="Experiência">Anos de Experiência </option>
                                                <option value="Clientes">Total de Clientes </option>
                                                <option value="Premios">Premios</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Quantidade</label>
                                            <input type="text" name="level" class="form-control" placeholder="Insira o numero correspondente...">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Adicionar">
                                        </div>
                                    </form>
                                </div>

                                <div class="col-xl-6 mt-4">
                                    @foreach ($skills as $item)
                                        <div class="form-group d-flex justify-content-between">
                                            <div>
                                                <label class="form-label">Elementos</label>
                                                <h5>{{$item->elements}}</h5>
                                            </div>

                                            <div>
                                                <label class="form-label">Quantidade</label>
                                                <h5>{{$item->level}}</h5>
                                            </div>

                                            <div>
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop{{$item->id}}">Editar</button>
                                                @include("sbadmin.includes.modal.skill")
                                            </div>
                                        </div>  
                                    @endforeach
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection