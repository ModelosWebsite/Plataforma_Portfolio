<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Painel Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{(Route::current()->getName() == "admin.index") ? "bg-white" : ""}}">
        <a class="nav-link {{(Route::current()->getName() == "admin.index") ? "text-primary" : ""}}" href="{{route("admin.index")}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Premium -->
    <li class="nav-item {{(Route::current()->getName() == "loja.online") ? "bg-white" : ""}}">
        <a class="nav-link {{(Route::current()->getName() == "loja.online") ? "text-primary" : ""}}" href="{{route("loja.online")}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Elementos Premium</span>
        </a>
    </li>

    <!-- Nav Item - Premium -->
    <li class="nav-item {{(Route::current()->getName() == "plataform.portfolio.admin.delivery.status") ? "bg-white" : ""}}">
        <a class="nav-link {{(Route::current()->getName() == "plataform.portfolio.admin.delivery.status") ? "text-primary" : ""}}" href="{{route("plataform.portfolio.admin.delivery.status")}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Estado da Encomenda</span>
        </a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{(Route::current()->getName() == "plataform.portfolio.admin.delivery.list") ? "bg-white" : ""}}">
        <a class="nav-link {{(Route::current()->getName() == "plataform.portfolio.admin.delivery.list") ? "text-primary" : ""}}" href="{{route("plataform.portfolio.admin.delivery.list")}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Controle Encomendas</span>
        </a>
    </li>

    <!-- Nav Item - Premium -->
    <li class="nav-item">
        <a class="nav-link" href="https://kytutes.com/auth/login" target="_blank">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Portal PB</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Definições -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Definições</span>
        </a>
        
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{(Route::current()->getName() == "admin.view.hero") ? "text-primary" : ""}}" href="{{route("admin.view.hero")}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Inicial Hero</span>
                </a>

                <a class="collapse-item {{(Route::current()->getName() == "admin.about") ? "text-primary" : ""}}" href="{{route("admin.about")}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Sobre</span>
                </a>

                <a class="collapse-item {{(Route::current()->getName() == "admin.view.services") ? "text-primary" : ""}}" href="{{route("admin.view.services")}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Serviços</span>
                </a>

                <a class="collapse-item {{(Route::current()->getName() == "admin.footer") ? "text-primary" : ""}}" href="{{route("admin.footer")}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Footer</span>
                </a>

                <a class="collapse-item {{(Route::current()->getName() == "admin.infowhy") ? "text-primary" : ""}}" href="{{route("admin.infowhy")}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Projectos</span>
                </a>

                <a class="collapse-item {{(Route::current()->getName() == "admin.detail") ? "text-primary" : ""}}" href="{{route("admin.detail")}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Elementos Website</span>
                </a>

                <a class="collapse-item {{(Route::current()->getName() == "admin.hability.view") ? "text-primary" : ""}}" href="{{route("admin.hability.view")}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Habilidades</span>
                </a>

                <a class="collapse-item {{Route::current()->getName() == "anuncio.management.view.color" ? "text-primary" : ""}}" href="{{route("anuncio.management.view.color")}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Cores</span>
                </a>

                <a class="collapse-item {{Route::current()->getName() == "anuncio.management.view.fundo" ? "text-primary" : ""}}" href="{{route("anuncio.management.view.fundo")}}">
                    <i class="fa fa-fw fa-tachometer-alt"></i>
                    <span>Imagens de Fundo</span>
                </a>

                <a class="collapse-item {{Route::current()->getName() == "admin.panel.question" ? "text-primary" : ""}}" href="{{route("admin.panel.question")}}">
                    <i class="fa fa-fw fa-tachometer-alt"></i>
                    <span>Perguntas Frequentes</span>
                </a>

                <a class="collapse-item {{Route::current()->getName() == "admin.config.view" ? "text-primary" : ""}}" href="{{route("admin.config.view")}}">
                    <i class="fa fa-fw fa-tachometer-alt"></i>
                    <span>Configurações</span>
                </a>

                <a class="collapse-item" href="#" data-toggle="modal" data-target="#help">
                    <i class="fa fa-fw fa-tachometer-alt"></i>
                    <span>Ajuda</span>
                </a>

                <a class="collapse-item {{Route::current()->getName() == "admin.management.user.profile" ? "text-primary" : ""}}" href="{{route("admin.management.user.profile")}}">
                    <i class="fa fa-fw fa-tachometer-alt"></i>
                    <span>Minha Conta</span>
                </a>
            </div>
        </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route("anuncio.logout")}}">
            <i class="fa fa-fw fa-tachometer-alt"></i>
            <span>Terminar Sessão</span>
        </a>
    </li>

    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>