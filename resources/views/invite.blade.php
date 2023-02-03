@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Invite a user
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{ url('process_invite') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email address</label>
                                {{-- <input type="email" class="form-control" id="email" name="email"
                                    aria-describedby="emailHelp" placeholder="Enter email"> --}}

                                <select class="btn btn-light dropdown-toggle bg-gray-900" name="account_name"
                                    id="account_name">
                                    <option hidden>Choose Account Name</option>
                                    {{-- {{ $accounts }} --}}
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                                    @endforeach
                                </select>
                                <small id="email" class="form-text text-muted">We'll never share your email with anyone
                                    else.</small>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm">Send Invitation</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
