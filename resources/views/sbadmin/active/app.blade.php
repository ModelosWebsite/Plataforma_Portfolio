<div class="col-md-12 text-white text-center py-3 {{(auth()->user()->company->status == "active") ? "bg-success" : "bg-danger"}}" style="height: 60px; margin-top: -1.5rem;">
    <a href="{{route("denition.general")}}#content3" class="text-white">
        @if (auth()->user()->company->status == "active")
            <h5>O seu website está activo, para desabilitar click aqui</h5>
        @else
            <h5>O seu website está inativo, para habilitar click aqui </h5>
        @endif
    </a>
</div>