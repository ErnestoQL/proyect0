@extends('layout')

@section('title','Create Type Account')

@section('title-content', 'Create Type Account')

@section('content')
    <form action="{{route('type_account.store')}}" method="POST">
        @csrf

        <div class="form-group">
            <label>ID</label>
            <input type="text" name="id_type_account" class="form-control" required placeholder="Enter type account id XXXX">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" name="description_account" class="form-control" required placeholder="Enter Description">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('type_account.index')}}" class="btn btn-danger">Return List</a>
    </form>
@endsection
