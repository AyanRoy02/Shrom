<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('/dashboard')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#subscriber" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Subscriber</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="subscriber">
          <ul class="nav flex-column sub-menu">

            <li class="nav-item"> <a class="nav-link" href="{{url('/subscribe')}}">All Subscriber</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#page" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Page</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="page">
          <ul class="nav flex-column sub-menu">

            <li class="nav-item"> <a class="nav-link" href="{{url('/all-page')}}">View Pages</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/create-page')}}">Create Pages</a></li>
          </ul>
        </div>
      </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#setting" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Website Setting</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="setting">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('/all-setting')}}">All Setting</a></li>
                </ul>
            </div>
        </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#user" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">Users</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="user">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href=""> Login </a></li>

          </ul>
        </div>
      </li>
    </ul>
  </nav>
