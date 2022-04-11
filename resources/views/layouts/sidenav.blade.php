<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{route('dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a href="#" class="nav-link">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    User Management
                </a>
                <a href="#" class="nav-link">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Employee Mgmt.
                </a>
                <a href="#" class="nav-link">
                    <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                    Company Management
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as: {{ Auth::user()->name }}</div>
            Start Bootstrap
        </div>
    </nav>
</div>