@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}


                    <form action="" method="get" class="dropzone" id="upload"  enctype="multipart/form-data">


                        <input type="file" name="file" id="file" multiple>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
