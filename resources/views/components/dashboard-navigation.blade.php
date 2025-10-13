<!-- =============== Navigation ================ -->
<div class="dashboard-navigation">
    <ul class="dashboard-navigation-list">
        <li class="dashboard-nav-logo">
            <a href="#" class="dashboard-nav-link">
                <span class="dashboard-nav-icon">
                    <img src="{{ asset('images/logo2.png') }}" alt="Logo" class="w-12 h-12 object-contain">
                </span>
                <span class="dashboard-nav-title">Masjid Loves Palestine</span>
            </a>
        </li>

        <li class="dashboard-nav-item {{ request()->routeIs('dashboard') ? 'dashboard-active' : '' }}" id="dashboardNav">
            <div class="dashboard-hover-effect"></div>
            <a href="{{ route('dashboard') }}" class="dashboard-nav-link">
                <span class="dashboard-nav-icon">
                    <i class="fas fa-home dashboard-icon"></i>
                </span>
                <span class="dashboard-nav-title">Beranda</span>
            </a>
        </li>
        
        <li class="dashboard-nav-item {{ request()->routeIs('unggahan') ? 'dashboard-active' : '' }}" id="postNav">
            <div class="dashboard-hover-effect"></div>
            <a href="{{ route('unggahan') }}" class="dashboard-nav-link">
                <span class="dashboard-nav-icon">
                    <i class="fas fa-newspaper dashboard-icon"></i>
                </span>
                <span class="dashboard-nav-title">Unggahan Anda</span>
            </a>
        </li>
        
        <li class="dashboard-nav-item {{ request()->routeIs('redeem') ? 'dashboard-active' : '' }}" id="redeemNav">
            <div class="dashboard-hover-effect"></div>
            <a href="{{ route('redeem') }}" class="dashboard-nav-link">
                <span class="dashboard-nav-icon">
                    <i class="fas fa-gift dashboard-icon"></i>
                </span>
                <span class="dashboard-nav-title">Redeem</span>
            </a>
        </li>
        
        <li class="dashboard-nav-item {{ request()->routeIs('profile.edit') ? 'dashboard-active' : '' }}" id="accountNav">
            <div class="dashboard-hover-effect"></div>
            <a href="{{ route('profile-edit') }}" class="dashboard-nav-link">
                <span class="dashboard-nav-icon">
                    <i class="fas fa-user dashboard-icon"></i>
                </span>
                <span class="dashboard-nav-title">Akun Anda</span>
            </a>
        </li>

        <!-- Logout Button - tambahkan ID -->
        <li class="dashboard-nav-item dashboard-nav-logout" id="dashboardNavLogout">
            <div class="dashboard-hover-effect"></div>
            <form method="POST" action="{{ route('logout') }}" class="dashboard-logout-form">
                @csrf
                <button type="submit" class="dashboard-nav-link dashboard-logout-button">
                    <span class="dashboard-nav-icon">
                        <i class="fas fa-sign-out-alt dashboard-icon"></i>
                    </span>
                    <span class="dashboard-nav-title">Logout</span>
                </button>
            </form>
        </li>
    </ul>
</div>