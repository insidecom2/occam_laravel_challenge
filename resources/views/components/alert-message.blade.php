@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show position-absolute top-0 end-0 m-3 col-10 col-md-4"
        style="z-index: 5000" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif (session('error'))
    <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 end-0 m-3 col-10 col-md-4"
        style="z-index: 5000" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
