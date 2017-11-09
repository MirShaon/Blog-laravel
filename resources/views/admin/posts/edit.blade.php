@extends('layouts.app')


@section('content')

     
     @include('admin.includes.errors')

<div class="panel panel-default">
      <div class="panel-heading">
      	Edit  Post : {{$posts->title}}
      </div>

      <div class="panel-body">
      	<form action="{{ route('posts.update',['id'=>$posts->id]) }}" method="POST" enctype="multipart/form-data">
      		
      		{{ csrf_field() }}

            <div class="form-group">
            	<label for="title">Title</label>
            	<input type="text" name="title" value="{{ $posts->title }}" placeholder="Enter Your Blog Title" class="form-control">
            </div>

            <div class="form-group">
            	<label for="category">Select a Category</label>
            	<select name="category_id" id="category_id" class="form-control">
                     @foreach($categories as $category)

                      <option value="{{$category->id}}"
                          @if ($posts->category->id == $category->id)
                             selected 
                          @endif

                        >{{$category->name}}</option>

                     @endforeach     
                  </select>
            </div>
            <div class="form-group">
               <label for="tags">Select Tag</label>
               @foreach($tags as $tag)
                   <div class="checkbox">
                     <label for=""><input name="tags[]" value="{{$tag->id}}" type="checkbox"
                         
                         @foreach ($posts->tags as $t)
                            @if ($tag->id == $t->id)
                               checked 
                            @endif
                         @endforeach


                        >{{ $tag->tag }}</label>
                   </div>
               @endforeach    

            </div>
            <div class="form-group">
                  <label for="featured">Featured Image</label>
                  <input type="file" name="featured"  class="form-control">
            </div>


			 <div class="form-group">
            	<label for="body">Content</label>
            	<textarea name="body" id="body" cols="30" rows="10" placeholder="Enter your blog content" class="form-control">{{ $posts->body }}</textarea>
              
        </div>
            <div class="from-group">
            	 <div class="text-right">
            	 	<button class="btn btn-success" type="submit">Update Post</button>
            	 </div>
            </div>



      	</form>
      </div>

  </div>



@stop


@section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">

@stop




@section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

<script>
  
  $(document).ready(function() {
  $('#body').summernote();
});

</script>

@stop
