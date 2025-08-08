<div class="navbar-content">
    <ul class="pc-navbar">
        @guest
        <li class="pc-item">
            <a href="/" class="pc-link">
                <span class="pc-micon"><i class="ti ti-home"></i></span>
                <span class="pc-mtext">Selamat Datang</span>
            </a>
        </li>
        <li class="pc-item pc-caption">
            <label>Menu</label>
        </li>
        <li class="pc-item">
            <a href="{{ route('login') }}" class="pc-link">
                <span class="pc-micon"><i class="ti ti-check"></i></span>
                <span class="pc-mtext">Login</span>
            </a>
        </li>
        @endguest @auth
        <li class="pc-item">
            <a href="{{ route('home') }}" class="pc-link">
                <span class="pc-micon"><i class="ti ti-home"></i></span>
                <span class="pc-mtext">Beranda</span>
            </a>
        </li>
        <li class="pc-item pc-caption">
            <label>Menu</label>
        </li>
        <li class="pc-item">
            <a href="{{ route('profil') }}" class="pc-link">
                <span class="pc-micon"><i class="ti ti-check"></i></span>
                <span class="pc-mtext">Profil</span>
            </a>
        </li>
        <li class="pc-item">
            <a href="{{ route('user.index') }}" class="pc-link">
                <span class="pc-micon"><i class="ti ti-check"></i></span>
                <span class="pc-mtext">User</span>
            </a>
        </li>
        @role('admin')
        <li class="pc-item">
            <a href="{{ route('role.index') }}" class="pc-link">
                <span class="pc-micon"><i class="ti ti-check"></i></span>
                <span class="pc-mtext">Role</span>
            </a>
        </li>
        @endrole
        <li class="pc-item">
            <a href="{{ route('example.index') }}" class="pc-link">
                <span class="pc-micon"><i class="ti ti-check"></i></span>
                <span class="pc-mtext">Example</span>
            </a>
        </li>
        <li class="pc-item">
            <a href="{{ route('preferensi.index') }}" class="pc-link">
                <span class="pc-micon"><i class="ti ti-check"></i></span>
                <span class="pc-mtext">Preferensi</span>
            </a>
        </li>
        @endauth
    </ul>
</div>
