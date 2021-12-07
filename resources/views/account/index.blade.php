@extends("layout.app")

@section("title", "Entrar - S")

@section("content")
<!---Barra de Navegação-------------------------------------------------------------------------------->
<nav class="bg-secondary">
    <ul class="pagination justify-content-end">
        <li class="page-item"><a class="btn btn-dark p-3 rounded-0" href="{{ route('account-create') }}">Cadastrar</a></li>
    </ul>
</nav>
<!--fomulário de login--------------------------------------------------------------------------------->
<div class="container">
    <div class="mx-auto" style="width: 400px; margin-top: 5%;">
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16" style="text-align: center;">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            </svg>
        </div>
        <div class="form-control">
            <form action="{{ route('account-login') }}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label" >Senha</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <br>
                <div class="text-center">
                    <input type="submit" class="btn btn-dark" value="Entrar">
                </div>
            </form>
        </div>
        <br>
        <!--Mensagens de failha ou sucesso--------------------------------------------------------------->
        <div class="results">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @include('layout.app-results')
        </div>
    </div>
</div>
@endsection
