@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Transactions Details') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ url('save-account') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="date" class="col-md-4 col-form-label text-md-end">{{ __('Date') }}</label>

                                <div class="col-md-6">
                                    <input id="date" type="date"
                                        class="form-control @error('date') is-invalid @enderror" name="date"
                                        value="{{ old('date') }}" required autocomplete="date">

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
                                        <select class="form-control" name="account_name" id="account_name">
                                            <option hidden>Choose Account Name</option>
                                            {{-- {{ $accounts }} --}}
                                            @foreach ($accounts as $account)
                                                <option value="{{ $account->id }}">{{ $account->account_name }}</option>
                                            @endforeach
                                        </select>

                                        @error('account_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="type"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Type Name') }}</label>

                                    <div class="col-md-6">
                                        {{-- <input id="type" type="text"
                                            class="form-control @error('type') is-invalid @enderror" name="type"
                                            value="{{ old('type') }}" required autocomplete="type"> --}}

                                        <input type="radio" name="Income" value="Income">Income
                                        <input type="radio" name="Expense" value="Expense">Expense
                                        <input type="radio" name="Transfer" value="Transfer">Transfer

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
                                            value="{{ old('category') }}" required autocomplete="category">

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
                                            value="{{ old('amount') }}" required autocomplete="amount">

                                        @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                            {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
