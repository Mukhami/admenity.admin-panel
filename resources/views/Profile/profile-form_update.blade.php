@extends('Layouts.master')
@section('title', 'Edit - Admin Profile')


@section('content')
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Edit - Profile</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="feather icon-maximize full-card"></i></li>
                                        <li><i class="feather icon-minus minimize-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block">
                                <form action="{{route('profile.update')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{$profile->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="sub_title">Sub-Title</label>
                                        <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{$profile->sub_title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="body">Body</label>
                                        <textarea type="text" class="form-control" id="body" name="body" value="{!! $profile->body !!}"></textarea>
                                    </div>
                                    <input type="hidden" name="id" value="{{ $profileId }}">
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