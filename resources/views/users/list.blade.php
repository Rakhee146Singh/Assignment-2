@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row-12">
                            {{-- @if (auth()->user()->accounts()->withPivot(['is_admin' == 1]))
                                print_r(Active auth()->user());
                            @else
                                InActive;
                            @endif --}}
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
                                    {{-- {{ $user }} --}}
                                    <tr>
                                        <th>{{ $user->account_name }}</th>
                                        @foreach ($user->users as $ac)
                                            <td>{{ $ac->email }}</td>
                                        @endforeach
                                        <td>
                                            <a href="{{ url('users/edit', ['id' => $user->id]) }}"
                                                class="btn btn-info btn-sm">EDIT</a>

                                            <a href="{{ url('users/delete', $user->id) }}"
                                                class="btn btn-danger btn-sm">DELETE</a>
                                            <a href="{{ url('invite/' . $id) }}" class="btn btn-primary btn-sm"> Add
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
