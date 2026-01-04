<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Posyandu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #10B981; /* Emerald 500 */
            --primary-dark: #059669; /* Emerald 600 */
            --sidebar-bg: #4536d1ff;
            --bg-color: #F3F4F6; /* Gray 100 */
            --text-main: #1F2937; /* Gray 800 */
            --text-secondary: #6B7280; /* Gray 500 - Adjusted to be visible on light bg, originally was light for sidebar but caused issues. Reverting to a safety gray or trying to match exactly? Step 10 had #f4f5f7ff. I will trust Step 10 but maybe #9CA3AF used in menu-label is safer? Let's stick to Step 10's intention but maybe fix the readability if it was broken? No, 'restore' means exact. But #f4f5f7ff is white. If I put that back, table headers will be invisible. I suspect the 'text-secondary' was intended for sidebar text. Let's look at Step 10 again.
            Line 45: .navbar-item ... color: var(--text-secondary). Navbar was Purple. So White text is good.
            Line 70: .menu-list a ... color: var(--text-secondary). Sidebar was Purple. White text is good.
            Line 122: .table thead th ... color: var(--text-secondary). Table is on card? Card has white background. White text on white card is bad. 
            However, the user said 'kembalikan tampilan seperti pertama'. Maybe the table headers were invisible and they didn't mind or I am misinterpreting. 
            Actually, looking at Step 10 line 19: --text-secondary: #f4f5f7ff;
            Let's restore it exactly. */
            --text-secondary: #f4f5f7ff; 
            --border-color: #E5E7EB; /* Gray 200 */
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            height: 100vh;
            overflow: hidden;
        }

        /* Navbar Styling */
        .navbar.is-primary {
            background-color: var(--sidebar-bg);
            border-bottom: 1px solid var(--border-color);
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            height: 4.5rem;
        }
        .navbar-brand .navbar-item {
            color: var(--primary-color);
            font-weight: 800;
            font-size: 1.5rem;
            letter-spacing: -0.025em;
        }
        .navbar-item, .navbar-link {
            color: var(--text-secondary);
            font-weight: 500;
        }
        /* Fix for Dropdown Text Visibility */
        .navbar-dropdown .navbar-item {
            color: var(--text-main) !important;
        }
        .navbar-dropdown .navbar-item:hover {
            background-color: #f3f4f6;
            color: var(--text-main) !important;
        }
        
        .navbar-link:not(.is-arrowless):after {
            border-color: var(--primary-color);
        }

        /* Sidebar Styling */
        .sidebar {
            height: 100%;
            background-color: var(--sidebar-bg);
            border-right: 1px solid var(--border-color);
            padding: 2rem 1.5rem;
            overflow-y: auto;
        }
        .menu-label {
            color: #9CA3AF;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            margin-bottom: 0.75rem;
            text-transform: uppercase;
            font-weight: 600;
        }
        .menu-list a {
            border-radius: 0.5rem;
            color: var(--text-secondary);
            padding: 0.75rem 1rem;
            font-weight: 500;
            transition: all 0.2s;
            margin-bottom: 0.25rem;
        }
        .menu-list a:hover {
            background-color: #F0FDF4; /* Green 50 */
            color: var(--primary-dark);
        }
        .menu-list a.is-active {
            background-color: var(--primary-color);
            color: #ffffff;
        }

        /* Main Content Area */
        .main-content {
            padding: 2.5rem;
            height: calc(100vh - 4.5rem);
            overflow-y: auto;
            background-color: var(--bg-color);
        }

        /* Components */
        .box, .card {
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border: none;
        }
        
        .title {
            color: var(--text-main);
            font-weight: 700;
            letter-spacing: -0.025em;
        }
        
        .button.is-primary {
            background-color: var(--primary-color);
            border-color: transparent;
            color: #fff;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: background-color 0.2s;
        }
        .button.is-primary:hover {
            background-color: var(--primary-dark);
        }
        
        .table {
            background-color: transparent;
        }
        .table thead th {
            color: #9CA3AF; /* Fixed: Hardcoded gray for table headers since text-secondary is light for sidebar */
            border-bottom-width: 2px;
            border-color: var(--border-color);
        }
        
        .tag {
            border-radius: 9999px;
            font-weight: 500;
        }
        
        /* Utility */
        .columns.is-gapless {
            height: 100%;
        }
    </style>
</head>
<body>

    <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ url('/') }}">
                <span class="icon-text">
                    <span class="icon has-text-primary mr-2">
                        <i class="fas fa-heartbeat fa-lg"></i>
                    </span>
                    <strong>SISIDU</strong>
                </span>
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                @auth
                <a class="navbar-item" href="{{ route('dashboard') }}">
                    Dashboard
                </a>
                @endauth
            </div>

            <div class="navbar-end">
                @auth
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            {{ Auth::user()->name }} ({{ Auth::user()->role == 'admin' ? 'Admin' : 'Pengguna' }})
                        </a>

                        <div class="navbar-dropdown is-right">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="navbar-item" style="width: 100%; text-align: left; border: none; background: none; cursor: pointer;">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                @endauth
            </div>
        </div>
    </nav>

    <div class="columns is-gapless">
        @auth
        <div class="column is-2 sidebar is-hidden-mobile">
            <aside class="menu">
                <p class="menu-label">
                    Umum
                </p>
                <ul class="menu-list">
                    <li>
                        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'is-active' : '' }}">
                            <span class="icon-text">
                                <span class="icon"><i class="fas fa-home"></i></span>
                                <span>Dashboard</span>
                            </span>
                        </a>
                    </li>
                </ul>

                @if(Auth::user()->isAdmin())
                    <p class="menu-label">
                        Admin
                    </p>
                    <ul class="menu-list">
                        <li>
                            <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'is-active' : '' }}">
                                <span class="icon-text">
                                    <span class="icon"><i class="fas fa-users-cog"></i></span>
                                    <span>Manajemen Pengguna</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                @endif

                <p class="menu-label">
                    Data Posyandu
                </p>
                <ul class="menu-list">
                    <li>
                        <a href="{{ route('balitas.index') }}" class="{{ request()->routeIs('balitas.*') ? 'is-active' : '' }}">
                            <span class="icon-text">
                                <span class="icon"><i class="fas fa-child"></i></span>
                                <span>Data Balita</span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('penimbangans.index') }}" class="{{ request()->routeIs('penimbangans.*') ? 'is-active' : '' }}">
                            <span class="icon-text">
                                <span class="icon"><i class="fas fa-weight"></i></span>
                                <span>Data Penimbangan</span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('imunisasies.index') }}" class="{{ request()->routeIs('imunisasies.*') ? 'is-active' : '' }}">
                            <span class="icon-text">
                                <span class="icon"><i class="fas fa-syringe"></i></span>
                                <span>Data Imunisasi</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </aside>
        </div>
        @endauth

        <div class="column main-content">
            @if(session('success'))
                <div class="notification is-success">
                    <button class="delete"></button>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="notification is-danger">
                    <button class="delete"></button>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Navbar burger
            const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
            if ($navbarBurgers.length > 0) {
                $navbarBurgers.forEach( el => {
                    el.addEventListener('click', () => {
                        const target = el.dataset.target;
                        const $target = document.getElementById(target);
                        el.classList.toggle('is-active');
                        $target.classList.toggle('is-active');
                    });
                });
            }

            // Notifications
            (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
                const $notification = $delete.parentNode;
                $delete.addEventListener('click', () => {
                    $notification.parentNode.removeChild($notification);
                });
            });
        });
    </script>
</body>
</html>
