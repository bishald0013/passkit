<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background-color: #f8f5ff;
            font-family: system-ui, -apple-system, sans-serif;
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

        .nav-link {
            color: #666;
            padding: 12px 16px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 2px;
            text-decoration: none;
        }

        .nav-link:hover {
            background-color: #f0e7ff;
            color: #7749F8;
        }

        .nav-link.active {
            background-color: #f0e7ff;
            color: #7749F8;
        }

        .nav-link i {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .submenu {
            margin-left: 30px;
            display: none;
        }

        .submenu.show {
            display: block;
        }

        .submenu .nav-link {
            padding: 8px 16px;
            font-size: 14px;
        }

        .badge {
            background-color: #f0e7ff;
            color: #7749F8;
            padding: 4px 8px;
            border-radius: 12px;
            margin-left: auto;
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

        .menu-item {
            position: relative;
        }

        .menu-toggle {
            margin-left: auto;
            font-size: 12px;
            transition: transform 0.3s;
        }

        .menu-toggle.rotate {
            transform: rotate(180deg);
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
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="brand-logo">
            <i class="far fa-chart-line"></i>
            Sensei
        </div>

        <div class="nav flex-column">
            <a href="#" class="nav-link active">
                <i class="far fa-house"></i>
                Dashboard
            </a>
            <a href="#" class="nav-link">
                <i class="far fa-chart-bar"></i>
                Analytics
            </a>

            <!-- Products Menu -->
            <div class="menu-item">
                <a href="#" class="nav-link" data-toggle="submenu" data-target="products-menu">
                    <i class="far fa-box"></i>
                    Products
                    <i class="fas fa-chevron-down menu-toggle"></i>
                </a>
                <div class="submenu" id="products-menu">
                    <a href="#" class="nav-link">
                        <i class="far fa-shirt"></i>
                        Fashion
                    </a>
                    <a href="#" class="nav-link">
                        <i class="far fa-home"></i>
                        Home Decor
                    </a>
                    <a href="#" class="nav-link">
                        <i class="far fa-heart"></i>
                        Skincare
                    </a>
                    <a href="#" class="nav-link">
                        <i class="far fa-cookie"></i>
                        Snacks
                    </a>
                </div>
            </div>

            <!-- Pass Menu -->
            <div class="menu-item">
                <a href="#" class="nav-link" data-toggle="submenu" data-target="pass-menu">
                    <i class="far fa-ticket"></i>
                    Pass
                    <i class="fas fa-chevron-down menu-toggle"></i>
                </a>
                <div class="submenu" id="pass-menu">
                    <a href="#" class="nav-link">
                        <i class="far fa-calendar"></i>
                        Event Pass
                    </a>
                    <a href="#" class="nav-link">
                        <i class="far fa-ticket-simple"></i>
                        Generic Pass
                    </a>
                    <a href="#" class="nav-link">
                        <i class="far fa-plane"></i>
                        Travel Pass
                    </a>
                    <a href="#" class="nav-link">
                        <i class="far fa-qrcode"></i>
                        Digital Pass
                    </a>
                </div>
            </div>
            <a href="#" class="nav-link">
                <i class="far fa-bell"></i>
                Notifications
            </a>
            <a href="#" class="nav-link">
                <i class="far fa-gear"></i>
                Settings
            </a>
            <a href="#" class="nav-link">
                <i class="far fa-circle-question"></i>
                Help
            </a>
        </div>

        <div class="trial-box">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <small class="text-muted d-block">20/30 Days</small>
                    <div class="progress mt-1" style="height: 4px; width: 100px;">
                        <div class="progress-bar" style="width: 66%; background-color: #7749F8"></div>
                    </div>
                </div>
                <button class="btn btn-sm btn-outline-primary">Free Trial</button>
            </div>
        </div>
    </div>

    <div class="main-content">
        <!-- Your main content here -->
    </div>

    <script>
        // Add click event listeners to all menu toggles
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggles = document.querySelectorAll('[data-toggle="submenu"]');
            
            menuToggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Get target submenu
                    const targetId = this.getAttribute('data-target');
                    const targetSubmenu = document.getElementById(targetId);
                    
                    // Get chevron icon
                    const chevron = this.querySelector('.menu-toggle');
                    
                    // Toggle current submenu
                    if (targetSubmenu.classList.contains('show')) {
                        targetSubmenu.classList.remove('show');
                        chevron.classList.remove('rotate');
                    } else {
                        targetSubmenu.classList.add('show');
                        chevron.classList.add('rotate');
                    }
                });
            });
        });
    </script>
</body>
</html>