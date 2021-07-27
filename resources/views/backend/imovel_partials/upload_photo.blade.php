<div class="form-group row container mb-4">
    <div class="col-sm-10">
        <div class="section-title">Imagem do imóvel</div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="upload_image">
            <label class="custom-file-label" for="upload_image">Escolher Imagem</label>
        </div>
    </div>
    <div class="col-sm-10">
        <div class="py-2 ">
                 <img src="" alt="" srcset="" id="imovel_image_preview" class="col-sm-12" style="border-radius: 8px">
                 <input type="text"  alt="" hidden name="default_image_link" id="imovel_image_preview_input" value="">
        </div>

    </div>
</div>
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
               aspectRatio: 16 / 6,
                viewMode: 3,
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });
    $('#crop').click(function(){
		canvas = cropper.getCroppedCanvas({
			width:3072,
		});

		canvas.toBlob(function(blob){
			url = URL.createObjectURL(blob);
			var reader = new FileReader();
			reader.readAsDataURL(blob);
			reader.onloadend = function(){
				var image = reader.result;
                var data = $('#imovel_image_preview');
                var data_file = $('#imovel_image_preview_input');
                data[0].src = image;
                data_file[0].value = image;
               $('#modal').modal('toggle');
			};
		});
	});
    });
</script>
@endpush
