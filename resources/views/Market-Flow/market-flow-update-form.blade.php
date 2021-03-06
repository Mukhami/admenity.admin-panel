@extends('Layouts.master')
@section('title', 'Edit Market Flow')
@section('content')
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Update - Market Flow</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="feather icon-maximize full-card"></i></li>
                                        <li><i class="feather icon-minus minimize-card"></i></li>
                                        <li><i class="feather icon-trash-2 close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block">
                                <form action="{{route('market_flow.update')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="period">Period</label>
                                        <input type="text" class="form-control" id="period" name="period" value="{{$mkt_flow->period}}" required>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="domestic">Domestic(%)</label>
                                            <input type="number" min="0" step="0.01" class="form-control" id="domestic" name="domestic" value="{{$mkt_flow->domestic}}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="foreign">Foreign(%)</label>
                                            <input type="number" min="0" step="0.01" class="form-control" id="foreign" name="foreign" value="{{$mkt_flow->foreign}}" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="total_ft_naira">Total Foreign Transaction(N)</label>
                                            <input type="number" min="0" step="0.01" class="form-control" id="total_ft_naira" name="total_ft_naira" value="{{$mkt_flow->total_ft_naira}}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="total_ft_dollar">Total Foreign Transaction(USD)</label>
                                            <input type="number" min="0" step="0.01" class="form-control" id="total_ft_dollar" name="total_ft_dollar" value="{{$mkt_flow->total_ft_dollar}}" required>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="{{ $mktFlowId }}">
                                    <button type="submit" class="btn btn-round btn-outline-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection