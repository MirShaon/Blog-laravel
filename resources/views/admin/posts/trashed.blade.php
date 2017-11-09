@extends('layouts.app')



@section('content')




	 <div class="panel panel-default">
	 	<div class="panel-body">
	 		
			<table class="table table-hover">
		 		<thead>
					<th>Post Image</th>

					<th>Post Title</th>
					<th>Edit</th>
					<th>Restore</th> 
					<th>Destroy</th>

					<tbody>

						@if($posts->count()>0)
                            @foreach($posts as $post)

			              <tr>
			              	<td>
			              		<img style="width: 90px;height: 50px;" src="{{ $post->featured}}" alt="{{$post->title}}">
			              	</td>

			              	<td>
			              	      {{ $post->title }}
			              	</td>
			              	 <td>Edit</td>
			              	 <td><a class="btn btn-xs btn-success" href="{{ route('posts.restore', ['id'=>$post->id]) }}">Restore</a>
			              	 </td>
			              	 <td><a class="btn btn-xs btn-danger" href="{{ route('post.kill', ['id'=>$post->id]) }}">Delete</a>
			              	 </td>

			              </tr>
			             

						   @endforeach

						@else

                                  <tr>
                                  	<th colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">No Trashed Post Here</th>
                                  </tr>

						@endif


						 
					</tbody>
				</thead>
			</table>
	 	</div>
	 </div>
	

@stop