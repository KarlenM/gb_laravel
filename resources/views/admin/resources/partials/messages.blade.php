@if(session())
    @if(session()->has('success'))
        <div class="alert alert-success merge">
            {{ session()->get('success') }}
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger merge">
            {{ session()->get('error') }}
        </div>
    @endif
@endif