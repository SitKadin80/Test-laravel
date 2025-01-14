<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html">
        <img src="{{ asset('image/logo2.jpg') }}" style="height: 40px;">
        <span class="navbar-brand-text">school system</span>
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item" href="#!">
                        <i class="fas fa-sign-in-alt" style="color: #007bff;"></i> Login
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#!">
                        <i class="fas fa-sign-out-alt" style="color: #dc3545;"></i> Logout
                    </a>
                </li>


            </ul>
        </li>
    </ul>
</nav>
<style>
    .navbar-brand-text {
        color: yellow;
    }
</style>
