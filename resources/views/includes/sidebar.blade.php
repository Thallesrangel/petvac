<nav class="sidebar">
    <div class="perfil">
        <img class="img-fluid rounded-circle flaot-left" src="{{ asset('img/perfil.jpg') }}">
        <h6>{{ session('usuario.nome') }}</h6>
    </div>
    
    <ul class="list-unstyled">
        <li><a href="{{ route('animal') }}"><i class="bi bi-heart"></i> Animais</a></li>
        <li class="active">
            <a href="#registrosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="bi bi-tag"></i> Registros</a>
            <ul class="collapse list-unstyled sidebar-submenu" id="registrosSubmenu">
                <li>
                    <a href="{{ route('especie') }}">Espécies</a>
                </li>
                <li>
                    <a href="{{ route('raca') }}">Raças</a>
                </li>
            </ul>
        </li>
        <li><a href="{{ route('vacina') }}"><i class="bi bi-shield"></i> Vacinas</a></li>
        <li><a href="#"><i class="bi bi-droplet"></i> Vermifugações</a></li>
        <li><a href="#"><i class="bi bi-exclamation-triangle"></i> Pulgas e Carrapatos</a></li> 
        <li><a href="#"><i class="bi bi-patch-check"></i> Anti-cio</a></li>
        <li><a href="#"><i class="bi bi-scissors"></i> Higiene</a></li>
        <li><a href="#"><i class="bi bi-file-earmark-text"></i> Relatórios</a></li>
        <li><a href="{{ route('proprietario') }}"><i class="bi bi-people"></i> Proprietários</a></li>
        <li><a href="#"><i class="bi bi-heart"></i> Pesos</a></li>
        <li><a href="#"><i class="bi bi-heart"></i> Métricas</a></li>
        <li><a href="#"><i class="bi bi-shop"></i> Fornecedores</a></li>
        <li><a href="#"><i class="bi bi-chat-left"></i> Suporte</a></li>
    </ul>
</nav>
