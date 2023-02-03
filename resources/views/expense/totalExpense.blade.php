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
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="cols">Id</th>
                                    <th scope="cols">Account Name</th>
                                    <th scope="cols">Date</th>
                                    <th scope="cols">Type</th>
                                    <th scope="cols">category</th>
                                    <th scope="cols">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accounts as $account)
                                    @foreach ($account->expenses as $expense)
                                        <tr>
                                            <td>{{ $account->id }}</td>
                                            <td>{{ $account->account_name }}</td>
                                            <td> {{ $expense->date }} </td>
                                            <td> {{ $expense->type }} </td>
                                            <td> {{ $expense->category }} </td>
                                            <td> {{ $expense->amount }} </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
