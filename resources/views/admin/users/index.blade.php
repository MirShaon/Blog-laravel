@extends('layouts.app')



@section('content')




	 <div class="panel panel-default">
	 	<div class="panel-body">
	 		
			<table class="table table-hover">
		 		<thead>
					<th>User Image</th>

					<th>User Name</th>
					<th>Permissions</th>
					<th>Delete</th>

					<tbody>
                       @if($users->count()>0)

						 @foreach($users as $user)

		              <tr>
		              	<td>
		              		<img style="width: 60px;height: 60px;border-radius: 50%;" src="{{ asset($user->profile->avatar) }}" alt="">
		              	</td>
		              	  <td>
		              	  	{{ $user->name }}
		              	  </td>
		              	  <td>
		              	  	    @if($user->admin)
		              	  	    <a href="{{ route('user.not_admin', ['id'=>$user->id]) }}" class="btn btn-xs btn-danger">Remove Admin</a>
 
		              	  	    @else

		              	  	    <a href="{{ route('user.admin', ['id'=>$user->id]) }}" class="btn btn-xs btn-success">Make Admin</a>
  
		              	  	    @endif
		              	  </td>
		              	  
		              	  	<td>
                              @if(Auth::id() !== $user->id)
                                    <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">Delete</a>
                              @endif
                              </td>

		              	  	
		              	 

		              	

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