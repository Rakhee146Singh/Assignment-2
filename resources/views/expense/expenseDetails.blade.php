@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row-12">
                            <a href="{{ url('create') }}" class="btn btn-success float-right">Add Transactions</a>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Transfer Type</th>
                                    <th scope="col">Opponent ID</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenses as $expense)
                                    <tr>
                                        <th>{{ $expense->date }}</th>
                                        <td>{{ $expense->type }}</td>
                                        <td>{{ $expense->transfer_type }}</td>
                                        <td>{{ $expense->opponent_name }}</td>
                                        <td>{{ $expense->category }}</td>
                                        <td>{{ $expense->amount }}</td>
                                        <td>
                                            <a href="{{ url('expense/edit', ['id' => $expense->id]) }}"
                                                class="btn btn-info btn-sm">EDIT</a>

                                            <a href="{{ url('expense/delete', $expense->id) }}"
                                                class="btn btn-danger btn-sm">DELETE</a>
                                            {{-- <a href="{{ url('invite') }}" class="btn btn-success float-right ">Invite</a> --}}
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
