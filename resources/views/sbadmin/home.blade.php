@extends('layouts.index')
@section('title', 'Painel Administrativo')
@section('content')
    @include('sbadmin.includes.sidebar')
    @include('sbadmin.includes.modal.started')
    <!-- Content Wrapper -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            @include('sbadmin.includes.topbar')
            <!-- End of Topbar -->
            @include('sbadmin.active.app')

            <!-- Begin Page Content -->
            <div class="container-fluid" style="margin-top: 8rem">
                <div class="row col-xl-12 d-flex justify-content-center align-content-center">
                
                    <div class="text-center">
                        <h2>Bem vindo ao painel administrativo do teu site <span class="text-primary">{{auth()->user()->name}}</span></h2>
                        <h5>link de acesso ao site: <a target="_blank" href="http://127.0.0.1:8000/{{Str::lower(auth()->user()->company->companyhashtoken)}}">https://port.fortcodedev.com/{{Str::lower(auth()->user()->company->companyhashtoken)}}</a> </h5>
                    </div>

                    <div class="col-md-8 mt-2">
                      <div class="accordion" id="accordionExample">
                        <div class="accordion-item" style="box-shadow: none;">
                          <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#shooping" aria-expanded="true" aria-controls="shooping">
                              Como Adicionar itens na loja?
                            </button>
                          </h2>
                          <div id="shooping" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#marketing" aria-expanded="false" aria-controls="marketing">
                              Serviços de marketing
                            </button>
                          </h2>
                          <div id="marketing" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#premium" aria-expanded="false" aria-controls="premium">
                              Elementos premium
                            </button>
                          </h2>
                          <div id="premium" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                          </div>
                        </div>
  
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#anuncio" aria-expanded="false" aria-controls="anuncio">
                              Serviço de Anúncio
                            </button>
                          </h2>
                          <div id="anuncio" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                </div> 
            </div> 
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
@endsection
<link rel="stylesheet" href="{{asset("css/home.css")}}">