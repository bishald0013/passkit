<div class="sidebar">
    <div class="brand-logo me-2">
        <i class="fas fa-wallet me-2"></i>
        Let's Wallet
    </div>

    <div class="nav flex-column">
        <a href="{{ route('dashboard') }}" 
            class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i>
            Dashboard
        </a>
        <a href="#" class="nav-link">
            <i class="fas fa-chart-bar"></i>
            Analytics
        </a>
        <a href="#" class="nav-link">
            <i class="fas fa-lightbulb"></i>
            Insights
            <span class="badge">2</span>
        </a>
        <a href="#" class="nav-link">
            <i class="fas fa-clock"></i>
            Updates
            <span class="badge">6</span>
        </a>

        <!-- Products Menu -->
        <div class="menu-item">
            <a href="#" class="nav-link" data-toggle="submenu" data-target="products-menu">
                <div>
                    <i class="fas fa-box"></i>
                    Products
                </div>
                <i class="fas fa-chevron-down menu-toggle"></i>
            </a>
            <div class="submenu" id="products-menu">
                <a href="#" class="nav-link">Fashion</a>
                <a href="#" class="nav-link">Home Decor</a>
                <a href="#" class="nav-link">Skincare</a>
                <a href="#" class="nav-link">Snacks</a>
            </div>
        </div>
        
        

        <!-- Pass Menu -->
        <div class="menu-item">
            <a href="#" 
            class="nav-link {{ request()->routeIs('passes.*') ? 'active' : '' }}"
            data-toggle="submenu" 
            data-target="pass-menu">
                <div>
                    <i class="fas fa-ticket"></i>
                    Pass
                </div>
                <i class="fas fa-chevron-down menu-toggle"></i>
            </a>
            <div class="submenu {{ request()->routeIs('passes.*') ? 'show' : '' }}" id="pass-menu">
                <a href="{{ route('passes.event') }}" 
                class="nav-link {{ request()->routeIs('passes.event') ? 'sub-active' : '' }}">Event Pass</a>
                <a href="#" class="nav-link">Generic Pass</a>
                <a href="#" class="nav-link">Travel Pass</a>
                <a href="#" class="nav-link">Digital Pass</a>
            </div>
        </div>

        <div class="section-divider">General</div>

        <a href="#" class="nav-link">
            <i class="fas fa-bell"></i>
            Notifications
        </a>
        <a href="#" class="nav-link">
            <i class="fas fa-gear"></i>
            Settings
        </a>
        <a href="#" class="nav-link">
            <i class="fas fa-circle-question"></i>
            Help
        </a>
    </div>

    <div class="trial-box">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <small class="text-muted d-block">20/30 Days</small>
                <div class="progress mt-1" style="height: 4px; width: 100px;">
                    <div class="progress-bar" style="width: 66%"></div>
                </div>
            </div>
            <button class="btn btn-sm btn-outline-primary">Free Trial</button>
        </div>
    </div>
</div>