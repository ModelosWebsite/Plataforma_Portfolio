<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Politicas da Entidade {{$name->companyname}}  | NIF: {{$name->companynif}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @if (isset($termos))
            <p style="text-align: justify">
                {{$termos->privacity}}
            </p>
          @else
            <p style="text-align: justify">{{ isset($companies->termsPBs->privacity) ? $companies->termsPBs->privacity : "" }}</p>
          @endif
        </div>
      </div>
    </div>
  </div>
  