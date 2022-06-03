<div>

    <h5 class="mt-4">Comentários :</h5>

    <ul class="media-list list-unstyled mb-0">
        @foreach ($comments as $comentario)
            <li class="mt-4">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="flex-1 commentor-detail">
                            <h6 class="mb-0"><span class="text-dark media-heading">{{ $comentario->nome }}
                                </span>
                            </h6>
                            <small class="text-muted">
                                <i class="uil uil-calendar-alt text-dark"></i>
                                    {{ date_format($comentario->created_at, 'j') . 'th, ' }}{{ __(date_format($comentario->created_at, 'F') . ', ') }}
                                    {{ date_format($comentario->created_at, 'Y') }}</small>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <p class="text-muted fst-italic p-3 bg-light rounded">
                        "{{ $comentario->comentario }}"</p>
                </div>
            </li>
        @endforeach
    </ul>

    <h5 class="mt-4 text-muted">Novo Comentário :</h5>

    <form class="mt-3" wire:submit.prevent="submit">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-labe ">Comentar  <span class="text-danger">*</span></label>
                    <div class="form-icon position-relative">
                        <i data-feather="message-circle" class="fea icon-sm icons"></i>
                        <textarea id="comentario" placeholder="Teu comentário" rows="5" name="comentario" class="form-control ps-5" required=""
                            wire:model='comentario'></textarea>
                    </div>
                    @error('comentario')
                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-12">
                <div class="mb-3">
                    <label class="form-label">Nome <span class="text-danger">*</span></label>
                    <div class="form-icon position-relative">
                        <i data-feather="user" class="fea icon-sm icons"></i>
                        <input id="nome" name="nome" type="text" placeholder="Nome" class="form-control ps-5"
                            required="" wire:model='nome'>
                    </div>
                    @error('nome')
                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <!--end col-->

            <div class="col-md-12">
                <div class="send d-grid">
                    <button type="submit" class="btn btn-primary">Enviar comentário</button>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </form>
    <!--end form-->

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

    {{$ip}}
</div>
