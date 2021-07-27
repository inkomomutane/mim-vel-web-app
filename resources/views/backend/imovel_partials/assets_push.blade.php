@push('css')
    <link rel="stylesheet" href="{{ asset('backend/jquery-selectric/selectric.css') }}">
@endpush
@push('cssLibs')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/cropper/cropper.min.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/chocolat/dist/css/chocolat.css') }}">
@endpush
@push('jsLibs')
    <script src="{{ asset('backend/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('backend/cropper/cropper.min.js') }}"></script>
    <script src="{{ asset('backend/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
@endpush
@push('js')
@endpush
