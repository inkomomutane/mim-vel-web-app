<div class="main-content">

    @if (session('success'))
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert"><span>×</span></button>
            <strong>{{ session('success') }}</strong>
        </div>
    </div>
    @endif
    @if (session('errors'))
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert"><span>×</span></button>
            @error('nome')
                <strong>{{ $message }}</strong>
        @enderror
        </div>
    </div>
    @endif



    <section class="section">
        <div class="section-body">
            @yield('content')
        </div>
    </section>
</div>
