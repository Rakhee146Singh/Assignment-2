@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{-- <div class="card-header">{{ __('User Profile') }}</div> --}}

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- {{ __('You are logged in!') }} --}}

                        <!-- Content Wrapper. Contains page content -->
                        <div class="content-wrapper-fluid">
                            <!-- Content Header (Page header) -->
                            <section class="content-header-fluid">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                            <h1>User Profile</h1>
                                        </div>
                                        {{-- <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <a href="{{ url('accounts/create') }}"
                                                    class="btn btn-success float-right">Add Accounts</a>
                                                {{-- <li class="breadcrumb-item active"></li>
                                        </ol> --}}
                                    </div>
                                </div>
                        </div><!-- /.container-fluid -->
                        </section>

                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                <div class="col-md-6">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                {{ $name }}
                                            </h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="inputName">User Name</label>
                                                <input type="text" id="inputName" class="form-control"
                                                    placeholder="  {{ $name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputDescription">Email</label>
                                                <input type="text" id="inputDescription" class="form-control"
                                                    placeholder="  {{ $email }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="account_name">Account</label>
                                                <input type="text" id="account_name" name="account_name"
                                                    class="form-control" placeholder="  {{ 'account_name' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="amount">Balance</label>
                                                <input type="text" id="amount" name="amount" class="form-control"
                                                    placeholder="  {{ 'amount' }}">
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>

                        </section>
                        <!-- /.content -->
                    </div>
                    <!-- /.content-wrapper -->
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
