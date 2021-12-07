<!--Barra de Navegação----------------------------------------------------------------------->
<nav class="bg-secondary">
    <ul class="pagination justify-content-end">
        <ul class="pagination">
            <a class="navbar-brand p-3 rounded-0" href="{{ route('charpage-index') }}" style="color:black;">Home</a>
        </ul>
        <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle p-3 rounded-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                <li><a class="dropdown-item" href="{{ route('charpage-show-c', ['id'=>Auth::user()->id]) }}">Personagens Inseridos</a></li>
                <li><a class="dropdown-item" href="{{ route('charpage-show-e', ['id'=>Auth::user()->id]) }}">Personagens Editados</a></li>
                <li><a class="dropdown-item" href="{{ route('account-edit', [Auth::user()->id]) }}">Editar Credenciais</a></li>
                <li><a class="dropdown-item" href="{{ route('account-delete') }}">Deletar Conta</a></li>
                <li><a class="dropdown-item" href="{{ route('account-logout') }}">Sair</a></li>
            </ul>
        </div>
    </ul>
</nav>
