@extends('Layouts.master')
@section('title', 'Sent SMS Summary')
@section('content')


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

<div class="row justify-content-center">
    <div class="col-xl-8 col-md-12">
        <div class="card table-card">
            <div class="card-header">
                <h5>SENT SMS LOGS SUMMARY</h5>
                <p class="text-muted m-b-0">SMS's are grouped by day</p>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><a href="{{ route('sms.summary') }}">Refresh & View</a></li>
                        <li><i class="feather icon-maximize full-card"></i></li>
                        <li><i class="feather icon-minus minimize-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <div class="table-responsive" style="text-align: right">
                    <table class="table table-hover  table-borderless" id="summaryData">
                        <thead>
                        <tr>
                            <th style="text-align: right">Date Sent</th>
                            <th style="text-align: right">Number of Messages</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')
    <script type="text/javascript" src="{{asset('datatables/datatables.min.js')}}" ></script>

    <script>
        $('#summaryData').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('sms.summary.data')!!}',
            dom: 'Bfrtip',
            // buttons: [
            //     'colvis','copy', 'excel', 'print',
            //
            //     {
            //         extend: 'csvHtml5',
            //         text: 'CSV',
            //         exportOptions: {
            //             columns: [0,1, 2,3,4, 5,6,7],
            //         },
            //         footer: true,
            //     },
            //     'pageLength'
            // ],
            columns: [
                {data: 'date', name: 'date'},
                {data: 'total', name: 'total'},
            ]
        });
    </script>

@endsection