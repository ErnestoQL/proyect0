@extends('layout')

@section('title','Create Account')

@section('title-content', 'Create Account')

@section('content')
    <form action="{{route('account.store')}}" method="POST">
        @csrf

        <div class="form-group">
            <label>ID</label>
            <input type="text" name="id_account" class="form-control" required placeholder="Enter user id XXXX">
        </div>
        <div class="form-group">
            <label>Comments</label>
            <input type="text" name="comments" class="form-control" required placeholder="Enter comment">
        </div>
        <div class="form-group">
            <label>Attorney ID</label>
            <input type="text" name="attorney_id_attorney" class="form-control" required placeholder="Enter Attorney ID">
        </div>
        <div class="form-group">
            <label>Client ID</label>
            <input type="text" name="client_id_client" class="form-control" required placeholder="Enter client id">
        </div>
        <div class="form-group">
            <label>Type Account</label>
            <select class="form-control" name="type_account_id_type_account">
                @foreach($type_account as $descriptionaccount => $idtype)
                    <option value="{{$idtype}}">{{$descriptionaccount}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('account.index')}}" class="btn btn-danger">Return List</a>
    </form>
@endsection
