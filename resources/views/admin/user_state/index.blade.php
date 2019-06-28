@extends('layout')

@section('title','Users States')

@section('title-content', 'All Users States')
@section('content')
    <a class="btn btn-secondary btn-lg btn-block" href="{{route('user_state.create')}}">Add</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Id User State</th>
            <th scope="col">Description</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users_states as $user_state)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$user_state->id_user_state}}</td>
                <td>{{$user_state->state_description}}</td>
                <td><a href="{{route('user_state.edit', $user_state->id_user_state)}}" class="btn btn-primary btn-sm">Edit</a></td>
                <td><form action="{{ route('user_state.destroy', $user_state->id_user_state) }}" method="POST">
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
