@extends("layouts.App")
@section("title", "Site indisponivel")
@section("content")
    <div class="d-flex justify-content-center" style="margin-top: 15rem;">
        <div class=" text-center text-uppercase">
            <h1 style="font-size: 5rem;">Site Indisponivel</h1>
            <p style="font-size: 2rem;">Click no botão abaixo para a fazer login</p>
            <a href="{{route("anuncio.login.view")}}" class="btn btn-primary">Entrar</a>
        </div>
    </div>
@endsection