@extends('layout')

@section('title','Users')

@section('title-content', 'All Users')
@section('content')
    <a class="btn btn-secondary btn-lg btn-block" href="{{route('user.create')}}">Add new</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Id User</th>
            <th scope="col">User description</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Account ID</th>
            <th scope="col">User State</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$user->id_user}}</td>
            <td>{{$user->user_description}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
            <td>{{$user->comment}}</td>
            <td>{{$user->state_description}}</td>
            <td><a href="{{route('user.edit', $user->id_user)}}" class="btn btn-primary btn-sm">Edit</a></td>
            <td><form action="{{ route('user.destroy', $user->id_user) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger btn-sm"type="submit">Delete</button>
                </form></td>
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
