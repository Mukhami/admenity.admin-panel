@extends('Layouts.master')
@section('title', 'Create - Admin Profile')


@section('content')
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-xl-9 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Create - Profile</h5>
                                <span class="text-muted">Africa's Preferred Exchange Hub</span>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="feather icon-maximize full-card"></i></li>
                                        <li><i class="feather icon-minus minimize-card"></i></li>
                                        <li><i class="feather icon-trash-2 close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block">
                                <form action="{{route('profile.create')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="sub_title">Sub-Title</label>
                                        <input type="text" class="form-control" id="sub_title" name="sub_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="body">Body</label>
                                        <textarea type="text" class="form-control" id="body" name="body"></textarea>
                                    </div>
                                    <button type="submit" name="profile-create" class="btn btn-round btn-outline-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection