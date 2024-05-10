<!-- Modal -->
<div class="modal fade" id="conditions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Termos e Condições da Entidade {{$name->companyname}}<br>NIF: {{$name->companynif}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="text-dark text-justify fs-6">{{isset($termos->condition) ? $termos->condition : ""}}</p>
        </div>
      </div>
    </div>
  </div>
  