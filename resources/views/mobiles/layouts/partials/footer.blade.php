@if (Auth::user()->hasRole('employee') &&
        (isset(Auth::user()->profile['department']) ||
            (isset(Auth::user()->candidate) && Auth::user()->candidate['status'] == '7')))
    <div id="footer-bar" class="footer-bar-5">
        <a href="{{ url('dashboard') }}"><i class="fa fa-home"></i><span>Beranda</span></a>
        <a href="#"><i class="fas fa-newspaper"></i><span>Workplace</span></a>
        <a href="#"><i class="fa fa-envelope"></i><span>Inbox</span></a>
        <a href="#" data-menu="menu-share"><i class="	fa fa-th-large"></i><span>Quick</span></a>
        <a href="{{ route('profile') }}"><i class="fa fa-user"></i><span>Profil</span></a>
    </div>
@else
    <div id="footer-bar" class="footer-bar-1">
        <a href="{{ route('history') }}" class="{{ request()->is('history') ? 'active-nav' : '' }}"><i
                class="fas fa-history"></i><span>Histori</span></a>
        <a href="{{ route('my-resume') }}" class="{{ request()->is('my-resume') ? 'active-nav' : '' }}"><i
                class="fas fa-file-contract"></i><span>My Resume</span></a>
        <a href="{{ url('dashboard') }}" class="{{ request()->is('dashboard') ? 'active-nav' : '' }}"><i
                class="fa fa-home"></i><span>Beranda</span></a>
        <a href="{{ route('jobportal') }}" class="{{ request()->is('jobportal') ? 'active-nav' : '' }}"><i
                class="fa fa-briefcase"></i><span>Lowongan</span></a>
        <a href="{{ route('profile') }}"><i class="fa fa-user"></i><span>Profil</span></a>
    </div>
@endif
