@extends('layout')

@section('title','Edit User State')

@section('title-content')
    Edit User State {{$findUserState->id_user_state}}
@endsection
@section('content')
    <form action="{{route('user_state.update', $findUserState->id_user_state)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label>Description</label>
            <input type="text" value="{{$findUserState->state_description}}" name="state_description" class="form-control" required placeholder="Enter new Description">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('user_state.index')}}" class="btn btn-danger">Return List</a>
    </form>
@endsection
