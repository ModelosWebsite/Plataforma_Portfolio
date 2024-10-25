<div class="d-flex justify-content-evenly">
    <div class="col-md-4 col-4 col-xl-4">
        <div class="form-group mb-4">
            <h4>Habilitar site</h4>
            <div>
                <div class="item">
                    <div class="toggle-pill-color">
                        <input type="checkbox" id="siteStatus" wire:model="statusSite" wire:change="toggleSiteStatus">
                        <label for="siteStatus"></label>Desativar | Ativar 
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h4>Termos PB</h4>
            <div>
                <div class="item">
                    <div class="toggle-pill-color">
                        <input type="checkbox" id="termStatus" wire:model="statusTermo" wire:change="toggleTermStatus">
                        <label for="termStatus"></label> Não Aceito | Aceito
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8 col-8 col-xl-8">
        <div class="form-group">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h6 class="mb-0" style="cursor: pointer;" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            1) Funcionamento do Mecanismo de Aceitação de Termos PB.
                        </h6>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>Quando um usuário acessa o website pela primeira vez ou após uma atualização significativa nos termos e condições, uma janela pop-up, banner ou uma página intermediária é apresentada. Esta interface contém o texto completo dos Termos de Uso e da Política de Privacidade, que deve ser lido e compreendido pelo usuário.</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h6 class="mb-0" style="cursor: pointer;" data-toggle="collapse" data-target="#politica" aria-expanded="false" aria-controls="collapseTwo">
                            2) Opção de Aceitação ou Recusa.
                        </h6>
                    </div>
                    <div id="politica" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>Dentro dessa interface, o usuário encontrará opções claras para aceitar ou recusar os termos. Normalmente, isso é feito por meio de botões ou checkboxes com legendas como "Aceito os Termos e Condições" e "Não Aceito".</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h6 class="mb-0" style="cursor: pointer;" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            3) Bloqueio de Acesso sem Aceitação.
                        </h6>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>Se o usuário escolhe não aceitar os termos e condições, o mecanismo impede que ele prossiga para acessar o conteúdo ou serviços do website. Isso é realizado bloqueando a navegação além da página de termos e condições.</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h6 class="mb-0" style="cursor: pointer;" data-toggle="collapse" data-target="#quetion1" aria-expanded="false" aria-controls="collapseThree">
                            4) Ativação do Website com Aceitação.
                        </h6>
                    </div>
                    <div id="quetion1" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>Se o usuário aceita os termos, o sistema registra essa aceitação. Após essa confirmação, o usuário é redirecionado automaticamente para a página inicial.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
