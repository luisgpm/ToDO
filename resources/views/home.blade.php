@extends('layouts.app')

@section('content')
	<div class="card w-75  mx-auto" >

	  <div class="card-header d-flex justify-content-between align-items-center">
	  	<h3 class="d-flex">ToDo List</h3>
		<form class="d-flex w-50" id="form-alta">
			@csrf
	        @method('POST')
	    	<div class="input-group mb-3 d-flex">
	    			<input type="text" name="actividad" class="form-control " placeholder="Actividad">
	    			<input type="number" value="0" hidden name="status" class="form-control">
	    			<input type="number" value="{{Auth::user()->id}}" hidden name="user_id" class="form-control">
		  			<button type="submit" class="btn btn-outline-secondary" type="button">Button</button>
			</div>
	    </form>
	  </div>
	  <div class="card-body">
	  	<div class="container">
	  		<table class="table table-striped">
		  		<thead>
	  			 	<tr>
	  			 		<th></th>
	  			 		<th>Descripcion</th>
	  			 		<th class="text-end">Acciones</th>
	  			 	</tr>
		  		</thead>
		  		<tbody>
	  			 	@foreach($activities as $activity)
		  			 	<tr>
		  			 		<td>
		  			 			<form id="editActivity{{$activity->id}}" class="editForm" data-id="{{$activity->id}}">
									@csrf
							        @method('PATCH')
							    	<div class="input-group mb-3 d-flex">
							    			<input  type="hidden" name="id" id="idEdit" value="{{$activity->id}}" data-id="{{$activity->id}}">
								  			<button type="submit" class="btn btn-outline-success" type="button">
								  				@if($activity->status == 0)
								  					<i class="fa-regular fa-square-check fa-xl"></i>
								  				@else
								  					<i class="fa-solid fa-square-check fa-xl"></i>
								  				@endif
								  			</button>
									</div>
							    </form>
		  			 		</td>
		  			 		<td>{{$activity->actividad}}</td>
		  			 		<td class="d-flex justify-content-end">
		                        <form method="POST" action="{{route('activity.destroy', $activity)}}">
		                            @csrf
		                            @method('DELETE')
		                            <button type="submit" class="btn btn-outline-danger float-right m-1">
		                                <i class="fa-solid fa-trash fa-xl"></i>
		                            </button>
		                        </form>			
		  			 		</td>
		  			 	</tr>
	  			 	@endforeach
	  			</tbody>
		</table>
	  	</div>
	  </div>
	</div>


@endsection