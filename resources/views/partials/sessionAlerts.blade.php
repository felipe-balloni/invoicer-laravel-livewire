<div class="row">
    @if (session()->has('success'))
        <div class="alert alert-success col-md-4 mx-auto" role="alert">
            {{ session('success') }}
        </div>
    @elseif (session()->has('warning'))
        <div class="alert alert-warning col-md-4 mx-auto" role="alert">
            {{ session('warning') }}
        </div>
    @elseif (session()->has('danger'))
        <div class="alert alert-danger col-md-4 mx-auto" role="alert">
            {{ session('danger') }}
        </div>
    @elseif (session()->has('info'))
        <div class="alert alert-info col-md-4 mx-auto" role="alert">
            {{ session('info') }}
        </div>
    @elseif (session()->has('primary'))
        <div class="alert alert-primary col-md-4 mx-auto" role="alert">
            {{ session('primary') }}
        </div>
    @endif
</div>
