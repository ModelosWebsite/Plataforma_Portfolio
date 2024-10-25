<div wire:ignore>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-6">
                <div class="card mb-4">
                    <!-- Card Header -->
                    <div class="card-header bg-primary py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-white">Configurações de Conteúdo do site - Click em cada imagem para editar o seu site</h6>
                    </div>
                    
                    <!-- Card Body -->
                    <div class="card-body" style="height: 30rem;">
                        <div class="row">
                            
                            <main>
                                <input id="tab1" type="radio" name="tabs" checked>
                                <label for="tab1">Paleta de Cores</label>
                                    
                                <input id="tab2" type="radio" name="tabs">
                                <label for="tab2">Fotos de Fundo</label>
                                    
                                <input id="tab3" type="radio" name="tabs">
                                <label for="tab3">Perguntas Frequentes</label>
                                    
                                <input id="tab4" type="radio" name="tabs">
                                <label for="tab4">Ajustes</label>
                                    
                                <input id="tab5" type="radio" name="tabs">
                                <label for="tab5">Suporte</label>

                                <input id="tab6" type="radio" name="tabs">
                                <label for="tab6">Minha Conta</label>
                                    
                                <section id="content1">@livewire("definition.color")</section>
                                <section id="content2">@livewire("definition.background")</section>
                                <section id="content3">@livewire("definition.question")</section>
                                <section id="content4">@livewire("definition.adjust")</section>
                                <section id="content5">@livewire("definition.support")</section>
                                <section id="content6">@livewire("definition.my-account")</section>
                            </main>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="{{asset("css/definition.css")}}">
</div>