<div>
    <div class="row justify-content-between">
        <div class="col-sm-12">
            <label for="image my-2">Images</label>

            <div x-data="{ isUploading: false, progress: 0 }"
                 x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false;progress = 0"
                x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress">


            <input class="form-control form-control-sm mt-3" type="file" id="image" placeholder="Upload image"
            wire:model='image' name="image[]" multiple accept="image/*">
                <!-- Progress Bar -->
                <div x-show="isUploading">
                    <div class="progress mt-4">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="progress" aria-valuemin="40" aria-valuemax="100" :style='"width:" +progress + "%"' x-text= 'progress + "%"'></div>
                      </div>
                </div>

            </div>
        </div>

        @error('image')
            <span class="text-danger my-3">{{ $message }}</span>
        @enderror


        @if ($image)
            <div class="row mt-3">
                @foreach ($image as $tempImage)

                    <figure class="figure col-sm-2 my-2">

                        <img src="{{ $tempImage->temporaryUrl() }}" class="figure-img img-fluid rounded"
                            alt="{{ $tempImage->getClientOriginalName() }}" style="width: 150px">
                        <figcaption class="figure-caption">{{ $tempImage->getClientOriginalName() }}.</figcaption>
                    </figure>
                @endforeach
            </div>
        @endif


    </div>

</div>
