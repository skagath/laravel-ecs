@extends('layouts.master')
@section('content')
    <h1>Edit contact</h1>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                @method('PUT')
                @include('contacts._form')
                <hr>
                <button class="btn btn-primary">Update contact</button>
                <a href="{{ route('contacts') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection