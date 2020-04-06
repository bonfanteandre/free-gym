<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <i class="fas fa-dumbbell"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Free Gym</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('muscles') ? 'active' : '' }}">
        <a class="nav-link" href="/muscles">
            <i class="fas fa-fw fa-walking"></i>
            <span>Músculos</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('exercises') ? 'active' : '' }}">
        <a class="nav-link" href="/exercises">
            <i class="fas fa-fw fa-dumbbell"></i>
            <span>Exerícios</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Planos</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-users"></i>
            <span>Clientes</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Fichas de treino</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>Instrutores</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-file-invoice-dollar"></i>
            <span>Mensalidades</span>
        </a>
    </li>


</ul>
