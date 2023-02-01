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
                            <a href="{{ url('accounts/create') }}" class="btn btn-success float-right">Add
                                Accounts</a>
                            {{-- <input type="submit" value="ADD ACCOUNT" class="btn btn-success float-right"> --}}
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">ID</th> --}}
                                    <th scope="col">Account Name</th>
                                    <th scope="col">Balance</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accounts as $account)
                                    <tr>
                                        <th>{{ $account->account_name }}</th>
                                        <td>{{ $account->amount }}</td>
                                        <td>
                                            <a href="{{ url('accounts/edit', ['id' => $account->id]) }}"
                                                class="btn btn-info btn-sm">EDIT</a>
                                            {{-- <form method="POST" action="{{ url('delete', $account->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm_task"
                                                    data-toggle="tooltip" title='Delete'>Delete</button>
                                            </form> --}}
                                            <a href="{{ url('accounts/delete', $account->id) }}"
                                                class="btn btn-danger btn-sm">DELETE</a>

                                            <a href="{{ url('expense') }}" class="btn btn-primary btn-sm">Transactions</a>
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
