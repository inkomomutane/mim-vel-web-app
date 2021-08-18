@push('css')
    <link rel="stylesheet" href="{{ asset('backend/jquery-selectric/selectric.css') }}">
@endpush
@push('cssLibs')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/cropper/cropper.min.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/chocolat/dist/css/chocolat.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/jquery-selectric/selectric.css') }}">

@endpush

@push('jsLibs')
    <script src="{{ asset('backend/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('backend/cropper/cropper.min.js') }}"></script>
    <script src="{{ asset('backend/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ asset('backend/jquery-selectric/jquery.selectric.min.js') }}"></script>
@endpush
@push('js')
    <script>
         $('#cidade_id').on('selectric-select', function(event,element,selectric) {
            $('#bairro_id').empty();
            $('#bairro_id').selectric('init');

            var opt = '<option disabled> </option>';
            $('#bairro_id').prepend(opt);

             $.ajax({
                 type: "get",
                 url: "{{ asset('/cidade') }}/" +element.value,
                 dataType: "json",
                 success: function (response) {
                    $('#bairro_id').empty();
                    var options = '<option disabled> </option>';
                    response.bairros.forEach(element => {
                        options += '<option value = "'+ element.id +'">'+ element.nome +'</option>';
                    });
                    $('#bairro_id').prepend(options);
                    $('#bairro_id').selectric('refresh');
                 }
             });

        });
    </script>
@endpush
