@extends('Layouts.master')
@section('title', 'Registered Users')
@section('content')
    <div class="col-xl-12 col-md-12">
        <div class="card table-card">
            <div class="card-header">
                <h5>Registered Admin-Panel Users</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
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
                            <th> Name</th>
                            <th> Role</th>
                            <th>Email Address</th>
                            <th>Date Registered</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><h6>{{$user->name}}</h6></td>
                                <td><h6>{{$user->role->role}}</h6></td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>
                                    <div class="dropdown-primary dropdown">
                                        <div class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="feather icon-anchor"></i>
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{route('user.edit', ['id'=>$user->id])}}">Edit</a>
                                            <a class="dropdown-item" href="{{route('user.delete', ['id'=>$user->id])}}">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection