<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
    <div class="main-navbar">
        <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                    <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 40px;"
                        src="assets/img/arkinglogo.png" alt="Arking">
                    <span class="d-none d-md-inline ml-1">Arking Infotech</span>
                </div>
            </a>
            <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
            </a>
        </nav>
    </div>
    <div class="nav-wrapper">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.ambulance') }}">
                    <i class="material-icons">airport_shuttle</i>
                    <span>Manage Ambulance</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.request') }}">
                    <i class="material-icons">today</i>
                    <span>Booking Request</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.search') }}">
                    <i class="material-icons">person_search</i>
                    <span>User Search</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.users') }}">
                    <i class="material-icons">people</i>
                    <span>Manage Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('admin-logout')}}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="material-icons">logout</i>
                    <span>Logout</span>
                    <form id="logout-form" action="{{ route('admin-logout') }}" method="POST" class="">
                        @csrf
                    </form>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link " href="">
                    <i class="material-icons">person</i>
                    <span>Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="errors.html">
                    <i class="material-icons">error</i>
                    <span>Errors</span>
                </a>
            </li> --}}
        </ul>
    </div>
</aside>