<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <!-- <div class="sb-sidenav-menu-heading">Addons</div> -->
                <a href="{{ URL('student') }}" class="nav-link">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                    Student
                </a>
                
                <a class="nav-link" href="{{ URL('teacher') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    Teacher
                </a>
                <a class="nav-link" href="{{ URL('room') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-school"></i></div>
                    Room
                </a>
                {{-- <a class="nav-link" href="{{ URL('parent') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Guardian
                </a> --}}
               
            </div>
        </div>

    </nav>
</div>