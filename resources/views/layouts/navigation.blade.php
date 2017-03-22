<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                {{trans('navigation.welcome')}} <strong
                                        class="font-bold">{{\Illuminate\Support\Facades\Auth::user()->name}}</strong>
                            </span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">{{trans('navigation.logout')}}</a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    SF
                </div>
            </li>
            <li class="{{ isActiveRoute('main') }}">
                <a href="{{ url('/') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Main view</span></a>
            </li>
            <li class="{{ isActiveRoute('minor') }}">
                <a href="{{ url('/minor') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Minor view</span>
                </a>
            </li>
        </ul>

    </div>
</nav>
