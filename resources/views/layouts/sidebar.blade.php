<!--start sidebar-->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="logo-icon">
            <img src="{{ URL::asset('assets/images/logo.svg') }}" class="logo-img" alt="" style="width: 165px">
        </div>
        {{--      <div class="logo-name flex-grow-1">--}}
        {{--        <h5 class="mb-0">Algebely Holding Admin Portal</h5>--}}
        {{--      </div>--}}
        <div class="sidebar-close">
            <span class="material-icons-outlined">close</span>
        </div>
    </div>
    <div class="sidebar-nav">
        <!--navigation-->
        <ul class="metismenu" id="sidenav">
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="material-icons-outlined">home</i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
                <ul>
                    <li><a href="{{ url('/index') }}"><i class="material-icons-outlined">arrow_right</i>Analysis</a>
                    </li>
                    <li><a href="{{ url('/index2') }}"><i class="material-icons-outlined">arrow_right</i>eCommerce</a>
                    </li>
                </ul>
            </li>
            <li class="menu-label">General</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">toc</i>
                    </div>
                    <div class="menu-title">Menus</div>
                </a>
                <ul>
                    <li><a href="{{ route('menus.index')}}"><i class="material-icons-outlined">arrow_right</i>Menus List</a>
                    </li>
                    <li><a href="{{ route('menus.create')}}"><i class="material-icons-outlined">arrow_right</i>Menus Create</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">description</i>
                    </div>
                    <div class="menu-title">Pages</div>
                </a>
                <ul>
                    <li><a href="{{ route('pages.index')}}"><i class="material-icons-outlined">arrow_right</i>Pages List</a>
                    </li>
                    <li><a href="{{ route('pages.create')}}"><i class="material-icons-outlined">arrow_right</i>Pages Create</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">fitbit</i>
                    </div>
                    <div class="menu-title">Leaders</div>
                </a>
                <ul>
                    <li><a href="{{ route('leaders.index')}}"><i class="material-icons-outlined">arrow_right</i>Leaders List</a>
                    </li>
                    <li><a href="{{ route('leaders.create')}}"><i class="material-icons-outlined">arrow_right</i>Leaders Create</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">face_5</i>
                    </div>
                    <div class="menu-title">Settings</div>
                </a>
                <ul>
                    <li><a href="{{ route('settings.index')}}"><i class="material-icons-outlined">arrow_right</i>Settings List</a>
                    </li>
                    <li><a href="{{ route('settings.create')}}"><i class="material-icons-outlined">arrow_right</i>Settings Create</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <div class="parent-icon"><i class="material-icons-outlined">description</i>
                    </div>
                    <div class="menu-title">Documentation</div>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <div class="parent-icon"><i class="material-icons-outlined">support</i>
                    </div>
                    <div class="menu-title">Support</div>
                </a>
            </li>
        </ul>
        <!--end navigation-->
    </div>
</aside>
<!--end sidebar-->
