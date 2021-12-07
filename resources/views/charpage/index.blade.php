@extends("layout.app")

@section("title", "Personagens - S")

@include("layout.app-nav")

@section("content")
    @auth
    </div>
    <!--Pagina Personagens--------------------------------------------------------------------------------->
    <div class="container">
        <div class="mx-auto" style="margin-top: 5%;">
            <!--Mensagens de failha ou sucesso--------------------------------------------------------------->
            @include('layout.app-results')
            <div class="row">
                    <div class="col-sm-10">
                        <h1>Personagens</h1>
                    </div>
                    <div class="col-sm-2 justify-content-end">
                        <a href="{{ route('charpage-create') }}" class="btn btn-dark p3 rounded-0">Inserir Personagem</a>
                    </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Criado Por</th>
                        <th scope="col">Editado Por</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($personagens as $personagem)
                    <tr>
                        <td>{{ $personagem->id }}</td>
                        <td>{{ $personagem->nome }}</td>
                        <td>{{ $personagem->getUserCreateName() }}</td>
                        <td>{{ $personagem->getUserEditName() }}</td>
                        <td>
                            <a href="{{ route('charpage-show', ['id'=>$personagem->id]) }}" class="btn btn-secondary me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endauth
@endsection
