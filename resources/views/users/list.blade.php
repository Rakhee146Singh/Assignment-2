@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row-12">
                            {{-- <a href="{{ url('users/create') }}" class="btn btn-success float-right ">Add Users</a> --}}
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th>{{ $user->name }}</th>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="{{ url('users/edit', ['id' => $user->id]) }}"
                                                class="btn btn-info btn-sm">EDIT</a>

                                            <a href="{{ url('users/delete', $user->id) }}"
                                                class="btn btn-danger btn-sm">DELETE</a>
                                            <a href="{{ url('invite') }}" class="btn btn-primary btn-sm"> Add
                                                Users</a>
                                            {{-- /' . $id --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
