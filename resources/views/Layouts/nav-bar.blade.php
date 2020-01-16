{{--@extends('Layouts.master')--}}
<nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="feather icon-menu"></i>
                    </a>
                    <a href="{{route('stats')}}">
                        <h5>NSE - Admin</h5>
{{--                        <img class="img-fluid" src="{{asset('assets/images/logo.png')}}" alt="Theme-Logo" />--}}
                    </a>
                    <a class="mobile-options">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>
                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li class="header-search">
                            <div class="main-search morphsearch-search">
                                <div class="input-group">
                                    <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="feather icon-maximize full-screen"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                        <li class="user-profile header-notification">
                            <div class="dropdown-primary dropdown">
                            <div class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('assets/images/avatar.png')}}" class="img-radius" alt="Admin Profile">
                            <span>{{ Auth::user()->name }}</span>
                            <i class="feather icon-chevron-down"></i>
                            </div>
                            <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="feather icon-log-out"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                            </form>
                            </li>
                            </ul>
                            </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>