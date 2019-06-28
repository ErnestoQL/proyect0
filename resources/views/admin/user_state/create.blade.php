@extends('layout')

@section('title','Create User State')

@section('title-content', 'Create User State')

@section('content')
    <form action="{{route('user_state.store')}}" method="POST">
        @csrf

        <div class="form-group">
            <label>ID</label>
            <input type="text" name="id_user_state" class="form-control" required placeholder="Enter ID XXXX">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" name="state_description" class="form-control" required placeholder="Enter Description">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('user_state.index')}}" class="btn btn-danger">Return List</a>
    </form>
@endsection
