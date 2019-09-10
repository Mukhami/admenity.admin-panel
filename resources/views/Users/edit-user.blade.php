@extends('Layouts.master')
@section('title', 'Edit - Registered User Role')
@section('content')
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Update - User Role</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="feather icon-maximize full-card"></i></li>
                                        <li><i class="feather icon-minus minimize-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block">
                                <form action="{{route('user.update')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="container-fluid">
                                            <fieldset id="role">
                                                <label for="role">Update User Role:</label><br>
                                                <label class="radio-inline"><input type="radio" value="1" name="role">Administrator</label>
                                                <label class="radio-inline"><input type="radio" value="2" name="role" checked>Normal User</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="{{ $userId }}">
                                    <button type="submit" name="profile-create" class="btn btn-round btn-outline-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection