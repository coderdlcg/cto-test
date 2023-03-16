@if ($message = Session::get('success'))
    <x-flash-message :status="'success'" :message="$message" />
@endif

@if ($message = Session::get('error'))
    <x-flash-message :status="'error'" :message="$message" />
@endif

@if ($message = Session::get('warning'))
    <x-flash-message :status="'warning'" :message="$message" />
@endif

@if ($message = Session::get('info'))
    <x-flash-message :status="'info'" :message="$message" />
@endif
