<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    
    <a class="navbar-brand ps-3" href="{{route('dashboard')}}" style="font-weight: bold; font-size: 24px;">LELE INVENTORY</a>

    
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars text-white" style="font-size: 20px;"></i>
    </button><div class="m-2"></div>
    <?php
        $picture = auth()->user()->picture;
    ?>
    <img src="{{ asset('storage\\'. $picture) }} " class="rounded-circle" height="26" alt="Avatar" loading="lazy" />
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
       
    </form>
    <!-- Navbar-->
    
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        
        {{-- <img src="{{ asset('storage/' . $user->picture) }}" width="100" height="100" alt="User Image"> --}}
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw text-white" style="font-weight: bold; font-size: 21px;"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="{{route('user.logout')}}">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>