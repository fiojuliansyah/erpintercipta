@if (Auth::user()->hasRole('employee'))
    <aside class="app-aside app-aside-expand-md app-aside-light">
        <!-- .aside-content -->
        <div class="aside-content">
            <!-- .aside-header -->
            <header class="aside-header d-block d-md-none">
                <!-- .btn-account -->
                <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside">
                    <span class="user-avatar user-avatar-lg">
                        @if (Auth::user()->profile?->avatar != null)
                            <img src="{{ Storage::url(Auth::user()->profile?->avatar) }}" alt="">
                        @else
                            <img src="{{ asset('/admin/images/avatars/team4.jpg') }}" alt="">
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
                        <a class="dropdown-item" href=""><span class="dropdown-icon oi oi-person"></span>
                            Profile</a>
                        <a class="dropdown-item" href="auth-signin-v1.html"><span
                                class="dropdown-icon oi oi-account-logout"></span> Logout</a>
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
                            <a href="{{ url('/dashboard') }}" class="menu-link"><span
                                    class="menu-icon fas fa-home"></span> <span class="menu-text">Dashboard</span></a>
                        </li><!-- /.menu-item -->
                        <!-- .menu-item -->
                        @can('project-menu')
                            <li class="menu-header">Project Management</li>
                            <li class="menu-item {{ Request::path() == 'projects/create' ? 'has-active' : '' }}">
                                <a href="{{ route('projects.create') }}" class="menu-link"><span
                                        class="menu-icon fas fa-city"></span> <span class="menu-text">Project
                                        Stepper</span></a>
                            </li>
                            <li class="menu-item has-child">
                                <a href="#" class="menu-link  {{ Request::path() == '#' ? 'has-active' : '' }}"><span
                                        class="menu-icon fas fa-database"></span> <span class="menu-text">Data
                                        Master</span></a>
                                <!-- child menu -->
                                <ul class="menu">
                                    <li class="menu-item {{ Request::path() == 'customers' ? 'has-active' : '' }}">
                                        <a href="{{ url('/customers') }}" class="menu-link">Customers</a>
                                    </li>
                                    <li class="menu-item {{ Request::path() == 'departments' ? 'has-active' : '' }}">
                                        <a href="{{ url('/departments') }}" class="menu-link">Departments</a>
                                    </li>
                                    <li class="menu-item {{ Request::path() == 'chartofaccounts' ? 'has-active' : '' }}">
                                        <a href="{{ url('/chartofaccounts') }}" class="menu-link">Chart Of Accounts</a>
                                    </li>
                                </ul><!-- /child menu -->
                            </li>
                        @endcan
                        @can('vendor-menu')
                            <li class="menu-item {{ Request::path() == 'vendors' ? 'has-active' : '' }}">
                                <a href="{{ url('/vendors') }}" class="menu-link"><span
                                        class="menu-icon 	fas fa-address-card"></span> <span
                                        class="menu-text">Vendors</span></a>
                            </li>
                        @endcan
                        @can('career-menu')
                            <li class="menu-header">Recruitment</li>
                            <li class="menu-item has-child">
                                <a href="#" class="menu-link"><span class="menu-icon fas fa-database"></span> <span
                                        class="menu-text">Database Pelamar</span></a> <!-- child menu -->
                                <ul class="menu">
                                    <li class="menu-item {{ Request::path() == '#' ? 'has-active' : '' }}">
                                        <a href="{{ route('applicants.index') }}" class="menu-link"><span
                                                class="menu-icon fas fa-user-friends"></span> <span
                                                class="menu-text">Pelamar</span><span
                                                class="badge badge-info">{{ $countPelamar }}</span></a>
                                    </li>
                                    <li class="menu-item {{ Request::path() == '#' ? 'has-active' : '' }}">
                                        <a href="{{ route('candidates.index') }}" class="menu-link"><span
                                                class="menu-icon fas fa-file-alt"></span> <span
                                                class="menu-text">Kandidat</span><span
                                                class="badge badge-danger">{{ $countKandidat }}</span></a>
                                    </li>
                                    <li class="menu-item has-child">
                                        <a href="#" class="menu-link"><span class="menu-icon fas fa-file-alt"></span>
                                            <span class="menu-text">Orientasi</span></a> <!-- grand child menu -->
                                        <ul class="menu">
                                            <li class="menu-item">
                                                <a href="{{ route('index-pending') }}" class="menu-link">Pending<span
                                                        class="badge badge-warning">{{ $countPending }}</span></a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="{{ route('index-ncc') }}" class="menu-link">NCC<span
                                                        class="badge badge-warning">{{ $countNCC }}</span></a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="{{ route('index-gnc') }}" class="menu-link">GNC<span
                                                        class="badge badge-warning">{{ $countGNC }}</span></a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="{{ route('index-interview') }}" class="menu-link">Interview User<span
                                                        class="badge badge-warning">{{ $countInterview }}</span></a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="{{ route('index-reject') }}" class="menu-link">Reject<span
                                                        class="badge badge-warning">{{ $countReject }}</span></a>
                                            </li>
                                        </ul><!-- /grand child menu -->
                                    </li>
                                </ul><!-- /child menu -->
                            </li>
                        @endcan
                        @can('candidate-menu')
                            <li class="menu-item {{ Request::path() == 'careers' ? 'has-active' : '' }}">
                                <a href="{{ route('careers.index') }}" class="menu-link"><span
                                        class="menu-icon fas fa-file-alt"></span> <span class="menu-text">Buat
                                        Lowongan</span></a>
                            </li>
                            <li class="menu-item has-child">
                                <a href="#" class="menu-link"><span class="menu-icon fas fa-database"></span> <span
                                        class="menu-text">Dokumen</span></a> <!-- child menu -->
                                <ul class="menu">
                                    <li class="menu-item {{ Request::path() == '#' ? 'has-active' : '' }}">
                                        <a href="{{ route('pkwts.index') }}" class="menu-link"><span
                                                class="menu-icon fas fa-file-alt"></span> <span class="menu-text">Generate
                                                Dokumen</span></a>
                                    </li>
                                @endcan
                                @can('addendum-menu')
                                    <li class="menu-item {{ Request::path() == '#' ? 'has-active' : '' }}">
                                        <a href="{{ url('/sites') }}" class="menu-link"><span
                                                class="menu-icon fas fa-building"></span> <span
                                                class="menu-text">Site</span></a>
                                    </li>
                                    <li class="menu-item {{ Request::path() == '#' ? 'has-active' : '' }}">
                                        <a href="{{ route('addendums.index') }}" class="menu-link"><span
                                                class="menu-icon fas fa-file-alt"></span> <span
                                                class="menu-text">Template Dokumen</span></a>
                                    </li>
                                    <li class="menu-item {{ Request::path() == '#' ? 'has-active' : '' }}">
                                        <a href="{{ route('agreements.index') }}" class="menu-link"><span
                                                class="menu-icon fas fa-file-alt"></span> <span
                                                class="menu-text">Agreement</span></a>
                                    </li>
                                @endcan
                            </ul><!-- /child menu -->
                        </li>
                        @can('employee-list') 
                        <li class="menu-item {{ Request::path() == '#' ? 'has-active' : '' }}">
                            <a href="{{ route('employee.index') }}" class="menu-link"><span
                                    class="menu-icon fas fa-user-friends"></span> <span class="menu-text">Data Pegawai
                                </span></a>
                        </li>
                        @endcan
                        @can('warehouse-system')
                            <li class="menu-header">Warehouse</li>
                            <li class="menu-item {{ Request::path() == 'item-request' ? 'has-active' : '' }}">
                                <a href="{{ route('item-request') }}" class="menu-link"><span
                                        class="menu-icon fas fa-dolly-flatbed"></span> <span class="menu-text">Item Request</span></a>
                            </li>
                            <li class="menu-item {{ Request::path() == 'all-item' ? 'has-active' : '' }}">
                                <a href="{{ route('all-item') }}" class="menu-link"><span
                                        class="menu-icon fas fa-dolly-flatbed"></span> <span class="menu-text">All Item Request</span></a>
                            </li>
                            <li class="menu-item has-child">
                                <a href="#" class="menu-link  {{ Request::path() == '#' ? 'has-active' : '' }}"><span
                                        class="menu-icon fas fa-database"></span> <span class="menu-text">Data
                                        Product</span></a>
                                <!-- child menu -->
                                <ul class="menu">
                                    <li class="menu-item {{ Request::path() == 'products' ? 'has-active' : '' }}">
                                        <a href="{{ url('/products') }}" class="menu-link">Products</a>
                                    </li>
                                </ul><!-- /child menu -->
                            </li>
                        @endcan
                        <!-- .menu-header -->
                        @can('admin-only')
                            <li class="menu-header">Server Side <span class="badge badge-danger">Admin Only</span></li>
                            <!-- /.menu-header -->
                            <!-- .menu-item -->
                            <li class="menu-item has-child">
                                <a href="#" class="menu-link"><span
                                        class="menu-icon fas fa-project-diagram"></span>
                                    <span class="menu-text">Data Master Setting</span></a> <!-- child menu -->
                                <ul class="menu">
                                    <li class="menu-item">
                                        <a href="{{ url('/companies') }}" class="menu-link">Companies</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ url('/taxcategories') }}" class="menu-link">Tax Categories</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ url('/accounttypes') }}" class="menu-link">Account Types</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ url('/terms') }}" class="menu-link">Terms</a>
                                    </li>
                                </ul><!-- /child menu -->
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('/cruds') }}" class="menu-link"><span
                                        class="menu-icon far fa-file"></span>
                                    <span class="menu-text">Cruds Example</span></a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('/users') }}" class="menu-link"><span
                                        class="menu-icon fas fa-user"></span>
                                    <span class="menu-text">Users</span></a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('/roles') }}" class="menu-link"><span
                                        class="menu-icon oi oi-wrench"></span>
                                    <span class="menu-text">Roles</span></a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('/permissions') }}" class="menu-link"><span
                                        class="menu-icon oi oi-wrench"></span> <span
                                        class="menu-text">Permissions</span></a>
                            </li>
                        @endcan
                    </ul><!-- /.menu -->
                </nav><!-- /.stacked-menu -->
            </div><!-- /.aside-menu -->
            <!-- Skin changer -->
            <footer class="aside-footer border-top p-2">
                <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span
                        class="d-compact-menu-none">Night mode</span> <i class="fas fa-moon ml-1"></i></button>
            </footer><!-- /Skin changer -->
        </div><!-- /.aside-content -->
    </aside>
@else
    <aside class="app-aside app-aside-expand-md app-aside-light">
        <!-- .aside-content -->
        <div class="aside-content">
            <!-- .aside-header -->
            <header class="aside-header d-block d-md-none">
                <!-- .btn-account -->
                <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside">
                    <span class="user-avatar user-avatar-lg">
                        @if (Auth::user()->profile?->avatar != null)
                            <img src="{{ Storage::url(Auth::user()->profile?->avatar) }}" alt="">
                        @else
                            <img src="{{ asset('/admin/images/avatars/team4.jpg') }}" alt="">
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
                        <a class="dropdown-item" href=""><span class="dropdown-icon oi oi-person"></span>
                            Profile</a>
                        <a class="dropdown-item" href="auth-signin-v1.html"><span
                                class="dropdown-icon oi oi-account-logout"></span> Logout</a>
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
                            <a href="{{ url('/dashboard') }}" class="menu-link"><span
                                    class="menu-icon fas fa-home"></span>
                                <span class="menu-text">Dashboard</span></a>
                        </li><!-- /.menu-item -->
                        <li class="menu-item {{ Request::path() == 'jobportal' ? 'has-active' : '' }}">
                            <a href="{{ route('jobportal') }}" class="menu-link"><span
                                    class="menu-icon 	fas fa-briefcase"></span> <span class="menu-text">Job
                                    Portal</span></a>
                        </li>
                        @if (Auth::user()->signature != null)
                        @else
                            <li class="menu-item {{ Request::path() == 'pkwt-show' ? 'has-active' : '' }}">
                                <a href="{{ route('pkwt-show') }}" class="menu-link"><span
                                        class="menu-icon 	fas fa-file-alt"></span> <span class="menu-text">Tanda
                                        Tangan</span></a>
                            </li>
                        @endif
                        <li class="menu-item {{ Request::path() == 'my-resume' ? 'has-active' : '' }}">
                            <a href="{{ route('my-resume') }}" class="menu-link" target="_blank"><span
                                    class="menu-icon 	fas fa-file-alt"></span> <span class="menu-text">Resume
                                    Saya</span></a>
                        </li>
                    </ul><!-- /.menu -->
                </nav><!-- /.stacked-menu -->
            </div><!-- /.aside-menu -->
            <!-- Skin changer -->
            <footer class="aside-footer border-top p-2">
                <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span
                        class="d-compact-menu-none">Night mode</span> <i class="fas fa-moon ml-1"></i></button>
            </footer><!-- /Skin changer -->
        </div><!-- /.aside-content -->
    </aside>
@endif
