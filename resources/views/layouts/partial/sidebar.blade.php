<aside class="app-aside app-aside-expand-md app-aside-light">
    <!-- .aside-content -->
    <div class="aside-content">
      <!-- .aside-header -->
      <header class="aside-header d-block d-md-none">
        <!-- .btn-account -->
        <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside">
          <span class="user-avatar user-avatar-lg">
            @if(Auth::user()->profile?->avatar != null)
            <img src="{{ Storage::url(Auth::user()->profile?->avatar) }}" alt="">     
            @else
            <img src="{{asset('/admin/images/avatars/team4.jpg')}}"  alt="">      
            @endif
          </span> 
          {{-- <span class="user-avatar user-avatar-lg"><img src="assets/images/avatars/profile.jpg" alt=""></span> --}}
          <span class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span>
          <span class="account-summary"><span class="account-name">{{ Auth::user()->name }}</span>
          <span class="account-description">{{ Auth::user()->email }}</span></span>
        </button> <!-- /.btn-account -->
        <!-- .dropdown-aside -->
        <div id="dropdown-aside" class="dropdown-aside collapse">
          <!-- dropdown-items -->
          <div class="pb-3">
            <a class="dropdown-item" href=""><span class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item" href="auth-signin-v1.html"><span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
            <div class="dropdown-divider"></div>
        </div><!-- /.dropdown-aside -->
      </header><!-- /.aside-header -->
      <!-- .aside-menu -->
      <div class="aside-menu overflow-hidden">
        <!-- .stacked-menu -->
        <nav id="stacked-menu" class="stacked-menu">
          <!-- .menu -->
          <ul class="menu">
            <!-- .menu-item -->
            <li class="menu-item {{ Request::path() == 'dashboard' ? 'has-active' : '' }}">
              <a href="{{ url('/dashboard') }}" class="menu-link"><span class="menu-icon fas fa-home"></span> <span class="menu-text">Dashboard</span></a>
            </li><!-- /.menu-item -->
            <li class="menu-item {{ Request::path() == 'jobportal' ? 'has-active' : '' }}">
              <a href="{{ route('jobportal') }}" class="menu-link"><span class="menu-icon 	fas fa-briefcase"></span> <span class="menu-text">Job Portal</span></a>
            </li>
            @if (Auth::user()->signature != null)   
            @else
            <li class="menu-item {{ Request::path() == 'pkwt-show' ? 'has-active' : '' }}">
              <a href="{{ route('pkwt-show') }}" class="menu-link"><span class="menu-icon 	fas fa-file-alt"></span> <span class="menu-text">Tanda Tangan</span></a>
            </li>  
            @endif
            <li class="menu-item {{ Request::path() == 'my-resume' ? 'has-active' : '' }}">
              <a href="{{ route('my-resume') }}" class="menu-link" target="_blank"><span class="menu-icon 	fas fa-file-alt"></span> <span class="menu-text">Resume Saya</span></a>
            </li>
          </ul><!-- /.menu -->
        </nav><!-- /.stacked-menu -->
      </div><!-- /.aside-menu -->
      <!-- Skin changer -->
      <footer class="aside-footer border-top p-2">
        <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span class="d-compact-menu-none">Night mode</span> <i class="fas fa-moon ml-1"></i></button>
      </footer><!-- /Skin changer -->
    </div><!-- /.aside-content -->
  </aside>