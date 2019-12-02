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
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                            <span class="pcoded-mtext">NSE Stats</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="{{route('all.users')}}">
                                    <span class="pcoded-mtext">Registered App Users</span>
                                </a>
                            </li>

                            <li class="">
                                <a href="{{route('sms.logs')}}">
                                    <span class="pcoded-mtext">View SMS Logs</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{route('sms.summary')}}">
                                    <span class="pcoded-mtext">View SMS Summary</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{route('feedback')}}">
                                    <span class="pcoded-mtext">View App Reviews</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::user()->role->role == 'Administrator')
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                            <span class="pcoded-mtext">Admin-Panel users</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="{{route('users.list')}}">
                                    <span class="pcoded-mtext">View Users</span>
                                </a>
                            </li>

                            <li class="">
                                <a href="{{route('invite')}}">
                                    <span class="pcoded-mtext">Send Invitation</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
{{--                    <li class="pcoded-hasmenu">--}}
{{--                        <a href="javascript:void(0)">--}}
{{--                            <span class="pcoded-mtext">Fact Sheet Details</span>--}}
{{--                        </a>--}}
{{--                        <ul class="pcoded-submenu">--}}
{{--                            <li class="active">--}}
{{--                                <a href="{{route('index')}}">--}}
{{--                                    <span class="pcoded-mtext">View Fact Sheet Details</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            @if(\Illuminate\Support\Facades\Auth::user()->role->role == 'Administrator')--}}
{{--                            <li class=" pcoded-hasmenu">--}}
{{--                                <a href="javascript:void(0)">--}}
{{--                                    <span class="pcoded-mtext">Profile</span>--}}
{{--                                </a>--}}
{{--                                <ul class="pcoded-submenu">--}}
{{--                                    <li class=" ">--}}
{{--                                        <a href="{{route('profile.edit', ['id'=>1])}}">--}}
{{--                                            <span class="pcoded-mtext">Edit Existing</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li class="pcoded-hasmenu">--}}
{{--                                <a href="javascript:void(0)">--}}
{{--                                    <span class="pcoded-mtext">Listed Securities</span>--}}
{{--                                </a>--}}
{{--                                <ul class="pcoded-submenu">--}}
{{--                                    <li class="">--}}
{{--                                        <a href="{{route('listings.index')}}">--}}
{{--                                            <span class="pcoded-mtext">View All</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="">--}}
{{--                                        <a href="{{route('security.create')}}">--}}
{{--                                            <span class="pcoded-mtext">Add New</span>--}}
{{--                                            <span class="pcoded-badge label label-info ">Add</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}

{{--                            </li>--}}

{{--                            <li class="pcoded-hasmenu">--}}
{{--                                <a href="javascript:void(0)">--}}
{{--                                    <span class="pcoded-mtext">Market Flow</span>--}}
{{--                                </a>--}}
{{--                                <ul class="pcoded-submenu">--}}
{{--                                    <li class="">--}}
{{--                                        <a href="{{route('market_flow.create')}}">--}}
{{--                                            <span class="pcoded-mtext">Add New</span>--}}
{{--                                            <span class="pcoded-badge label label-info ">Add</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}

{{--                            <li class="pcoded-hasmenu">--}}
{{--                                <a href="javascript:void(0)">--}}
{{--                                    <span class="pcoded-mtext">Industry Sector</span>--}}
{{--                                </a>--}}
{{--                                <ul class="pcoded-submenu">--}}
{{--                                    <li class="">--}}
{{--                                        <a href="{{route('sector.create')}}">--}}
{{--                                            <span class="pcoded-mtext">Add New</span>--}}
{{--                                            <span class="pcoded-badge label label-info ">Add</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}

{{--                            <li class="pcoded-hasmenu">--}}
{{--                                <a href="javascript:void(0)">--}}
{{--                                    <span class="pcoded-mtext">Capitalization</span>--}}
{{--                                </a>--}}
{{--                                <ul class="pcoded-submenu">--}}
{{--                                    <li class="">--}}
{{--                                        <a href="{{route('capitalization.create')}}">--}}
{{--                                            <span class="pcoded-mtext">Add New</span>--}}
{{--                                            <span class="pcoded-badge label label-info ">Add</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}

{{--                        </ul>--}}
{{--                        @endif--}}
{{--                    </li>--}}



                </ul>
            </li>
        </ul>
    </div>
</nav>