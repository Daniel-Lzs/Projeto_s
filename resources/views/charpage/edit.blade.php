@extends("layout.app")

@section("title", "Editar Personagem - S")

@include("layout.app-nav")

@section("content")
    @auth
    <!--Formulário Personagens------------------------------------------------------------------------------>
        <div class="container">
            <div class="mx-auto" style="width: 700px; margin-top: 5%;">
                <form action="{{ route('charpage-update', ['id'=>$personagem->id]) }}" method="POST">
                @csrf
                @method("PUT")
                    <div class="form-control">
                        <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                            <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                        </svg><br><p>>Adicionar uma imagem!<</p><br><br><!--Infelismente não consegui implementar, vou ficar devendo-->
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nome" class="form-label">Nome do Personagem (obrigatório)</label>
                            <input type="text" class="form-control" name="nome" value="{{ $personagem->nome }}">
                            <span class="text-danger">@error("nome"){{ $message }}@enderror</span>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="idade" class="form-label">Idade (opcional)</label>
                            <input type="number" class="form-control" name="idade" value="{{ $personagem->idade }}">
                            <span class="text-danger">@error("idade"){{ $message }}@enderror</span>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="historia" class="form-label">Historia (obrigatório)</label>
                            <textarea class ="form-control" name="historia" cols="10" rows="6"style="resize: none">{{ $personagem->historia }}</textarea>
                            <span class="text-danger">@error("historia"){{ $message }}@enderror</span>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="habilidades" class="form-label">Habilidades (obrigatório)</label>
                            <textarea class ="form-control" name="habilidades" cols="10" rows="6"style="resize: none">{{ $personagem->habilidades }}</textarea>
                            <span class="text-danger">@error("habilidades"){{ $message }}@enderror</span>
                        </div>
                        <br>
                        <div class="text-center">
                            <input type="submit" class="btn btn-dark" value="Editar Personagem">
                        </div>
                    </div>
                </form>
                <!--Mensagens de failha ou sucesso--------------------------------------------------------------->
                <br>
                @include('layout.app-results')
            </div>
        </div>
    @endauth
@endsection
