@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
	<div class="container">
	    <h1>Todo List App</h1>
	    <p>Try not to forget things by putting them in here!</p>
		<a href="{{ url('auth/login')}}" class="btn btn-primary">Login</a>
		<a href="{{ url('auth/register')}}" class="btn btn-warning">Register</a>
	</div>

@endsection

