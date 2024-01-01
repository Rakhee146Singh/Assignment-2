@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Transactions Details') }}</div>

                    <div class="card-body">
                        <form action="{{ url('expense/update', $expenses->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="date" class="col-md-4 col-form-label text-md-end">{{ __('Date') }}</label>

                                <div class="col-md-6">
                                    <input id="date" type="date"
                                        class="form-control @error('date') is-invalid @enderror" name="date"
                                        value="{{ $expenses->date }}" required autocomplete="date">

                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <br>
                                <div class="row mb-3">
                                    <label for="account_name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Account Name') }}</label>

                                    <div class="col-md-6">
                                        {{-- <select class="form-control" name="account_name" id="account_name">
                                            <option hidden>Choose Account Name</option>
                                            {{-- {{ $accounts }} --}}
                                        {{-- @foreach ($accounts as $account)
                                                <option value="{{ $account->id }}">{{ $account->account_name }}</option>
                                            @endforeach
                                        </select> --}}
                                        <input id="account_name" type="text"
                                            class="form-control @error('account_name') is-invalid @enderror"
                                            name="account_name" value="{{ $expenses->account_id }}" required
                                            autocomplete="account_name">


                                        @error('account_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="type"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Transfer Type') }}</label>

                                    <div class="col-md-6">
                                        <input id="type" type="text"
                                            class="form-control @error('type') is-invalid @enderror" name="type"
                                            value="{{ $expenses->type }}" required autocomplete="type">

                                        @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="category"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>

                                    <div class="col-md-6">
                                        <input id="category" type="text"
                                            class="form-control @error('category') is-invalid @enderror" name="category"
                                            value="{{ $expenses->category }}" required autocomplete="category">

                                        @error('category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="amount"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Amount') }}</label>

                                    <div class="col-md-6">
                                        <input id="amount" type="text"
                                            class="form-control @error('amount') is-invalid @enderror" name="amount"
                                            value="{{ $expenses->amount }}" required autocomplete="amount">

                                        @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
