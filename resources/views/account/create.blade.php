@extends("layout.app")

@section("title", "Cadastrar - S")

@section("content")
<!---Barra de Navegação-------------------------------------------------------------------------------->
<nav class="bg-secondary">
    <ul class="pagination justify-content-end">
        <li class="page-item"><a class="btn btn-dark p-3 rounded-0" href="{{ route('account-index') }}">Entrar</a></li>
    </ul>
</nav>
<!--fomulário de cadastro------------------------------------------------------------------------------>
<div class="container">
    <div class="mx-auto" style="width: 400px; margin-top: 5%;">
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
            </svg>
        </div>
        <div class="form-control">
            <form action="{{ route('account-store') }}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    <span class="text-danger">@error("name"){{ $message }}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                    <span class="text-danger">@error("email"){{ $message }}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" name="password">
                    <span class="text-danger">@error("password"){{ $message }}@enderror</span>
                </div>
                <br>
                <div class="text-center">
                    <input type="submit" class="btn btn-dark" value="Cadastrar">
                </div>
            </form>
            <br>
        </div>
        <br>
        <!--Mensagens de failha ou sucesso--------------------------------------------------------------->
        @include('layout.app-results')
    </div>
</div>
@endsection
