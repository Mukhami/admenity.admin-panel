@extends('Layouts.master')
@section('title', 'Admin-Panel')


@section('content')
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">


{{--                            <div class="col-xl-3 col-md-6">--}}
{{--                                <div class="card bg-c-yellow update-card">--}}
{{--                                    <div class="card-block">--}}
{{--                                        <div class="row align-items-end">--}}
{{--                                            <div class="col-8">--}}
{{--                                                <h4 class="text-white">$30200</h4>--}}
{{--                                                <h6 class="text-white m-b-0">All Earnings</h6>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-4 text-right">--}}
{{--                                                <canvas id="update-chart-1" height="50"></canvas>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="card-footer">--}}
{{--                                        <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-3 col-md-6">--}}
{{--                                <div class="card bg-c-green update-card">--}}
{{--                                    <div class="card-block">--}}
{{--                                        <div class="row align-items-end">--}}
{{--                                            <div class="col-8">--}}
{{--                                                <h4 class="text-white">290+</h4>--}}
{{--                                                <h6 class="text-white m-b-0">Page Views</h6>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-4 text-right">--}}
{{--                                                <canvas id="update-chart-2" height="50"></canvas>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="card-footer">--}}
{{--                                        <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-3 col-md-6">--}}
{{--                                <div class="card bg-c-pink update-card">--}}
{{--                                    <div class="card-block">--}}
{{--                                        <div class="row align-items-end">--}}
{{--                                            <div class="col-8">--}}
{{--                                                <h4 class="text-white">145</h4>--}}
{{--                                                <h6 class="text-white m-b-0">Task Completed</h6>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-4 text-right">--}}
{{--                                                <canvas id="update-chart-3" height="50"></canvas>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="card-footer">--}}
{{--                                        <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-3 col-md-6">--}}
{{--                                <div class="card bg-c-lite-green update-card">--}}
{{--                                    <div class="card-block">--}}
{{--                                        <div class="row align-items-end">--}}
{{--                                            <div class="col-8">--}}
{{--                                                <h4 class="text-white">500</h4>--}}
{{--                                                <h6 class="text-white m-b-0">Downloads</h6>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-4 text-right">--}}
{{--                                                <canvas id="update-chart-4" height="50"></canvas>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="card-footer">--}}
{{--                                        <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}


                            <div class="col-xl-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>{!! $profile->title !!}</h5>
                                        <span class="text-muted">{!! $profile->sub_title !!}</span>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><a href="{{ route('profile.edit', ['id'=>$profile->id]) }}">Edit</a></li>
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                                <li><i class="feather icon-trash-2 close-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                            {!! $profile->body !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-12">
                                <div class="card table-card">
                                    <div class="card-header">
                                        <h5>LISTED SECURITIES</h5>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><a href="{{ route('security.create') }}">Add New</a></li>
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                                <li><i class="feather icon-trash-2 close-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table class="table table-hover  table-borderless">
                                                <thead>
                                                <tr>
                                                    <th> Category</th>
                                                    <th>Number-Listed</th>
                                                    <th>Market Capitlalization(NGN)
                                                        <p class="text-muted m-b-0">As of March 29th 2019</p>
                                                    </th>
                                                    <th>Market Capitlalization(USD)*
                                                        <p class="text-muted m-b-0">As of March 29th 2019</p>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($listings as $listing)
                                                    <tr>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <h6>{{$listing->category}}</h6>
                                                            </div>
                                                        </td>
                                                        <td>{{number_format($listing->number_listed)}}</td>
                                                        <td>{{number_format($listing->mkt_cpt_ngn,2)}}</td>
                                                        <td>{{number_format($listing->mkt_cpt_usd, 2)}}</td>
                                                        <td>
                                                            <div class="dropdown-primary dropdown">
                                                                <div class="dropdown-toggle" data-toggle="dropdown">
                                                                    <i class="feather icon-anchor"></i>
                                                                </div>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                    <a class="dropdown-item" href="{{route('listing.edit', ['id'=>$listing->id])}}">Edit</a>
                                                                    <a class="dropdown-item" href="{{route('listing.delete', ['id'=>$listing->id])}}">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td>TOTAL</td>
                                                    <td>{!! number_format($number_listed_sum) !!}</td>
                                                    <td>{!! number_format($mkt_ngn_sum, 2) !!}</td>
                                                    <td>{!! number_format($mkt_usd_sum, 2) !!}</td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                            <div class="text-center">
                                                <a href="{{route('listings.index')}}" class=" b-b-primary text-primary">View All</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="styleSelector">
                </div>
            </div>
        @endsection
