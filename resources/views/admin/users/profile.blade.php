@extends('layouts.app')


@section('content')

     
      @include('admin.includes.errors')

<div class="panel panel-default">
      <div class="panel-heading">
      	Edit user Profile
      </div>

      <div class="panel-body">
      <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
      		
      		{{ csrf_field() }}

            <div class="form-group">
                  <label for="name">UserName</label>
                  <input type="text" name="name" value="{{ $user->name }}" placeholder="Enter Your User Name" class="form-control">
            </div>
            <div class="form-group">
                  <label for="email">User Email</label>
                  <input type="email" name="email" value="{{ $user->email }}" placeholder="Enter Your User Email" class="form-control">
            </div>
            <div class="form-group">
                  <label for="password">New Password</label>
                  <input type="password" name="password" placeholder="Enter Your new password" class="form-control">
            </div>  
            <div class="form-group">
                  <label for="avatar">Upload New Avatar</label>
                  <input type="file" name="avatar" placeholder="Enter Your new password" class="form-control">
            </div>
            <div class="form-group">
                  <label for="about">About you</label>
                 <textarea class="form-control" name="about" id="about" cols="30" rows="10">{{ $user->profile->about }}</textarea>
            </div>
            <div class="form-group">
                  <label for="facebook">Facebook</label>
                  <input type="text" value="{{ $user->facebook }}" name="facebook" placeholder="" class="form-control">
            </div>
             <div class="form-group">
            	<label for="facebook">Youtube</label>
            	<input type="text" value="{{ $user->youtube }}" name="youtube" placeholder="" class="form-control">
            </div>

            <div class="from-group">
            	 <div class="text-right">
            	 	<button class="btn btn-success" type="submit">Update Profile</button>
            	 </div>
            </div>



      	</form>
      </div>

  </div>

@stop