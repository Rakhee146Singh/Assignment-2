@extends('layouts.main')

@section('content')
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <style type="text/css">
        .select {
            display: none;
            width: 60%;
        }

        label {
            margin-right: 20px;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Transactions Details') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ url('save-account') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="date"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Date') }}</label>

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
                            </div>
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
                                    <label>
                                        <input type="radio" name="type" value="income"> Income</label>
                                    <label>
                                        <input type="radio" name="type" value="expense"> Expense</label>
                                    <label>
                                        <input type="radio" name="type" value="transfer"> Transfer</label>
                                    <div class="transfer select">
                                        <label><input type="radio" name="transfer_type" value="credit">Credit</label>
                                        <div class="credit select">
                                        </div>
                                        <label><input type="radio" name="transfer_type" value="debit">Debit</label>
                                        <div class="debit select">
                                        </div>
                                        <select class="form-control" name="opponent_name" id="opponent_name">
                                            <option hidden></option>
                                            {{-- {{ $accounts }} --}}
                                            @foreach ($accounts as $account)
                                                <option value="{{ $account->id }}">{{ $account->account_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('input[type="radio"]').click(function() {
                                            var inputValue = $(this).attr("value");
                                            var targetBox = $("." + inputValue);
                                            // $(".select").not(targetBox).hide();
                                            $(targetBox).show();
                                        });
                                    });
                                </script>
                            </div>

                            <div class="row mb-3">
                                <label for="category"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>

                                <div class="col-md-6">
                                    <input id="category" type="text"
                                        class="form-control @error('category') is-invalid @enderror" name="category"
                                        value="{{ old('category') }}" required autocomplete="category">
                                    {{-- <div class="col-md-6">
                                        <select class="form-control" name="category_name" id="category_name">
                                            <option hidden>Choose Category Name</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                    </select> --}}
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
