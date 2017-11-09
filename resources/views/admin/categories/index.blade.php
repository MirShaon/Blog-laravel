@extends('layouts.app')



@section('content')




	 <div class="panel panel-default">
	 	<div class="panel-body">
	 		
			<table class="table table-hover">
		 		<thead>
					<th>Category Name</th>

					<th>Editing</th>
					<th>Deleting</th>

					<tbody>

						@if($categories->count())
						 @foreach($categories as $category)

			              <tr>
			              	<td>
			              		{{ $category->name }}
			              	</td>

			              	<td>
			              	<a class="btn btn-info" href="{{ route('category.edit',['id'=>$category->id]) }}">
			              	
			              			<span class="glyphicon glyphicon-pencil"></span>
			              	</a>
			              	</td>
			              	<td>
			              	<a class="btn btn-danger" href="{{ route('category.delete',['id'=>$category->id]) }}">
			              	
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