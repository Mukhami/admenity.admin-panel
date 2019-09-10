@extends('Layouts.master')
@section('title', 'Create -User Role')
@section('content')
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-xl-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Create - User Role</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="feather icon-maximize full-card"></i></li>
                                        <li><i class="feather icon-minus minimize-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block">
                                <form action="{{route('role.create')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <input type="text" class="form-control" id="role" name="role">
                                    </div>
                                    <button type="submit" name="profile-create" class="btn btn-round btn-outline-primary">Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection