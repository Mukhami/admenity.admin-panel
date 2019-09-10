@extends('Layouts.master')
@section('title', 'Sent SMS Logs')
@section('content')


    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h6 class="text-c-yellow f-w-600">Monitored Stocks</h6>
                            {{--                                                <h6 class="text-muted m-b-0">Monitored Stocks</h6>--}}
                        </div>
                        <div class="col-4 text-right">
                            <i class="feather icon-bar-chart f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-yellow">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p class="text-white m-b-0">% change</p>
                        </div>
                        <div class="col-3 text-right">
                            <i class="feather icon-trending-down text-white f-16"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h6 class="text-c-green f-w-600">Sent SMS Summary</h6>
                            {{--                                                <h6 class="text-muted m-b-0">Sent SMS</h6>--}}
                        </div>
                        <div class="col-4 text-right">
                            <i class="feather icon-mail f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-green">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p class="text-white m-b-0"><a href="{{route('sms.summary')}}">View</a></p>
                        </div>
                        <div class="col-3 text-right">
                            <i class="feather icon-trending-up text-white f-16"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h6 class="text-c-blue f-w-600">Sent SMS Logs</h6>
                            {{--                                                <h6 class="text-muted m-b-0">Sent SMS Logs</h6>--}}
                        </div>
                        <div class="col-4 text-right">
                            <i class="feather icon-clipboard f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-blue">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p class="text-white m-b-0"><a href="{{route('sms.logs')}}">View</a></p>
                        </div>
                        <div class="col-3 text-right">
                            <i class="feather icon-trending-down text-white f-16"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h6 class="text-c-pink f-w-600">User Details</h6>
                            {{--                                                <h6 class="text-muted m-b-0">User Details</h6>--}}
                        </div>
                        <div class="col-4 text-right">
                            <i class="feather icon-user f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-pink">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p class="text-white m-b-0"><a href="{{route('user.lists')}}">View</a></p>
                        </div>
                        <div class="col-3 text-right">
                            <i class="feather icon-trending-up text-white f-16"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="col-xl-12 col-md-12">
    <div class="card table-card">
        <div class="card-header">
            <h5>SMS LOGS</h5>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li><a href="{{ route('sms.logs') }}">Refresh & View</a></li>
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
                        <th>Phone Number</th>
                        <th>Date & Time Sent</th>
                        <th>Message</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                     @foreach($array_data['responseObject'] as $key=>$value)
                         <tr>
                             <td>{{$value['mobile']}}</td>
                             <td>{{date('d-m-Y , h:i:sa',strtotime($value['created_date']))}}</td>
                             <td>{{str_limit($value['message'], 80)}}</td>
                             <td>{{$value['status']}}</td>
                         </tr>
                         @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection