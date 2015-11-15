@extends('layouts.master')

@section('title', 'Your List')

@section('content')
	<div class="container">
	    <h1>Todo List App</h1>
	    <p>Try not to forget things by putting them in here!</p>

		@if (Auth::check())

		<a href="{{ url('create') }}" class="btn btn-primary">Create new Task</a>
		<table class="table table-bordered">
	      <thead>
	        <tr>
	          <th>#</th>
	          <th>Description</th>
	          <th>Created At</th>
	          <th>Points</th>
	          <th>Done</th>
	        </tr>
	      </thead>
	      <tbody>
		      @foreach ($items as $key => $item)
		      	<form action="/" method="post">
		      	{!! csrf_field() !!}
		    	<tr>

		          <th scope="row">{{ $key+1 }}</th>
		          <td>{{ $item->description }}</td>
		          <td>
					<?php $id = $item->owner;
			    		foreach($userlist as $user_instance){
			    			if($user_instance->id == $id){
			    				echo $user_instance->name;
			    			}
			    		}
			    	 ?>
		          </td>
		          <td>{{ $item->points }}</td>
		          <td><input type="checkbox" class="checkbox" onClick="this.form.submit()" {{ $item->done ? 'checked' : '' }}></td>

		        </tr>
		        <input type="hidden" name="id" value="{{ $item->id }}">
		        </form>
			  @endforeach        
	      </tbody>
	     </table>

	     <a href="{{ url('delete') }}" class="btn btn-danger">Delete Done</a>
	     <h2>Ranking</h2>
	     <table class="table table-bordered">
	      <thead>
	        <tr>
	          <th>Rank</th>
	          <th>Name</th>
	          <th>Score</th>
	        </tr>
	      	</thead>
	      	<tbody>
				@foreach ($userlist as $key => $winner)
					<tr>
						<th scope="row">{{ $key+1 }}</th>
						<td>{{ $winner->name }}</td>
						<td>{{ $winner->points }}</td>
					</tr>
				@endforeach
			</tbody>
	     </table>
		@endif
	</div>
@endsection
















