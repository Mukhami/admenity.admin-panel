@extends('Layouts.master')
@section('title', 'Update Sector')
@section('content')
    <style>
        /*.positioning{*/
        /*    position: absolute;*/
        /*    top: 35px;*/
        /*}*/
    </style>
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Edit- {{$sector->industry_sector}}</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="feather icon-maximize full-card"></i></li>
                                        <li><i class="feather icon-minus minimize-card"></i></li>
                                        <li><i class="feather icon-trash-2 close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block">
                                <form action="{{route('sector.update')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="industry_sector">Industry Sector</label>
                                            <input type="text" class="form-control" id="industry_sector" name="industry_sector" value="{{$sector->industry_sector}}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="change">(%)Change</label>
                                            <input type="number" step="0.01" class="form-control" id="change" name="change" value="{{$sector->change}}" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="transaction_naira">Total Transaction(N)</label>
                                            <input type="number" min="0" step="0.01" class="form-control" id="transaction_naira" name="transaction_naira" value="{{$sector->transaction_naira}}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="container-fluid">
                                                    <fieldset id="NAIRA">
                                                        <label for="NAIRA">Select Units(NAIRA): </label><br>
                                                        <label class="radio-inline"><input type="radio" value="mn" name="NAIRA">Million</label>
                                                        <label class="radio-inline"><input type="radio" value="bn" name="NAIRA" checked>Billion</label>
                                                        <label class="radio-inline"><input type="radio" value="tn" name="NAIRA">Trillion</label>
                                                    </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="transaction_dollar">Total Transaction(USD)</label>
                                            <input type="number" min="0" step="0.01" class="form-control" id="transaction_dollar" name="transaction_dollar" value="{{$sector->transaction_naira}}"  required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="container-fluid">
                                                    <fieldset id="USD" >
                                                        <label for="USD">Select Units(USD): </label><br>
                                                        <label class="radio-inline"><input type="radio" value="mn" name="USD" checked>Million</label>
                                                        <label class="radio-inline"><input type="radio" value="bn" name="USD">Billion</label>
                                                        <label class="radio-inline"><input type="radio" value="tn" name="USD">Trillion</label>
                                                    </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="{{ $sectorId }}">
                                    <button type="submit" class="btn btn-round btn-outline-primary">Add New</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection