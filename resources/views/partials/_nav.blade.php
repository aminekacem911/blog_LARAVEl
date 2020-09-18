
      <!-- top navbar-->
      <header class="header-container">
        <nav>
          <ul class="d-lg-none">
            <li>
              <a class="sidebar-toggler menu-link menu-link-close" href="#"><span><em></em></span></a>
            </li>
          </ul>
          <ul class="d-none d-sm-block">
            <li>
              <a class="covermode-toggler menu-link menu-link-close" href="#"><span><em></em></span></a>
            </li>
          </ul>
          <h2 class="header-title">Dashboard</h2>
          <ul class="float-right">
            <li class="dropdown">
              <a class="dropdown-toggle has-badge" href="#" data-toggle="dropdown">
                <img class="header-user-image" src="{{Auth::user()->image}}" alt="header-user-image">
                <sup class="badge bg-danger">3</sup>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-scale">
                <h6 class="dropdown-header">User menu</h6>
                <div class="dropdown-divider" role="presentation"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"   onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><em class="ion-log-out icon-lg text-primary"></em>Logoff</a>
                <form  id="logout-form" action="{{ route('logout') }}" method="POST" >
                  @csrf
                 </form>
              </div>
            </li>
            <li>
              <a id="header-search" href="#"><em class="ion-ios-search-strong"></em></a>
            </li>
            <li>
              <a id="header-settings" href="#"><em class="ion-more"></em></a>
            </li>
          </ul>
        </nav>
      </header>
      <!-- sidebar-->
  <aside class="sidebar-container">
    <div class="brand-header">
      <div class="float-left pt-4 text-muted sidebar-close"><em class="ion-arrow-left-c icon-lg"></em></div>
      <a class="brand-header-logo" href="#">
    </div>
    <div class="sidebar-content">
      <div class="sidebar-toolbar">
        <div class="sidebar-toolbar-background"></div>
        <div class="sidebar-toolbar-content text-center">
          <a href="#">
            <img class="rounded-circle thumb64" src="{{Auth::user()->image}}" alt="Profile">
          </a>
          <div class="mt-3">
            <div class="lead">{{Auth::user()->name}}</div>
          </div>
        </div>
      </div>
      @if (Auth::user()->hasRole('admin'))
      <nav class="sidebar-nav">
        <ul>
          <li>
            <div class="sidebar-nav-heading">MENU</div>
          </li>
          <li>
            <a href="{{ route('admin.posts.index') }}"><span class="float-right nav-label"></span><span class="nav-icon"><em class="ion-ios-speedometer-outline"></em></span><span>Posts</span></a>
          </li>
          <li>
            <a href="{{route('admin.users.index')}}"><span class="float-right nav-label"></span><span class="nav-icon"><em class="ion-clipboard"></em></span><span>Users</span></a>
          </li>             
          <li> 
          </li>
            <div class="sidebar-nav-heading">MORE</div>
          </li>
          <li>
            <a href="#"><span class="float-right nav-caret"><em class="ion-ios-arrow-right"></em></span><span class="float-right nav-label"></span><span class="nav-icon"><em class="ion-ios-person-outline"></em></span><span>User</span></a>
            <ul class="sidebar-subnav" id="user">
              <li>
                <a href="{{ route('logout') }}"   onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}<span class="float-right nav-label"></span></a>
               <form  id="logout-form" action="{{ route('logout') }}" method="POST" >
                @csrf
               </form>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      @else
      <nav class="sidebar-nav">
        <ul>
          <li>
            <div class="sidebar-nav-heading">MENU</div>
          </li>
          <li>
            <a href="{{ url('/post') }}"><span class="float-right nav-label"></span><span class="nav-icon"><em class="ion-ios-speedometer-outline"></em></span><span>Home</span></a>
          </li>         
          <li> 
          </li>
            <div class="sidebar-nav-heading">MORE</div>
          </li>
          <li>
            <a href="#"><span class="float-right nav-caret"><em class="ion-ios-arrow-right"></em></span><span class="float-right nav-label"></span><span class="nav-icon"><em class="ion-ios-person-outline"></em></span><span>User</span></a>
            <ul class="sidebar-subnav" id="user">
              <li>
                <a href="signin.html"><span class="float-right nav-label"></span><span>Profile</span></a>
              </li>
              <li>
                <a href="{{ route('logout') }}"   onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}<span class="float-right nav-label"></span></a>
               <form  id="logout-form" action="{{ route('logout') }}" method="POST" >
                @csrf
               </form>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      @endif
    </div>
  </aside>
  <div class="sidebar-layout-obfuscator"></div>



