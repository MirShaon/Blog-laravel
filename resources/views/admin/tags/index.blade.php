@extends('layouts.app')



@section('content')




	 <div class="panel panel-default">
	 	<div class="panel-body">
	 		
			<table class="table table-hover">
		 		<thead>
					<th>Tag Name</th>

					<th>Editing</th>
					<th>Deleting</th>

					<tbody>

						@if($tags->count())
						 @foreach($tags as $tag)

			              <tr>
			              	<td>
			              		{{ $tag->tag }}
			              	</td>

			              	<td>
			              	<a class="btn btn-info" href="{{ route('tag.edit',['id'=>$tag->id]) }}">
			              	
			              			<span class="glyphicon glyphicon-pencil"></span>
			              	</a>
			              	</td>
			              	<td>
			              	<a class="btn btn-danger" href="{{ route('tag.delete',['id'=>$tag->id]) }}">
			              	
			              			Delete
			              	</a>
			              	</td>

			              </tr>
			             

						 @endforeach

						 @else 
                              <tr>
                              	<th colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">
                              		No Category Create yet 
                              	</th>
                              </tr>

						 @endif
					</tbody>
				</thead>
			</table>
	 	</div>
	 </div>
	

@stop