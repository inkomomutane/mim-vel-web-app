@extends('layouts.backend.dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ URL::previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Adicionar um imóvel</h1>
            </div>
        </section>
        <div class="card">
            <div class="card-header">
                <h4>Write Your Post</h4>
            </div>
            <div class="card-body">
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                    <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric">
                            <option>Tech</option>
                            <option>News</option>
                            <option>Political</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                    <div class="col-sm-12 col-md-7">
                        <textarea class="summernote-simple"></textarea>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                    <div class="col-sm-12 col-md-7">
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control inputtags">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                    <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric">
                            <option>Publish</option>
                            <option>Draft</option>
                            <option>Pending</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Create Post</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection

@push('css')
   @endpush
@push('cssLibs')
<link rel="stylesheet" href="{{ asset('backend/summernote/summernote-bs4.css') }}">
@endpush
@push('jsLibs')

<script src="{{asset('backend/summernote/summernote-bs4.js')}}"></script>
<script src="{{asset('backend/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
<script src="{{asset('backend/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>

@endpush
@push('js')
@endpush
