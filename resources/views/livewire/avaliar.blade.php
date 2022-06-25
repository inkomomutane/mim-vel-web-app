<div>
     <!-- Modal -->
        <!-- Button trigger modal -->
        <div class="modal fade" id="avaliar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Envie sua mensagem</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="custom-form mt-3">
                            @if (session('success'))
                            <div class="alert alert-outline-success alert-pills mt-3 w-100" role="alert">
                                <span class="badge rounded-pill bg-success"> Success </span>
                                <span class="alert-content"> {{ session('success') }}! </span>
                             </div>
                        @endif
                        @if (session('error'))
                        <div class="alert alert-outline-danger alert-pills mt-3 w-100" role="alert">
                            <span class="badge rounded-pill bg-danger"> Error </span>
                            <span class="alert-content"> {{ session('error') }}! </span>
                         </div>
                        @endif
                            <form method="post" name="myForm"  wire:submit.prevent='send'>
                                @csrf
                                <p id="error-msg" class="mb-0"></p>
                                <div id="simple-msg"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Teu nome <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                @svg('fluentui-person-16-o','fea icon-sm icons')
                                                <input name="nome" id="nome" type="text" class="form-control ps-5 bg-light" placeholder="Teu nome :" wire:model='nome'>
                                            </div>
                                            @error('nome')
                                            <span class="text-danger my-3">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <select name="rating" id="rating" wire:model='rating' class="form-control form-select">
                                        @foreach ($stars as $star )
                                            <option value="{{$star}}" class="text-muted fw-bold">
                                                {{$star}} Estrela(s)</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" id="submit" name="send" class="btn btn-dark">Enviar tua avaliação</button>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </form>
                        </div><!--end custom-form-->
                    </div>
                </div>
            </div>
        </div></div>
