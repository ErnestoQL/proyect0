@extends('layout')

@section('title','Edit Type Account')

@section('title-content')
    Edit Type Account {{$findTypeAccount->id_type_account}}
@endsection

@section('content')
    <form action="{{route('type_account.update', $findTypeAccount->id_type_account)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label>Description</label>
            <input type="text" value="{{$findTypeAccount->description_account}}" name="description_account" class="form-control" required placeholder="Enter new Description">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('type_account.index')}}" class="btn btn-danger">Return List</a>
    </form>
@endsection
