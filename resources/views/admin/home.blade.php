@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Welcome to {{ auth::user()->name }}'s Dashboard!</h1>
                    <h4>User ID: {{ auth::id() }}</h4>
                </div>

                <div class="card-body">
                    <h2>Available operations:</h2>
                    <ul>
                        <li> <a href="#">Placeholder</a> </li>
                        <li><a href="#">Placeholder</a></li>
                        <li><a href="#">Placeholder</a></li>
                        <li><a href="#">Placeholder</a></li>
                        <li><a href="#">Placeholder</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
