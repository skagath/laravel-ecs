@extends('layouts.master')
@section('content')
<h1>Welcome to contacts app in laravel.</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate nesciunt maxime voluptatem laborum et, sequi, delectus praesentium quo tempora neque reiciendis officia corporis, reprehenderit numquam. Ea natus iste accusamus alias!</p>
<a href="{{ route('login') }}" class="btn btn-primary">Login</a>
<a href="{{ route('register') }}" class="btn btn-primary">Register</a>
@endsection