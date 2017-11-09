
@extends('layouts.app')


@section('content')

     
      @include('admin.includes.errors')

<div class="panel panel-default">
      <div class="panel-heading">
      	Updated  Tag :{{ $tag->tag }}
      </div>

      <div class="panel-body">
      	<form action="{{ route('tag.update',['id'=>$tag->id]) }}" method="POST">
      		
      		{{ csrf_field() }}

            <div class="form-group">
            	<label for="tag">Tag Name</label>
            	<input type="text" name="tag" value="{{ $tag->tag }}"  placeholder="Enter Your Blog Category Name" class="form-control">
            </div>

            <div class="from-group">
            	 <div class="text-right">
            	 	<button class="btn btn-success" type="submit">update tag</button>
            	 </div>
            </div>



      	</form>
      </div>

  </div>

@stop