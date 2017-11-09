@extends('layouts.app')


@section('content')

     
     @include('admin.includes.errors')

<div class="panel panel-default">
      <div class="panel-heading">
      	Update Category:{{$category->name}}
      </div>

      <div class="panel-body">
      	<form action="{{ route('category.update', ['id'=>$category->id]) }}" method="POST">
      		
      		{{ csrf_field() }}

            <div class="form-group">
            	<label for="name">Category Name</label>
            	<input type="text" name="name" value="{{ $category->name }}" placeholder="Enter Your Blog Category Name" class="form-control">
            </div>

            <div class="from-group">
            	 <div class="text-right">
            	 	<button class="btn btn-success" type="submit">Update Category</button>
            	 </div>
            </div>



      	</form>
      </div>

  </div>

@stop
