@extends('layouts.master')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Welcome {{ auth()->user()->name }}</h1>
        <div>
            <a href="{{ route('contacts.create') }}" class="btn btn-primary">
                New Contact
            </a>
            <a class="btn btn-danger" href="{{ route('logout') }}">Log Out</a>
        </div>
    </div>
    <hr>
    <table class="table table-bordered">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('contacts.edit', $contact->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form class="d-inline" action="{{ route('contacts.delete', $contact->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-link text-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop