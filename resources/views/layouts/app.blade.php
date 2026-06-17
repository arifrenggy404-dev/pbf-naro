<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Gereja - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #34495e;
            --accent-color: #3498db;
            --success-color: #27ae60;
            --danger-color: #e74c3c;
            --bg-light: #f4f7f6;
            --text-dark: #333;
            --sidebar-width: 260px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }

        body { background-color: var(--bg-light); color: var(--text-dark); display: flex; min-height: 100vh; }

        /* Sidebar */
        .sidebar { width: var(--sidebar-width); background: var(--primary-color); color: #fff; position: fixed; height: 100%; padding: 20px; transition: 0.3s; }
        .sidebar .brand { font-size: 1.5rem; font-weight: bold; margin-bottom: 30px; display: flex; align-items: center; gap: 10px; }
        .sidebar nav ul { list-style: none; }
        .sidebar nav ul li { margin-bottom: 10px; }
        .sidebar nav ul li a { color: #bdc3c7; text-decoration: none; display: flex; align-items: center; gap: 15px; padding: 12px; border-radius: 8px; transition: 0.3s; }
        .sidebar nav ul li a:hover, .sidebar nav ul li a.active { background: var(--secondary-color); color: #fff; }

        /* Main Content */
        .main-content { margin-left: var(--sidebar-width); flex: 1; padding: 30px; }
        header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .user-profile { display: flex; align-items: center; gap: 10px; font-weight: 500; }

        /* Cards */
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px; margin-bottom: 30px; }
        .stat-card { background: #fff; padding: 25px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); display: flex; align-items: center; gap: 20px; }
        .stat-card i { font-size: 2.5rem; color: var(--accent-color); }
        .stat-card .info h3 { font-size: 0.9rem; color: #7f8c8d; text-transform: uppercase; margin-bottom: 5px; }
        .stat-card .info p { font-size: 1.5rem; font-weight: bold; }

        /* Tables & Forms */
        .content-card { background: #fff; padding: 25px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .table-container { overflow-x: auto; margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th { padding: 15px; border-bottom: 2px solid #eee; color: #7f8c8d; font-weight: 600; }
        td { padding: 15px; border-bottom: 1px solid #eee; }
        
        .btn { padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 0.9rem; border: none; cursor: pointer; transition: 0.3s; display: inline-flex; align-items: center; gap: 5px; }
        .btn-primary { background: var(--accent-color); color: #fff; }
        .btn-success { background: var(--success-color); color: #fff; }
        .btn-danger { background: var(--danger-color); color: #fff; }

        @media (max-width: 768px) {
            .sidebar { width: 0; padding: 0; overflow: hidden; }
            .main-content { margin-left: 0; }
        }
    </style>
    @yield('css')
</head>
<body>
    <div class="sidebar">
        <div class="brand">
            <i class="fas fa-church"></i>
            <span>CMS Gereja</span>
        </div>
        <nav>
            <ul>
                <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="fas fa-home"></i> Dashboard</a></li>
                
                @if(Auth::user()->isAdmin())
                <li><a href="{{ route('jemaat.index') }}" class="{{ request()->routeIs('jemaat.*') ? 'active' : '' }}"><i class="fas fa-users"></i> Jemaat</a></li>
                <li><a href="{{ route('sakramen.index') }}" class="{{ request()->routeIs('sakramen.*') ? 'active' : '' }}"><i class="fas fa-cross"></i> Sakramen</a></li>
                <li><a href="{{ route('inventaris.index') }}" class="{{ request()->routeIs('inventaris.*') ? 'active' : '' }}"><i class="fas fa-boxes"></i> Inventaris</a></li>
                @endif

                @if(Auth::user()->isKoordinator())
                <li><a href="{{ route('jadwal.index') }}" class="{{ request()->routeIs('jadwal.*') ? 'active' : '' }}"><i class="fas fa-calendar-alt"></i> Jadwal Pelayanan</a></li>
                @endif

                @if(Auth::user()->isBendahara())
                <li><a href="{{ route('keuangan.index') }}" class="{{ request()->routeIs('keuangan.*') ? 'active' : '' }}"><i class="fas fa-wallet"></i> Keuangan</a></li>
                @endif

                <li style="margin-top: 20px; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 10px;">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: #bdc3c7; cursor: pointer; display: flex; align-items: center; gap: 15px; padding: 12px; width: 100%; text-align: left; font-size: 1rem; transition: 0.3s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#bdc3c7'">
                            <i class="fas fa-sign-out-alt"></i> Keluar
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>

    <div class="main-content">
        <header>
            <div class="page-info">
                <h2 style="font-size: 1.2rem; color: #7f8c8d;">Selamat Datang,</h2>
                <h1 style="font-size: 1.5rem;">@yield('page_title', 'Dashboard')</h1>
            </div>
            <div class="user-profile">
                <span>{{ Auth::user()->name ?? 'Admin Gereja' }}</span>
                <img src="https://ui-avatars.com/api/?name=Admin+Gereja&background=3498db&color=fff" alt="Profile" style="width: 40px; border-radius: 50%;">
            </div>
        </header>

        @yield('content')
    </div>

    @yield('js')
</body>
</html>
