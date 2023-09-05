<header class="app-header">
    <!-- .top-bar -->
    <div class="top-bar">
      <!-- .top-bar-brand -->
      <div class="top-bar-brand">
        <!-- toggle aside menu -->
        <button class="hamburger hamburger-squeeze mr-2" type="button" data-toggle="aside-menu" aria-label="toggle aside menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle aside menu -->
        <img src="https://production.interciptacorp.com/company-page/images/logo.png" width="140" alt="">
          {{-- <img src="https://production.interciptacorp.com/company-page/images/logo.png" alt=""> --}}
      </div><!-- /.top-bar-brand -->
      <!-- .top-bar-list -->
      <div class="top-bar-list">
        <!-- .top-bar-item -->
        <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
          <!-- toggle menu -->
          <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle menu -->
        </div><!-- /.top-bar-item -->
        <!-- .top-bar-item -->
        <div class="top-bar-item top-bar-item-full">
          <span class="badge badge-lg badge-danger"><span class="oi oi-media-record pulse mr-1"></span>Production</span>
        </div><!-- /.top-bar-item -->
        <!-- .top-bar-item -->
        <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
          <!-- .nav -->
          <ul class="header-nav nav">
            <!-- .nav-item -->
            <li class="nav-item dropdown header-nav-dropdown has-notified">
              <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="oi oi-pulse"></span></a> <!-- .dropdown-menu -->
              <div class="dropdown-menu dropdown-menu-rich dropdown-menu-right">
                <div class="dropdown-arrow"></div>
                <h6 class="dropdown-header stop-propagation">
                  <span>Activities <span class="badge">(2)</span></span>
                </h6><!-- .dropdown-scroll -->
                <div class="dropdown-scroll perfect-scrollbar">
                  <!-- .dropdown-item -->
                  <a href="#" class="dropdown-item unread">
                    <div class="user-avatar">
                      <img src="assets/images/avatars/uifaces15.jpg" alt="">
                    </div>
                    <div class="dropdown-item-body">
                      <p class="text"> Jeffrey Wells created a schedule </p><span class="date">Just now</span>
                    </div>
                  </a> <!-- /.dropdown-item -->
                  <!-- .dropdown-item -->
                  <a href="#" class="dropdown-item unread">
                    <div class="user-avatar">
                      <img src="assets/images/avatars/uifaces16.jpg" alt="">
                    </div>
                    <div class="dropdown-item-body">
                      <p class="text"> Anna Vargas logged a chat </p><span class="date">3 hours ago</span>
                    </div>
                  </a> <!-- /.dropdown-item -->
                  <!-- .dropdown-item -->
                  <a href="#" class="dropdown-item">
                    <div class="user-avatar">
                      <img src="assets/images/avatars/uifaces17.jpg" alt="">
                    </div>
                    <div class="dropdown-item-body">
                      <p class="text"> Sara Carr invited to Stilearn Admin </p><span class="date">5 hours ago</span>
                    </div>
                  </a> <!-- /.dropdown-item -->
                  <!-- .dropdown-item -->
                  <a href="#" class="dropdown-item">
                    <div class="user-avatar">
                      <img src="assets/images/avatars/uifaces18.jpg" alt="">
                    </div>
                    <div class="dropdown-item-body">
                      <p class="text"> Arthur Carroll updated a project </p><span class="date">1 day ago</span>
                    </div>
                  </a> <!-- /.dropdown-item -->
                  <!-- .dropdown-item -->
                  <a href="#" class="dropdown-item">
                    <div class="user-avatar">
                      <img src="assets/images/avatars/uifaces19.jpg" alt="">
                    </div>
                    <div class="dropdown-item-body">
                      <p class="text"> Hannah Romero created a task </p><span class="date">1 day ago</span>
                    </div>
                  </a> <!-- /.dropdown-item -->
                  <!-- .dropdown-item -->
                  <a href="#" class="dropdown-item">
                    <div class="user-avatar">
                      <img src="assets/images/avatars/uifaces20.jpg" alt="">
                    </div>
                    <div class="dropdown-item-body">
                      <p class="text"> Angela Peterson assign a task to you </p><span class="date">2 days ago</span>
                    </div>
                  </a> <!-- /.dropdown-item -->
                  <!-- .dropdown-item -->
                  <a href="#" class="dropdown-item">
                    <div class="user-avatar">
                      <img src="assets/images/avatars/uifaces21.jpg" alt="">
                    </div>
                    <div class="dropdown-item-body">
                      <p class="text"> Shirley Mason and 3 others followed you </p><span class="date">2 days ago</span>
                    </div>
                  </a> <!-- /.dropdown-item -->
                </div><!-- /.dropdown-scroll -->
                <a href="user-activities.html" class="dropdown-footer">All activities <i class="fas fa-fw fa-long-arrow-alt-right"></i></a>
              </div><!-- /.dropdown-menu -->
            </li><!-- /.nav-item -->
            <!-- .nav-item -->
            <li class="nav-item dropdown header-nav-dropdown">
              <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="oi oi-grid-three-up"></span></a> <!-- .dropdown-menu -->
              <div class="dropdown-menu dropdown-menu-rich dropdown-menu-right">
                <div class="dropdown-arrow"></div><!-- .dropdown-sheets -->
                <div class="dropdown-sheets">
                  <!-- .dropdown-sheet-item -->
                  <div class="dropdown-sheet-item">
                    <a href="{{ url('/vendors') }}" class="tile-wrapper"><span class="tile tile-lg bg-indigo"><i class="oi oi-people"></i></span> <span class="tile-peek">Vendors</span></a>
                  </div><!-- /.dropdown-sheet-item -->
                  <!-- .dropdown-sheet-item -->
                  <div class="dropdown-sheet-item">
                    <a href="{{ route('projects.create') }}" class="tile-wrapper"><span class="tile tile-lg bg-teal"><i class="oi oi-fork"></i></span> <span class="tile-peek">Projects</span></a>
                  </div><!-- /.dropdown-sheet-item -->
                  <!-- .dropdown-sheet-item -->
                  <div class="dropdown-sheet-item">
                    <a href="{{ url('/customers') }}" class="tile-wrapper"><span class="tile tile-lg bg-pink"><i class="fa fa-tasks"></i></span> <span class="tile-peek">Customers</span></a>
                  </div><!-- /.dropdown-sheet-item -->
                  <!-- .dropdown-sheet-item -->
                  <div class="dropdown-sheet-item">
                    <a href="{{ url('/departments') }}" class="tile-wrapper"><span class="tile tile-lg bg-yellow"><i class="oi oi-fire"></i></span> <span class="tile-peek">Departments</span></a>
                  </div><!-- /.dropdown-sheet-item -->
                  <!-- .dropdown-sheet-item -->
                  <div class="dropdown-sheet-item">
                    <a href="{{ url('/chartofaccounts') }}" class="tile-wrapper"><span class="tile tile-lg bg-cyan"><i class="oi oi-document"></i></span> <span class="tile-peek">COAS</span></a>
                  </div><!-- /.dropdown-sheet-item -->
                </div><!-- .dropdown-sheets -->
              </div><!-- .dropdown-menu -->
            </li><!-- /.nav-item -->
          </ul><!-- /.nav -->
          <!-- .btn-account -->
          <div class="dropdown d-none d-md-flex">
            <button class="btn-account" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="user-avatar user-avatar-md">
                @if(Auth::user()->profile?->avatar != null)
                <img src="{{ Storage::url(Auth::user()->profile?->avatar) }}" alt="">     
                @else
                <img src="{{asset('/admin/images/avatars/team4.jpg')}}"  alt="">      
                @endif
              </span> 
              <span class="account-summary pr-lg-4 d-none d-lg-block">
                <span class="account-name">{{ Auth::user()->name }}</span> 
                <span class="account-description">{{ Auth::user()->email }}</span>
              </span>
            </button> <!-- .dropdown-menu -->
            <div class="dropdown-menu">
              <div class="dropdown-arrow d-lg-none" x-arrow=""></div>
              <div class="dropdown-arrow ml-3 d-none d-lg-block"></div>
              <h6 class="dropdown-header d-none d-md-block d-lg-none"> {{ Auth::user()->name }} </h6>
              <a class="dropdown-item" href="{{ url('/accountsettings') }}"><span class="dropdown-icon oi oi-person"></span> Pengaturan Akun</a>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                this.closest('form').submit();"><span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
              </form>
            </div><!-- /.dropdown-menu -->
          </div><!-- /.btn-account -->
        </div><!-- /.top-bar-item -->
      </div><!-- /.top-bar-list -->
    </div><!-- /.top-bar -->
  </header>