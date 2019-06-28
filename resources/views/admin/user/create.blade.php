@extends('layout')

@section('title','Create User')

@section('title-content', 'Create User')

@section('content')

    <form action="{{route('user.store')}}" method="POST">
        @csrf

        <div class="form-group">
            <label>ID</label>
            <input type="text" name="id_user" class="form-control" required placeholder="Enter user id XXXX">
        </div>
        <div class="form-group">
            <label>User</label>
            <input type="text" name="user_description" class="form-control" required placeholder="Enter user description">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="user_password" class="form-control" required placeholder="Password">
        </div>
        <div class="form-group">
            <label>Account ID</label>
            <select class="form-control" name="account_id_account">
                @foreach($account_id as $accountcomment => $accountid)
                    <option value="{{$accountid}}">{{$accountcomment}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>User State</label>
            <select class="form-control" name="user_state_id_user_state">
                @foreach($user_state as $userstatedescription => $userstateid)
                    <option value="{{$userstateid}}">{{$userstatedescription}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('user.index')}}" class="btn btn-danger">Return List</a>
    </form>
@endsection
