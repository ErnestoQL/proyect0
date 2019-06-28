@extends('layout')

@section('title','Account Setup')

@section('title-content', 'All Accounts')
@section('content')
    <a class="btn btn-secondary btn-lg btn-block" href="{{route('account.create')}}">Add</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Id Account</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Comments</th>
            <th scope="col">Attorney ID</th>
            <th scope="col">Client ID</th>
            <th scope="col">Type Account ID</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($accounts as $account)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$account->id_account}}</td>
                <td>{{$account->created_at}}</td>
                <td>{{$account->updated_at}}</td>
                <td>{{$account->comments}}</td>
                <td>{{$account->attorney_id_attorney}}</td>
                <td>{{$account->client_id_client}}</td>
                <td>{{$account->description}}</td>
                <td><a href="{{route('account.edit', $account->id_account)}}" class="btn btn-primary btn-sm">Edit</a></td>
                <td><form action="{{ route('account.destroy', $account->id_account) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger btn-sm"type="submit">Delete</button>
                    </form></td>
            </tr>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if(session()->get('success'))
        <script>
            toastr.success(' {{ session()->get('success') }} ')
        </script>

        </div>
    @endif
@endsection
