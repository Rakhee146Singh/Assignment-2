@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Account Details') }}</div>

                    <div class="card-body">
                        <form action="{{ url('accounts/update', $accounts->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="account_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Account Name') }}</label>

                                <div class="col-md-6">
                                    <input id="account_name" type="text"
                                        class="form-control @error('account_name') is-invalid @enderror" name="account_name"
                                        value="{{ $accounts->account_name }}" required autocomplete="account_name"
                                        autofocus>

                                    @error('account_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="amount"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Balance') }}</label>

                                <div class="col-md-6">
                                    <input id="amount" type="text"
                                        class="form-control @error('amount') is-invalid @enderror" name="amount"
                                        value="{{ $accounts->amount }}" required autocomplete="amount">

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
