@extends('fontend.main_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
<img src="{{(!empty($user->profile_photo_path))?url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg')}}" alt="" class="card-img-top" style="border-radius: 50%" height="100%" width="100%"><br><br>
<ul class="list-group list-group-flush">
    <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
    <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
    <a href="{{route('user.change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
    <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
</ul>
            </div>
            <div class="col-md-2">
                
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi.... </span> <strong>{{Auth::User()->name}}</strong>Update your profile</h3>
                    <div class="card-body">
                        <form action="{{route('user.profile.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Name <span></span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="name" name="name" value="{{$user->name}}">
                              </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email <span></span></label>
                                <input type="email" class="form-control unicase-form-control text-input" id="email" name="email" value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone <span></span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="phone" name="phone" value="{{$user->phone}}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">User Image <span></span></label>
                                <input type="file" class="form-control unicase-form-control text-input" id="profile_photo_path" name="profile_photo_path" value="{{$user->phone}}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('fontend.body.brands')
@endsection