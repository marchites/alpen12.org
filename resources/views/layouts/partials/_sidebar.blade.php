<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Alpen12<span>Dash.</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <!-- <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="dashboard.html" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li> -->
            <li class="nav-item nav-category">alumni</li>
            <li class="nav-item">
                <a href="{{ route('admin.alumni.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="database"></i>
                    <span class="link-title">Database</span>
                </a>
            </li>
            <li class="nav-item nav-category">voting</li>
            <li class="nav-item">
                <a href="{{ route('admin.positions.index') }}"
                    class="nav-link {{ request()->routeIs('admin.positions.*') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="award"></i>
                    <span class="link-title">Position</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.candidates.index') }}"
                    class="nav-link {{ request()->routeIs('admin.candidates.*') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Candidates</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.tokens.index') }}"
                    class="nav-link {{ request()->routeIs('admin.tokens.*') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="key"></i>
                    <span class="link-title">Tokens</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.settings.index') }}"
                    class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="settings"></i>
                    <span class="link-title">Settings</span>
                </a>
            </li>
            <!-- <li class="nav-item nav-category">Docs</li>
            <li class="nav-item">
                <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Documentation</span>
                </a>
            </li> -->
        </ul>
    </div>
</nav>
<nav class="settings-sidebar">
    <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
        </a>
        <h6 class="text-muted mb-2">Sidebar:</h6>
        <div class="mb-3 pb-3 border-bottom">
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight"
                    value="sidebar-light" checked>
                <label class="form-check-label" for="sidebarLight">
                    Light
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark"
                    value="sidebar-dark">
                <label class="form-check-label" for="sidebarDark">
                    Dark
                </label>
            </div>
        </div>
        <div class="theme-wrapper">
            <h6 class="text-muted mb-2">Light Theme:</h6>
            <a class="theme-item active" href="demo1/dashboard.html">
                <img src="assets/images/screenshots/light.jpg" alt="light theme">
            </a>
            <h6 class="text-muted mb-2">Dark Theme:</h6>
            <a class="theme-item" href="demo2/dashboard.html">
                <img src="assets/images/screenshots/dark.jpg" alt="light theme">
            </a>
        </div>
    </div>
</nav>