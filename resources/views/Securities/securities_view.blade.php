@extends('Layouts.master')
@section('title', 'Security Listings')
@section('content')
<div class="col-xl-12 col-md-12">
    <div class="card table-card">
        <div class="card-header">
            <h5>LISTED SECURITIES</h5>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li><a href="{{ route('security.create') }}">Add New</a></li>
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
            </div>
        </div>
    </div>
</div>
    @endsection