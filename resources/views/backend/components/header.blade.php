<header class="header">
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center">
      <ul class="header__nav d-flex align-items-center">
        <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"><a href="{{URL::to('/admin/dashboard')}}"><i class="tc-home"></i>My Space</a></li>
        <li><a href="#"><i class="tc-blog"></i>Blog</a></li>
      </ul>
      <div class="header__profile dropdown">
        <div class="header__profile--badge" data-toggle="dropdown">
          <span>@php echo substr(Auth::user()->name, 0 , 1 ); @endphp</span>
          <i></i>
        </div>
        <div class="dropdown-menu dropdown-menu-right" >
          <a class="dropdown-item" href="#">Edit Profile</a>
          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
</header>
