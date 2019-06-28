@extends('layout')

@section('title','Edit User')

@section('title-content')
    Edit user #{{$user_find->id_user}}
    @endsection

@section('content')
    <form action="{{route('user.update', $user_find->id_user)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label>User</label>
            <input type="text" value="{{$user_find->user_description}}" name="user_description" class="form-control" required placeholder="Enter new user description">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" value="{{$user_find->user_password}}" name="user_password" class="form-control" required placeholder="Enter new password">
        </div>
        <div class="form-group">
            <label>Account ID</label>
            <select class="form-control" name="account_id_account">
                @foreach($account_id as $accountcomment => $accountid)
                    <option value="{{$accountid}}" {{ ( $accountid == $user_find->account_id_account) ? 'selected' : '' }} >{{$accountcomment}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>User State</label>
            <select class="form-control" name="user_state_id_user_state">
                @foreach($user_state as $userstatedescription => $userstateid)
                    <option value="{{$userstateid}}" {{ ( $userstateid == $user_find->user_state_id_user_state) ? 'selected' : '' }} >{{$userstatedescription}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('user.index')}}" class="btn btn-danger">Return List</a>
    </form>
@endsection