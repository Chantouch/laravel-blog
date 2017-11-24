@if (Session::has('success'))
    @component('components.alerts.dismissible', ['type' => 'success'])
      {{ Session::get('success') }}
    @endcomponent
@endif

@if (Session::has('warning'))
    @component('components.alerts.dismissible', ['type' => 'warning'])
      {{ Session::get('warning') }}
    @endcomponent
@endif

@if (Session::has('message'))
    @component('components.alerts.dismissible', ['type' => 'info'])
      {{ Session::get('message') }}
    @endcomponent
@endif

@if(Session::has('alert'))
    <div class="alert alert-success">
        {{ Session::get('alert') }}
        @php
            Session::forget('alert');
        @endphp
    </div>
@endif

@if (Session::has('errors'))
    @component('components.alerts.dismissible', ['type' => 'danger'])
        @if ($errors->count() > 1)
            {{ trans_choice('validation.errors', $errors->count()) }}
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @else
            {{ $errors->first() }}
        @endif
    @endcomponent
@endif
