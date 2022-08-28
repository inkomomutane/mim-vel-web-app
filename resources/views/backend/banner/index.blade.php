@extends('backend.layouts.app')
@section('title', 'Banner\'s de publicidade')
@section('content')
    <div class="row mb-2 mb-xl-3">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible show fade mt-3" role="alert"
                style="border-left: 5px solid darkgreen;">
                <div class="alert-body">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ session('success') }}</strong>
                </div>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible show fade mt-3" role="alert"
                style="border-left: 5px solid rgb(145, 7, 7);">
                <div class="alert-body">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ session('error') }}</strong>
                </div>
            </div>
        @endif

        <div class="col-auto d-none d-sm-block">
            <a href="{{  url()->previous() }}" class="col-auto btn btn-info">
                <i class="align-middle" data-feather="corner-up-left"></i>&nbsp; Voltar
            </a>
        </div>
            <div class="col-auto ms-auto text-end mt-n1">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Upload_Image_form">
                    @svg('fluentui-image-multiple-28-o', 'feather align-middle')
                    Novo banner</a>
            </div>
    </div>
    <div class="row mb-2 mb-xl-3">
        @foreach ($images as $image)
            <div class="col-12 col-md-6 col-lg-3 rounded-3">
                <div class="card">
                    {{ $image->img('', ['class' => 'cover-image rounded-3', 'alt' => $image->name]) }}
                    <div class="card-header px-4 pt-4">
                        <div class="card-actions float-end">
                            <div class="dropdown position-relative">
                                <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-horizontal align-middle">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="19" cy="12" r="1"></circle>
                                        <circle cx="5" cy="12" r="1"></circle>
                                    </svg>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#"
                                        onclick="document.getElementById('image_{{ $image->id }}').submit()">
                                        <form action="{{ route('banner.destroy', ['media' => $image->id]) }}" method="post"
                                            id="image_{{ $image->id }}">@csrf @method('DELETE')</form>
                                        @svg('fluentui-delete-16', 'feather text-danger')
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                        <h5 class="card-title mb-0">{{ $image->name }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $images->links() }}
    </div>


    <!-- Modal -->
    <div class="modal fade" id="Upload_Image_form" tabindex="-1" aria-labelledby="Upload_Image_form_label"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novas images para banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('banner.store') }}" method="post"
                        id="form_upload_image" enctype="multipart/form-data">
                        @csrf
                        @livewire('upload-images')
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancelar</button>
                    <button type="button" class="btn btn-primary"
                        onclick="document.getElementById('form_upload_image').submit()">
                        @svg('fluentui-image-multiple-28-o', 'feather align-middle') Adicionar</button>
                </div>
            </div>
        </div>
    </div>


@endsection
