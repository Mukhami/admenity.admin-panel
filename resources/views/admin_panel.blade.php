@extends('Layouts.master')
@section('title', 'Fact Sheet Details')


@section('content')
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>{!! $profile->title !!}</h5>
                                        <span class="text-muted">{!! $profile->sub_title !!}</span>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                @if(\Illuminate\Support\Facades\Auth::user()->role->role == 'Administrator')
                                                <li><a href="{{ route('profile.edit', ['id'=>$profile->id]) }}">Edit</a></li>
                                                @endif
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
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
                                                @if(\Illuminate\Support\Facades\Auth::user()->role->role == 'Administrator')
                                                <li><a href="{{ route('security.create') }}">Add New</a></li>
                                                @endif
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
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

                                                        @if(\Illuminate\Support\Facades\Auth::user()->role->role == 'Administrator')
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
                                                        @endif
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


                            <div class="col-xl-12 col-md-12">
                                <div class="card table-card">
                                    <div class="card-header">
                                        <h5>MARKET FLOW</h5>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                @if(\Illuminate\Support\Facades\Auth::user()->role->role == 'Administrator')
                                                <li><a href="{{ route('market_flow.create') }}">Add New</a></li>
                                                @endif
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table class="table table-hover  table-borderless">
                                                <thead>
                                                <tr>
                                                    <th> Period</th>
                                                    <th>Domestic(%)</th>
                                                    <th>Foreign(%)</th>
                                                    <th>Total Foreign Transactions
                                                        <p class="text-muted m-b-0">Naira, USD</p>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($mkt_flows as $mkt_flow)
                                                    <tr>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <h6>{{$mkt_flow->period}}</h6>
                                                            </div>
                                                        </td>
                                                        <td>{{$mkt_flow->domestic}}%</td>
                                                        <td>{{$mkt_flow->foreign}}%</td>
                                                        <td>N{{number_format($mkt_flow->total_ft_naira,2)}}bn,  ${{number_format($mkt_flow->total_ft_dollar,2)}}bn</td>

                                                        @if(\Illuminate\Support\Facades\Auth::user()->role->role == 'Administrator')
                                                        <td>
                                                            <div class="dropdown-primary dropdown">
                                                                <div class="dropdown-toggle" data-toggle="dropdown">
                                                                    <i class="feather icon-anchor"></i>
                                                                </div>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                    <a class="dropdown-item" href="{{route('market_flow.edit', ['id'=>$mkt_flow->id])}}">Edit</a>
                                                                    <a class="dropdown-item" href="{{route('market_flow.delete', ['id'=>$mkt_flow->id])}}">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        @endif

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-12 col-md-12">
                                <div class="card table-card">
                                    <div class="card-header">
                                        <h5>PERFORMANCE BY INDUSTRY SECTOR</h5>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                @if(\Illuminate\Support\Facades\Auth::user()->role->role == 'Administrator')
                                                <li><a href="{{ route('sector.create') }}">Add New</a></li>
                                                @endif
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th> By Industry Sector***</th>
                                                    <th>Q1 2019 <p class="text-muted m-b-0">Mar-2019</p></th>
                                                    <th>52-Week Change <p class="text-muted m-b-0">Apr-2018 to Mar-2019</p></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($sectors as $sector)
                                                    <tr>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <h6>{{$sector->industry_sector}}</h6>
                                                            </div>
                                                        </td>
                                                        <td>N{{number_format($sector->transaction_naira,2)}}{{$sector->naira_units}},  ${{number_format($sector->transaction_dollar,2)}}{{$sector->usd_units}}</td>
                                                        @if($sector->change <= -0)
                                                        <td><font color="red">{{$sector->change}}%</font></td>
                                                        @else
                                                        <td><font color="green">{{$sector->change}}%</font></td>
                                                        @endif

                                                        @if(\Illuminate\Support\Facades\Auth::user()->role->role == 'Administrator')
                                                        <td>
                                                            <div class="dropdown-primary dropdown">
                                                                <div class="dropdown-toggle" data-toggle="dropdown">
                                                                    <i class="feather icon-anchor"></i>
                                                                </div>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                    <a class="dropdown-item" href="{{route('sector.edit', ['id'=>$sector->id])}}">Edit</a>
                                                                    <a class="dropdown-item" href="{{route('sector.delete', ['id'=>$sector->id])}}">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-12 col-md-12">
                                <div class="card table-card">
                                    <div class="card-header">
                                        <h5>PERFORMANCE BY CAPITALIZATION</h5>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                @if(\Illuminate\Support\Facades\Auth::user()->role->role == 'Administrator')
                                                <li><a href="{{ route('capitalization.create') }}">Add New</a></li>
                                                @endif
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th> By Capitalization***</th>
                                                    <th>Q1 2019 <p class="text-muted m-b-0">Mar-2019</p></th>
                                                    <th>52-Week Change <p class="text-muted m-b-0">Apr-2018 to Mar-2019</p></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($capitalizations as $capt)
                                                    <tr>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <h6>{{$capt->capitalization}}</h6>
                                                            </div>
                                                        </td>
                                                        <td>N{{number_format($capt->transaction_naira,2)}}{{$capt->naira_units}},  ${{number_format($capt->transaction_dollar,2)}}{{$capt->usd_units}}</td>
                                                        @if($capt->change <= -0)
                                                            <td><font color="red">{{$capt->change}}%</font></td>
                                                        @else
                                                            <td><font color="green">{{$capt->change}}%</font></td>
                                                        @endif
                                                        @if(\Illuminate\Support\Facades\Auth::user()->role->role == 'Administrator')
                                                        <td>
                                                            <div class="dropdown-primary dropdown">
                                                                <div class="dropdown-toggle" data-toggle="dropdown">
                                                                    <i class="feather icon-anchor"></i>
                                                                </div>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                    <a class="dropdown-item" href="{{route('capitalization.edit', ['id'=>$capt->id])}}">Edit</a>
                                                                    <a class="dropdown-item" href="{{route('capitalization.delete', ['id'=>$capt->id])}}">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
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
