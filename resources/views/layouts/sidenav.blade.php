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
                <a href="{{route('employee.index')}}" class="nav-link">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Employee Mgmt.
                </a>
                <a href="{{route('company.index')}}" class="nav-link">
                    <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                    Company Management
                </a>
                <a href="{{route('category.index')}}" class="nav-link">
                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                    Category Management
                </a>
                <a href="{{route('product.index')}}" class="nav-link">
                    <div class="sb-nav-link-icon"><i class="fab fa-product-hunt"></i></div>
                    Product Management
                </a>
                <a href="{{route('student.index')}}" class="nav-link">
                    <div class="sb-nav-link-icon"><i class="fab fa-users"></i></div>
                    Student Management
                </a>
                <a href="{{route('faculty.index')}}" class="nav-link">
                    <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                    Faculty Management
                </a>
                <a href="{{route('course.index')}}" class="nav-link">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Course Management
                </a>
                {{-- <div class="sb-sidenav-menu-heading">e-Commerce</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="layout-static.html">Static Navigation</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                    </nav>
                </div> --}}
            </div>
        </div>
        <div class="sb-sidenav-footer">
            @auth
            <div class="small">Logged in as: {{ Auth::user()->name }}</div>
            @endauth
            Start Bootstrap
        </div>
    </nav>
</div>