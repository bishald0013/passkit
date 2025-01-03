<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@simonwep/pickr@1.8.0/dist/themes/classic.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f5ff;
            font-family: system-ui, -apple-system, sans-serif;
            margin: 0;
            padding: 0;
        }
        .sub-active {
            color: #893894dc;
        }
        .sidebar {
            width: 280px;
            height: 100vh;
            background: white;
            padding: 20px;
            position: fixed;
            left: 0;
            top: 0;
            overflow-y: auto;
        }

        .main-content {
            margin-left: 280px;
            padding: 20px 30px;
        }

        .brand-logo {
            color: #7749F8;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link {
            color: #666;
            padding: 12px 16px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            text-decoration: none;
            margin-bottom: 2px;
        }

        .nav-link i {
            width: 20px;
            text-align: center;
            font-size: 16px;
            margin-right: 12px;
        }

        .nav-link:hover {
            background-color: #8da1fc1e;
            color: #0817695e;
        }

        .nav-link.active {
            background-color: #d4deff5b;
            color: #0c1d80a9;
        }

        .badge {
            background-color: #f0e7ff;
            color: #7749F8;
            padding: 4px 8px;
            border-radius: 12px;
            margin-left: auto;
        }

        .menu-item {
            position: relative;
        }

        .menu-item > .submenu {
            margin-left: 48px;  /* Increased margin to align with the icon */
            padding-top: 5px;
            padding-bottom: 5px;
            position: relative;
        }

        /* Main connector line */
        .menu-item > .submenu::before {
            content: '';
            position: absolute;
            left: -16px;  /* Adjusted position to align with the icon */
            top: 0;
            bottom: 8px;  /* Shortened the line slightly */
            width: 1.5px;  /* Thinner line */
            background: #e0e0e0;  /* Lighter color */
            border-radius: 2px;
        }

        /* Individual item connector lines */
        .menu-item > .submenu .nav-link {
            position: relative;
            padding-left: 24px;
            font-size: 14px;
            color: #666;
        }

        .menu-item > .submenu .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 16px;  /* Shortened horizontal line */
            height: 1.5px;  /* Match vertical line thickness */
            background: #e0e0e0;  /* Match vertical line color */
            transform: translateY(-50%);
        }

        /* Hover effects for submenu items */
        .menu-item > .submenu .nav-link:hover {
            background: none;
            color: #7749F8;
        }

        .menu-item > .submenu .nav-link:hover::before {
            background: #7749F8;  /* Change connector color on hover */
        }

        /* Parent menu item styles */
        .menu-item > .nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 16px;
        }

        /* Toggle icon styles */
        .menu-toggle {
            font-size: 12px;
            transition: transform 0.3s ease;
            opacity: 0.5;
            margin-left: 8px;
        }

        .menu-toggle.rotate {
            transform: rotate(180deg);
        }

        .submenu {
            display: none;
        }

        .submenu.show {
            display: block;
        }

        .submenu .nav-link {
            padding: 8px 0;
            font-size: 14px;
            color: #292727;
            margin-bottom: 0;
            border-radius: 0;
        }

        .submenu .nav-link:hover {
            background: none;
            color: #18191a9c;
        }

        .section-divider {
            color: #666;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 20px 0 10px 16px;
            font-weight: 500;
        }

        .trial-box {
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
            background: #f8f5ff;
            padding: 15px;
            border-radius: 12px;
        }

        .progress {
            background-color: #e2d6ff;
        }

        .progress-bar {
            background-color: #7749F8;
        }

        .btn-outline-primary {
            border-color: #7749F8;
            color: #7749F8;
        }

        .btn-outline-primary:hover {
            background-color: #7749F8;
            border-color: #7749F8;
            color: white;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-280px);
            }

            .sidebar.hidden {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .trial-box {
                position: static;
                margin-top: 20px;
            }
        }
    </style>
    @yield('additional_styles')
</head>
<body>
    <button class="btn btn-primary d-md-none" id="toggle-sidebar" style="position: fixed; top: 10px; left: 10px; z-index: 1000;">
        <i class="fas fa-bars"></i>
    </button>

    @include('layout.sidebar')

    <div class="main-content">
        @yield('content')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const menuToggles = document.querySelectorAll('[data-toggle="submenu"]');
        const sidebar = document.querySelector('.sidebar');
        const toggleSidebarBtn = document.getElementById('toggle-sidebar');

        // Handle submenu toggles
        menuToggles.forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('data-target');
                const targetSubmenu = document.getElementById(targetId);
                const chevron = this.querySelector('.menu-toggle');

                // Store the state in localStorage
                const isOpen = targetSubmenu.classList.contains('show');
                localStorage.setItem(`submenu_${targetId}`, !isOpen);

                // Close other submenus unless they should stay open (based on active state)
                document.querySelectorAll('.submenu').forEach(submenu => {
                    if (submenu.id !== targetId && submenu.classList.contains('show')) {
                        const shouldStayOpen = submenu.querySelector('.nav-link.active');
                        if (!shouldStayOpen) {
                            submenu.classList.remove('show');
                            submenu.previousElementSibling.querySelector('.menu-toggle').classList.remove('rotate');
                        }
                    }
                });

                targetSubmenu.classList.toggle('show');
                chevron.classList.toggle('rotate');
            });
        });

        // Restore submenu states from localStorage on page load
        document.querySelectorAll('.submenu').forEach(submenu => {
            const storedState = localStorage.getItem(`submenu_${submenu.id}`);
            const hasActiveChild = submenu.querySelector('.nav-link.active');
            
            if (storedState === 'true' || hasActiveChild) {
                submenu.classList.add('show');
                const chevron = submenu.previousElementSibling.querySelector('.menu-toggle');
                if (chevron) {
                    chevron.classList.add('rotate');
                }
            }
        });

        // Mobile sidebar toggle
        toggleSidebarBtn.addEventListener('click', function() {
            sidebar.classList.toggle('hidden');
        });
    });
    </script>
    @yield('additional_scripts')
</body>
</html>