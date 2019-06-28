@extends('layout')

@section('title','Accounts')

@section('title-content', 'All Types Accounts')
@section('content')
    <a class="btn btn-secondary btn-lg btn-block" href="{{route('type_account.create')}}">Add</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Id Type Account</th>
            <th scope="col">Description</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($accounts_types as $account_type)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$account_type->id_type_account}}</td>
                <td>{{$account_type->description_account}}</td>
                <td><a href="{{route('type_account.edit', $account_type->id_type_account)}}" class="btn btn-primary btn-sm">Edit</a></td>
                <td><form action="{{ route('type_account.destroy', $account_type->id_type_account) }}" method="POST">
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
