<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{asset('css')}}/admin/admin.css">
    <link rel="stylesheet" href="{{asset('css')}}/admin/others.css">

     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="images/logo.png" alt="">
            </div>

            <span class="logo_name">DataCenter</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="/dash">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="{{route('maintenance.index')}}">
                    <i class="uil uil-folder-open"></i>
                    <span class="link-name">Report Maintain</span>
                </a></li>
                <li><a href="{{route('monitoring.index')}}">
                    <i class="uil uil-folder-open"></i>
                    <span class="link-name">Report Monitoring</span>
                </a></li>
                <li><a href="{{route('data.index')}}">
                    <i class="uil uil-user"></i>
                    <span class="link-name">Data Staff</span>
                </a></li>
                <li><a href="{{route('shiftInfo.index')}}">
                    <i class="uil uil-book-open"></i>
                    <span class="link-name">Shift</span>
                </a></li>
                <li><a href="{{route('status.index')}}">
                    <i class="uil uil-diary"></i>
                    <span class="link-name">Shift Staff</span>
                </a></li>
                <li><a href="{{route('info.index')}}">
                    <i class="uil uil-database"></i>
                    <span class="link-name">Product</span>
                </a></li>
                <li><a href="{{route('supervisor.index')}}">
                    <i class="uil uil-user-md"></i>
                    <span class="link-name">Supervisor</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                    <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                    @csrf
                    </form>
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <span>Welcome Admin</span>
        </div>

        @yield('content')
    </section>

    <script src="{{asset('javascript')}}/script.js"></script>
</body>
</html>