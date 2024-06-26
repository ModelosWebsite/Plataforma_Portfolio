@extends("layouts.index")
@section("title", "Painel Admin - Definições")
@section("content")
@include("sweetalert::alert")
@include("sbadmin.documentation.config.App")
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
                                <div class="col-xl-12 d-flex justify-content-between">
                                    <div>
                                        <h6 class="m-0 font-weight-bold text-white">Configurações</h6>
                                    </div>
                                    <div>
                                        <svg data-toggle="modal" data-target="#exampleModal" style="color: #fff; cursor: pointer;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div>
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                          <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                              <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Habilitar o Site
                                              </button>
                                            </h2>
                                          </div>
                                      
                                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="col-6">
                                                    <form id="statusForm" action="{{ route('admin.update.status.company') }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="status" id="statusCheckbox" {{ $statusSite->status === 'active' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="statusCheckbox">
                                                                Ativar/Desativar
                                                            </label>
                                                        </div>
                                                    </form>
                                                    
                                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#statusCheckbox').change(function(){
                                                                $('#statusForm').submit();
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="card">
                                          <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                              <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#politica" aria-expanded="false" aria-controls="collapseTwo">
                                                Cadastrar Politica de Privacidade e Termos e Condições.
                                              </button>
                                            </h2>
                                          </div>
                                          <div id="politica" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <div class="card-body">          
                                                <div class="col-xl-6">
                                                         <form action="{{route("admin.conditions.create")}}" method="post">
                                                             @csrf
                                                             <div class="">
                                                                 <div class="form-group">
                                                                     <label class="form-label">Escreva a sua Politica de privacidade</label>
                                                                     <textarea name="privacy" class="form-control" placeholder="Insira uma descrição...."></textarea>
                                                                 </div>
                                
                                                                 <div class="form-group">
                                                                     <label class="form-label">Escreva o seu Termo de Condições</label>
                                                                     <textarea name="condition" class="form-control" placeholder="Insira uma descrição...."></textarea>
                                                                 </div>
                                                             </div>
                                                             <style>
                                                                 textarea{
                                                                     width: 35rem;
                                                                     height: 100px;
                                                                     margin: 10px;
                                                                 }
                                                             </style>
                            
                                                         <div class="form-group">
                                                             <input type="submit" class="btn btn-primary" value="Cadastrar">
                                                        </div>
                                                     </form>
                                                </div>

                                            <style>
                                                .conteudo {
                                                    max-height: 200px;
                                                    overflow: hidden;
                                                  }
                                                  .conteudo.expandido {
                                                    max-height: none;
                                                  }
                                            </style>
                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                                <div class="col-xl-12 d-flex">    
                                                    <div class="form-group conteudo" id="">
                                                        <h3>Politica de Privacidade</h3>
                                                        <div class=" p-3">
                                                            <p>{{isset($termos->privacy) ? $termos->privacy : ""}}</p>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group conteudo" id="conteudo">
                                                        <h3>Termos e Condições</h3>
                                                        <div class="p-3">   
                                                            <p>{{isset($termos->condition) ? $termos->condition : ""}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex mx-5">
                                                    <button id="botaoLerMais" class="btn btn-primary">Ler Mais</button>
                                                    <div class="form-group">
                                                        <button class="btn btn-primary" data-toggle="modal" data-target="#conditions">Editar</button>
                                                        @include("sbadmin.conditions.modal")
                                                    </div>
                                                </div>

                                                <script>
                                                    $(document).ready(function() {
                                                        $('#botaoLerMais').click(function() {
                                                        $('.conteudo').toggleClass('expandido');
                                                        if ($('.conteudo').hasClass('expandido')) {
                                                            $('#botaoLerMais').text('Menos');
                                                        } else {
                                                            $('#botaoLerMais').text('Ler Mais');
                                                        }
                                                        });
                                                    });
                                                </script>

                                            </div>
                                          </div>
                                        </div>

                                        <div class="card">
                                          <div class="card-header" id="headingThree">
                                            <h2 class="mb-0">
                                              <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Uso dos Termos
                                              </button>
                                            </h2>
                                          </div>
                                          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <form id="status" action="{{ route('items.updateStatus') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="status" id="statusCheckBook" {{ isset($termos->status) === 'active' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="statusCheckBook">
                                                            Ativar/Desativar
                                                        </label>
                                                    </div>
                                                </form>
                                                
                                                <script>
                                                    $(document).ready(function(){
                                                        $('#statusCheckBook').change(function(){
                                                            $('#status').submit();
                                                        });
                                                    });
                                                </script>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection