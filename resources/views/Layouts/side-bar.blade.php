<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu active pcoded-trigger">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="active">
                        <a href="{{route('stats')}}">
                            <span class="pcoded-mtext">NSE - Home</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="{{route('index')}}">
                            <span class="pcoded-mtext">Fact Sheet Details</span>
                        </a>
                    </li>

                    <li class=" pcoded-hasmenu">
                        <a href="javascript:void(0)">
                            <span class="pcoded-mtext">Profile</span>
                        </a>
                        <ul class="pcoded-submenu">
{{--                            <li class=" ">--}}
{{--                                <a href="{{route('profile.create')}}">--}}
{{--                                    <span class="pcoded-mtext">Create New</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                            <li class=" ">
                                <a href="{{route('profile.edit', ['id'=>1])}}">
                                    <span class="pcoded-mtext">Edit Existing</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                            <span class="pcoded-mtext">Listed Securities</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="{{route('listings.index')}}">
                                    <span class="pcoded-mtext">View All</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{route('security.create')}}">
                                    <span class="pcoded-mtext">Add New</span>
                                    <span class="pcoded-badge label label-info ">Add</span>
                                </a>
                            </li>
                        </ul>

                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>