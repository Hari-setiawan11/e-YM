<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            @can('read-dashboard')
            <li class="menu-header">Hariono</li>
            <li class="{{ request()->is('apps/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="blank.html">
                    <i class="fas fa-home"></i><span>Hariono</span>
                </a>
            </li>
            @endcan
            @can('read-users')
            <li>
                <a class="nav-link" href="blank.html">
                    <i class="far fa-square"></i> <span>Hariono</span>
                </a>
            </li>
            @endcan

            @canany(['read-roles', 'read-distribusi', 'read-program',])
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-th"></i><span>Hariono</span>
                </a>
                <ul class="dropdown-menu">
                    @can('read-program')
                        <li>
                            <a class="nav-link" href="bootstrap-alert.html">Hariono</a>
                        </li>
                    @endcan
                    @can('read-distribusi')
                        <li>
                            <a class="nav-link" href="bootstrap-badge.html">Hariono</a>
                        </li>
                    @endcan
                    @can('read-program')
                        <li>
                            <a class="nav-link" href="bootstrap-typography.html">Hariono</a>
                        </li>
                    @endcan
                </ul>
            </li>
            @endcanany
        </ul>
    </aside>
</div>
