@extends('layout')

@section('title','Update Account')

@section('title-content')
    Update Account {{$account_find->id_account}}
    @endsection

@section('content')
    <form action="{{route('account.update', $account_find->id_account)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label>Comments</label>
            <input type="text" value="{{$account_find->comments}}" name="comments" class="form-control" required placeholder="Enter new comment">
        </div>
        <div class="form-group">
            <label>Attorney ID</label>
            <input type="text" value="{{$account_find->attorney_id_attorney}}" name="attorney_id_attorney" class="form-control" required placeholder="Enter new attorney id">
        </div>
        <div class="form-group">
            <label>Client ID</label>
            <input type="text" value="{{$account_find->client_id_client}}" name="client_id_client" class="form-control" required placeholder="Enter New Client ID">
        </div>
        <div class="form-group">
            <label>Type Account</label>
            <select class="form-control" name="type_account_id_type_account">
                @foreach($type_account as $descriptionaccount => $idtype)
                    <option value="{{$idtype}}" {{ ( $idtype == $account_find->type_account_id_type_account) ? 'selected' : '' }} >{{$descriptionaccount}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('account.index')}}" class="btn btn-danger">Return List</a>
    </form>
@endsection
