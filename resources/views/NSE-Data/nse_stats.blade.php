@extends('Layouts.master')
@section('title', 'NSE Stats')
@section('css')
    <link href="{{ asset('datatables/datatables.css') }}" rel="stylesheet">
@endsection

@section('content')
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h6 class="text-c-yellow f-w-600">User Feedback</h6>
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
                                                <p class="text-white m-b-0"><a href="{{route('feedback')}}">View</a></p>
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
                                                <p class="text-white m-b-0"><a href="{{route('all.users')}}">View</a></p>
                                            </div>
                                            <div class="col-3 text-right">
                                                <i class="feather icon-trending-up text-white f-16"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <div class="card table-card">
                                    <div class="card-header">
                                        <h5>MOBILE APP REGISTERED USERS</h5>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><a href="{{ route('all.users') }}">View All</a></li>
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive" >
                                            <table class="table table-hover table-boFrderless" id="allUsers">
                                                <thead>
                                                <tr>
                                                    <th>Registered E-mail Address</th>
                                                    <th>Registration Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
{{--                                                @foreach($last10 as $value)--}}
{{--                                                    <tr>--}}
{{--                                                        <td>{{$value['first_name']}}</td>--}}
{{--                                                        <td>{{$value['last_name']}}</td>--}}
{{--                                                        <td>{{$value['email']}}</td>--}}
{{--                                                        <td>{{$value['phone']}}</td>--}}
{{--                                                        <td>{{date('d-m-Y , h:i:sa',strtotime($value['created_on']))}}</td>--}}
{{--                                                    </tr>--}}
{{--                                                @endforeach--}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-xl-8 col-md-12">
                                <div class="card table-card">
                                    <div class="card-header">
                                        <h5>SMS LOGS</h5>
                                        <p class="text-muted">Records for the latest 7 sent sms.</p>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><a href="{{ route('sms.logs') }}">View All</a></li>
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
{{--                                                    <th>Status</th>--}}
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                @foreach($last_seven as $key=>$value)
                                                    <tr>
                                                        <td>{{$value['mobile']}}</td>
                                                        <td>{{date('d-m-Y , h:i:sa',strtotime($value['created_date']))}}</td>
                                                        <td>{{str_limit($value['message'], 55)}}</td>
{{--                                                        <td>{{$value['status']}}</td>--}}
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-12">
                                <div class="card quater-card">
                                    <div class="card-block">
                                        <h6><b>SMS Summary</b></h6>
                                        <p class="text-muted">Records for the last 6 days.</p>

                                        @foreach($last_five as $key=>$value)
                                            <p class="text-muted">{{date('d-m-Y',strtotime($value['date']))}}<span class="f-right">Sent SMS: {{$value['total']}}</span></p>
{{--                                            <div class="progress">--}}
{{--                                                <div class="progress-bar bg-simple-c-pink" style="width: 80%"></div>--}}
{{--                                            </div>--}}
                                            <br>
                                        @endforeach

                                        <div class="text-center">
                                            <a href="{{route('sms.summary')}}" class=" b-b-primary text-primary">View All</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-md-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>User Feedback</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><a href="{{ route('feedback') }}">View All</a></li>
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
                                                <th>Email Address</th>
                                                <th>Rating</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            @foreach($feedback_array['data'] as $key=>$value)
                                                <tr>
                                                    <td>{{$value['email']}}</td>
                                                    <td>{{$value['rating']}}</td>
                                                    @if($value['feedback']== "")
                                                        <td class="text-muted">No comment</td>
                                                    @else
                                                    <td>{{str_limit($value['feedback'], 55)}}</td>
                                                    @endif
                                                    <td>{{date('d-m-Y , h:i:sa',strtotime($value['created_date']))}}</td>
                                                    {{--                                                        <td>{{$value['status']}}</td>--}}
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
                <div id="styleSelector">
                </div>
            </div>
        @endsection
@section('js')
    <script type="text/javascript" src="{{asset('datatables/datatables.min.js')}}" ></script>

    <script>
        $('#allUsers').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('users.data')!!}',
            dom: 'Bfrtip',
            buttons: [
                'colvis','copy', 'excel', 'print',

                {
                    extend: 'csvHtml5',
                    text: 'CSV',
                    exportOptions: {
                        columns: [0,1, 2,3,4, 5,6,7],
                    },
                    footer: true,
                },
                'pageLength'
            ],
            columns: [
                {data: 'email', name: 'email'},
                {data: 'date_registered', name: 'date_registered'},            ]
        });
    </script>

@endsection
