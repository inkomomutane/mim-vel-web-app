@extends('layouts.backend.dashboard')
@push('css')
    <style>
        @font-face {
            font-family: 'Ubuntu';
            src: url("{{ asset('frontend/errors/fonts/ubuntu.ttf') }}") format('truetype'), ;
            font-weight: normal;
            font-style: normal;
        }

        .btn {
            font-family: 'Ubuntu';
            font-weight: 500 !important;
        }

    </style>
@endpush
@section('sessions')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert"><span>×</span></button>
                <strong>{{ session('success') }}</strong>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert"><span>×</span></button>
                <strong>{{ session('error') }}</strong>
            </div>
        </div>
    @endif
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <section class="section">
                <div class="section-header">
                    <div class="section-header-back">
                        <a href="{{ route('weblink.index') }}" class="btn btn-icon btn-light"><i
                                class="fas fa-arrow-left"></i>
                            Voltar</a>
                    </div>
                </div>

                <div class="row container justify-content-start">
                    <div class="form-group col-sm-12 row">
                        <form action="{{ route('weblink.update', $weblink->id) }}" method="post"
                            class="row container col-sm-10">
                            @csrf
                            @method('PATCH')
                            <input type="text" name="url" id="" class="form-control col-sm-4 p-2 m-2" placeholder="Url"
                                value="{{ $weblink->url }}">
                            <input type="text" name="icon" id="" class="form-control col-sm-4 p-2 m-2" placeholder="icon"
                                value="{{ $weblink->icon }}">
                            <input type="submit" value="Update" class="btn btn-success col-sm-3 p-2 m-2">

                        </form>
                    </div>
                </div>


            </section>

            <div class="card">
                <form action="{{ route('weblink.store_image', $weblink->id) }}" method="post" id="store_image">
                    @csrf
                    <input type="text" alt="" hidden name="default_image_link" id="weblink_image_preview_input" value="">
                </form>
                <div class="card-header">
                    <h4><strong>Galeria</strong></h4>

                    <div class="card-header-action">
                        <button class="btn btn-danger mx-2" id="delete_selected_images"><i class="fas fa-trash"></i> <span>
                                Apagar
                                selecionadas</span></button>
                        <input type="file" class="btn btn-info mx-2" id="upload_image" placeholder="">
                    </div>

                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row gutters-sm">
                            <form class="row col-sm-12" action="{{ route('weblink.delete_image', $weblink->id) }}"
                                method="post" id="delete_image">
                                @csrf
                                @foreach ($weblink->fotos as $foto)
                                    <div class="col-sm-3">
                                        <label class="imagecheck mb-4">
                                            <input name="{{ $foto->id }}" type="checkbox" value="{{ $foto->url }}"
                                                class="imagecheck-input" name="{{ $foto->url }}" />
                                            <figure class="imagecheck-figure">
                                                <img src="{{ asset('storage') }}/{{ $foto->url }}"
                                                    alt="{{ $foto->url }}" class="imagecheck-image">
                                            </figure>
                                        </label>
                                    </div>
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('modals')
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg w-100" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crop Image Before Upload</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row container">
                            <div class="col-md-12">
                                <img src="" id="sample_image" height="420px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="crop" class="btn btn-primary">Crop</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('backend.imovel_partials.assets_push')
@push('js')
    <script>
        $(document).ready(function() {

            var $modal = $('#modal');

            var image = document.getElementById('sample_image');

            var cropper;

            $('#upload_image').change(function(event) {
                var files = event.target.files;

                var done = function(url) {
                    image.src = url;
                    $modal.modal('show');
                };

                if (files && files.length > 0) {
                    reader = new FileReader();
                    reader.onload = function(event) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(files[0]);
                }
            });

            $modal.on('shown.bs.modal', function() {
                cropper = new Cropper(image, {
                    aspectRatio: 17 / 9,
                    viewMode: 3,
                });
            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            });
            $('#crop').click(function() {
                canvas = cropper.getCroppedCanvas({
                    width: 3072,
                });

                canvas.toBlob(function(blob) {
                    url = URL.createObjectURL(blob);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function() {
                        var image = reader.result;
                        //var data = $('#weblink_image_preview');
                        var data_file = $('#weblink_image_preview_input');
                        //data[0].src = image;
                        data_file[0].value = image;

                        console.log(data_file);
                        $('#store_image').submit();
                        $('#modal').modal('toggle');
                    };
                });
            });
        });

        $(function() {
            $('#delete_selected_images').on('click', function() {
                $('#delete_image').submit();
            });
        });
    </script>
@endpush
