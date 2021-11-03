<div class="row">
    <div class="col-md-6">
    </div>
    <div class="col-md-6">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-error">
                    {{ session()->get('error') }}
                </div>
             @endif
    </div>
</div>
