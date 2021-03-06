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
                            <a data-toggle="modal" href="#modal-form"
                               data-href='{{route('users.edit',\Illuminate\Support\Facades\Auth::user()->id)}}'>Change
                                Profile</a>
                        </li>
                        <li>
                            <a data-toggle="modal" href="#modal-form"
                               data-href='{{route('users.editmypassword',\Illuminate\Support\Facades\Auth::user()->id)}}'>Change
                                Password</a>
                        </li>
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
            <li class="{{ isActiveRoute('categories.index') }}">
                <a href="{{ url('/categories') }}"><i class="fa fa-th-large"></i> <span
                            class="nav-label">Galleries</span></a>
            </li>
            <li class="{{ isActiveRoute('photos.index') }}">
                <a href="{{ url('/photos') }}"><i class="fa fa-th-large"></i> <span
                            class="nav-label">Photos</span></a>
            </li>
            <li class="{{ isActiveRoute('production.index') }}">
                <a href="{{ url('/production') }}"><i class="fa fa-th-large"></i> <span
                            class="nav-label"> Production Data</span></a>
            <li class="{{ isActiveRoute('product-types.index') }}">
                <a href="{{ url('/product-types') }}"><i class="fa fa-th-large"></i> <span
                            class="nav-label">Product types Master</span></a>
            </li>
            <li class="{{ isActiveRoute('products.index') }}">
                <a href="{{ url('/products') }}"><i class="fa fa-th-large"></i>
                    <span class="nav-label">Products master</span></a>
            </li>
            @if(\Illuminate\Support\Facades\Auth::user()->type == \App\Utilities\Constants::USERTYPES['SuperAdmin'])
                <li class="{{ isActiveRoute('users.index') }}">
                    <a href="{{ url('/users') }}"><i class="fa fa-th-large"></i> <span
                                class="nav-label">Manage Users</span></a>
                </li>
                {{-- <li class="{{ isActiveRoute('users.tokens') }}">
                    <a href="{{ url('/users/tokens') }}"><i class="fa fa-th-large"></i> <span
                                class="nav-label">User Tokens</span></a>
                </li> --}}
            @endif

        </ul>

    </div>
</nav>
