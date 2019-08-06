@if(session()->has('success'))
    <div class="flash alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

@if(session()->has('error'))
    <div class="flash alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif

@if(session()->has('info'))
    <div class="flash alert alert-info">
        {{ session()->get('info') }}
    </div>
@endif