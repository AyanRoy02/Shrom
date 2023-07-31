<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-circle-outline menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/all-category') }}">All Categories</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/category') }}">Create Categories</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#jobpost" aria-expanded="false" aria-controls="jobpost">
                <i class="mdi mdi-circle-outline menu-icon"></i>
                <span class="menu-title">Job Post</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="jobpost">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/jobpost') }}">All Job posts</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/jobpost/create') }}">Create Job posts</a></li>
                </ul>
            </div>
        </li>

        @can('all-workers')
        <li class="nav-item" href="#workers">
            <a class="nav-link" id="workers" href="{{ url('/workers') }}">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">All Workers</span>
            </a>
        </li>
        @endcan

        @can('all-users')
        <li class="nav-item" href="#users">
            <a class="nav-link" id="users" href="{{ url('/users') }}">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">All Users</span>
            </a>
        </li>
        @endcan
    </ul>
  </nav>
