@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h1>Login</h1>
            <form method="POST" action="/auth/login">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>

                <div class="form-group">
                    <input type="checkbox" name="remember"> Remember Me
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>  
</div>
@endsection

