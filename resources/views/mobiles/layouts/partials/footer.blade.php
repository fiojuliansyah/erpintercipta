@if (Auth::user()->hasRole('employee') or Auth::user()->profile['department'])
<div id="footer-bar" class="footer-bar-5">
    <a href="{{ url('dashboard') }}"><i class="fa fa-home"></i><span>Beranda</span></a>
    <a href="index-pages.html" ><i class="fas fa-newspaper"></i><span>Workplace</span></a>
    <a href="index-components.html"><i class="fa fa-envelope"></i><span>Inbox</span></a>
    {{-- <a href="index-search.html"><i class="fa fa-search"></i><span>Search</span></a> --}}
    <a href="#"><i class="fa fa-user"></i><span>Profil</span></a>
</div>  
@else
<div id="footer-bar" class="footer-bar-1">
    <a href="{{ route('history') }}" class="{{ request()->is('history') ? 'active-nav' : '' }}"><i class="fas fa-history"></i><span>Histori</span></a>
    <a href="{{ route('my-resume') }}" class="{{ request()->is('my-resume') ? 'active-nav' : '' }}"><i class="fas fa-file-contract"></i><span>My Resume</span></a>
    <a href="{{ url('dashboard') }}" class="{{ request()->is('dashboard') ? 'active-nav' : '' }}"><i class="fa fa-home"></i><span>Beranda</span></a>
    <a href="{{ route('jobportal') }}" class="{{ request()->is('jobportal') ? 'active-nav' : '' }}"><i class="fa fa-briefcase"></i><span>Lowongan</span></a>
    <a href="#"><i class="fa fa-user"></i><span>Profil</span></a>
</div>  
@endif
