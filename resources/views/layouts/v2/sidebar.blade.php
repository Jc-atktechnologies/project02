<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      Noble<span>UI</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">

      <li class="nav-item nav-category">Main</li>
      <li class="nav-item">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="home"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="target"></i>
          <span class="link-title">Performance</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="dollar-sign"></i>
          <span class="link-title">Finance</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="calendar"></i>
          <span class="link-title">Calendar</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ url('claims') }}" class="nav-link">
          <i class="link-icon" data-feather="file"></i>
          <span class="link-title">Claims</span>
        </a>
      </li>
      
      <li class="nav-item nav-category">Users</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#Users" role="button" aria-expanded="" aria-controls="Users">
          <i class="link-icon" data-feather="user"></i>
          <span class="link-title">Users</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="Users">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('create-user') }}" class="nav-link">Create User</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('users-list') }}" class="nav-link">User List</a>
            </li>
          </ul>
        </div>
      </li>
    </li>

      <li class="nav-item nav-category">Insures</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#Insures" role="button" aria-expanded="" aria-controls="Insures">
          <i class="link-icon" data-feather="file"></i>
          <span class="link-title">Insures</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="Insures">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('create-insurer') }}" class="nav-link">Create Insurer</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('insurer-list') }}" class="nav-link">Insurer List</a>
            </li>
          </ul>
        </div>
      </li>
    </li>

    <li class="nav-item nav-category">Branch</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#Branch" role="button" aria-expanded="" aria-controls="Branch">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">branch</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="Branch">
        <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('create-branch') }}" class="nav-link">Create branch </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('branch-list') }}" class="nav-link">branch list</a>
            </li>
          </ul>
        </div>
      </li>
    </li>

    



      <li class="nav-item nav-category">Settings</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#Settings" role="button" aria-expanded="" aria-controls="Settings">
          <i class="link-icon" data-feather="settings"></i>
          <span class="link-title">Settings</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="Settings">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('custom-list') }}" class="nav-link">System Administration</a>
            </li>
          </ul>
        </div>
      </li>
</li>

      
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
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
          Light
        </label>
      </div>
      <div class="form-check form-check-inline">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
          Dark
        </label>
      </div>
    </div>
    <div class="theme-wrapper">
      <h6 class="text-muted mb-2">Light Version:</h6>
      <a class="theme-item active" href="#">
        <img src="{{ url('assets/images/screenshots/light.jpg') }}" alt="light version">
      </a>
      <h6 class="text-muted mb-2">Dark Version:</h6>
      <a class="theme-item" href="#">
        <img src="{{ url('assets/images/screenshots/dark.jpg') }}" alt="light version">
      </a>
    </div>
  </div>
</nav>