<div>
    <div class="row justify-content-between my-3">
        <div class="col-sm-12">
            <label for="image">Images</label>
            <input class="form-control form-control-sm" type="file" id="upload" placeholder="Upload image"
            wire:model='image' multiple>

            @error("image-upload")
            <strong class="text-danger mt-3">
                Por favor insira uma Foto ou imagem valida
            </strong>
            @enderror

        </div>


        @if ($image)
            @foreach ($image as $tempImage)
                <img src="{{$tempImage->temporaryUrl()}}" class="img-thumbnail" style="width: 200px" >
            @endforeach
        @endif
        <div class="col-sm-9 my-2">
            <button  class="btn btn-primary">
               <div wire:loading wire:target='uploadImage' wire:key='uploadImage'>
                <i data-feather="loader"></i>
               </div>
                upload Image
            </button>
        </div>
    </div>

</div>
