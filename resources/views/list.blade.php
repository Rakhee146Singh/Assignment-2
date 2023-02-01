@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Add Accounts Details') }}</div> --}}

                    <div class="card-body">
                        {{-- <form method="POST" action="{{ url('accountDetails') }}">
                            @csrf
                        </form> --}}
                        <div class="row-12">
                            {{-- <a href="{{ url('accounts/create') }}" class="btn btn-success float-right">Add Accounts</a> --}}
                            {{-- <input type="submit" value="ADD ACCOUNT" class="btn btn-success float-right"> --}}
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">ID</th> --}}
                                    <th scope="col"> Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Actions</th>
                                    <th scope="col">Users Management</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($users as $user) --}}
                                <tr>
                                    <th>{{ $user->name }}</th>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ url('edit', ['id' => $user->id]) }}"
                                            class="btn btn-info btn-sm">EDIT</a>
                                        <a href="{{ url('delete', ['id' => $user->id]) }}"
                                            class="btn btn-danger btn-sm">DELETE</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('accounts') }}" class="btn btn-success btn-sm">User
                                            Account</a>

                                        {{-- <a href="{{ url('expense/transactions') }}"
                                                class="btn btn-primary btn-sm">Transactions</a> --}}
                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
