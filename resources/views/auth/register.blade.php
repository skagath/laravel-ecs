@extends('layouts.master')
@section('content')
    <h1>Register</h1>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            @if($errors->count() > 0)
            <div class="alert alert-danger">
                <ul>    
                    @foreach($errors->messages() as $error)
                        <li>{{ $error[0] }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('create_user') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" 
                        id="name" 
                        class="form-control"
                        value="{{  old('name') }}"
                    >
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control"
                        value="{{  old('email') }}"
                    >
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password" class="form-control">
                </div>

                <hr>
                <button class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
@endsection