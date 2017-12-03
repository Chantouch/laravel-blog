@component('mail::message')
    # Received message

    ## Dear Admin

    You recently received a message from : {{ $feedback['name'] }}

    Name: {{ $feedback['name'] }}

    Email: {{ $feedback['email'] }}

    Message: {{ $feedback['message'] }}

    @component('mail::button', ['url' => route('home')])
        Back Home
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent