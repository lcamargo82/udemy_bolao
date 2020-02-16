@if ($msg)
    @php
        if($status == 'error') {
            $status = 'danger';
        } elseif ($status == 'notification') {
            $status = 'warning';
        } else {
            $status = 'success';
        }
    @endphp
    <div class="alert alert-{{ $status }}" role="alert">
        {{ $msg }}
    </div>
@endif
