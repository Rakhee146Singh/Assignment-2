@component('mail::message')
    #{{ $data['name'] }}

    Welcome to Expense Manager

    This is to invite you through email regarding payment.
    {{ $data['verification_token'] }}
    @component('mail::button', ['url' => 'http://localhost:8000/verification/' . $data['verification_token']])
        Accept Invitation
    @endcomponent

    Thanks,

    {{ config('app.name') }}
@endcomponent
