@extends('layouts.app')



@section('content')




	 <div class="panel panel-default">
	 	<div class="panel-body">
	 		
			<table class="table table-hover">
		 		<thead>
					<th>Post Image</th>

					<th>Post Title</th>
					<th>Edit</th>
					<th>Trash</th>

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
			              	 <td>
			              	 	<a class="btn btn-primary" href="{{ route('posts.edit', ['id'=>$post->id]) }}">Edit</a>
			              	 </td>

			              	 <td><a class="btn btn-danger" href="{{ route('posts.delete', ['id'=>$post->id]) }}">Trash</a></td>

			              </tr>
			             

						 @endforeach

                          @else

                          <tr>
                          	<th colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">Post Create Not yet</th>
                          </tr>

                          @endif

					</tbody>
				</thead>
			</table>
	 	</div>
	 </div>
	

@stop