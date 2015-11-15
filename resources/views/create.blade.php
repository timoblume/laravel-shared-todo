@extends('layouts.master')

@section('title', 'Create New Item')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h1>Create new item</h1>
			<form method="POST" action="/create">
		        {!! csrf_field() !!}

		        <div class="form-group">
		            <label for="item">Description</label>
		            <input type="text" id="item" name="item" class="form-control" value="{{ old('item') }}">
		        </div>
		        <div class="form-group">
		            <label for="effort">Effort</label>
		            <select name="points" id="effort" class="form-control">
		            	<option value="1">1</option>
		            	<option value="2">2</option>
		            	<option value="3">3</option>
		            </select>
		        </div>

		        <div>
		            <button type="submit" class="btn btn-primary">Create</button>
		        </div>
			</form>
		</div>
	</div>
</div>

@endsection