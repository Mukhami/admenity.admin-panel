@extends('Layouts.master')
@section('title', 'Edit - Security Listing')
@section('content')
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Edit - Security Listing</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="feather icon-maximize full-card"></i></li>
                                        <li><i class="feather icon-minus minimize-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block">
                                <form action="{{route('listing.update')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <input type="text" class="form-control" id="category" name="category" value="{{$listing->category}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="number_listed">Number Listed</label>
                                        <input type="number" min="0" class="form-control" id="number_listed" name="number_listed" value="{{$listing->number_listed}}" required>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="mkt_cpt_ngn">Market Capitalization(NGN)</label>
                                            <input type="number" min="0" step="0.01" class="form-control" id="mkt_cpt_ngn" name="mkt_cpt_ngn" value="{{$listing->mkt_cpt_ngn}}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="mkt_cpt_usd">Market Capitalization(USD)</label>
                                            <input type="number" min="0" step="0.01" class="form-control" id="mkt_cpt_usd" name="mkt_cpt_usd" value="{{$listing->mkt_cpt_usd}}" required>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="{{ $listingId }}">
                                    <button type="submit" name="profile-create" class="btn btn-round btn-outline-primary">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection