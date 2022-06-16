<div >
    <!-- Modal -->
        <!-- Button trigger modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Envie sua mensagem</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="custom-form mt-3">
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
                            <form method="post" name="myForm"  wire:submit.prevent='send'>
                                <p id="error-msg" class="mb-0"></p>
                                <div id="simple-msg"></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Teu nome <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                @svg('fluentui-person-16-o','fea icon-sm icons')
                                                <input name="nome_do_cliente" id="nome_do_cliente" type="text" class="form-control ps-5" placeholder="Teu nome :" wire:model='nome_do_cliente'>
                                            </div>
                                            @error('nome_do_cliente')
                                            <span class="text-danger my-3">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Teu email <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                @svg('fluentui-mail-16-o','fea icon-sm icons')
                                                <input name="email" id="email" type="email" class="form-control ps-5" placeholder="Teu email :" wire:model='email'>
                                            </div>
                                            @error('email')
                                            <span class="text-danger my-3">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Contacto  <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                @svg('fluentui-call-outbound-28-o', 'fea icon-sm icons')
                                                <input name="contacto" id="contacto" class="form-control ps-5" placeholder="Contacto :" wire:model='contacto'>
                                            </div>
                                            @error('contacto')
                                            <span class="text-danger my-3">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Agendar Visita  <span class="text-muted">(Opcional)</span></label>
                                            <div class="form-icon position-relative">
                                                @svg('fluentui-calendar-clock-24-o', 'fea icon-sm icons')
                                                <input type="date" name="data_hora" id="data_hora" class="form-control ps-5" placeholder="Agendar :" wire:model='data_hora'>
                                            </div>
                                            @error('data_hora')
                                            <span class="text-danger my-3">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Mensagem <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                @svg('fluentui-chat-multiple-24-o','fea icon-sm icons')
                                                <textarea name="mensagem" id="mensagem" rows="4" class="form-control ps-5" placeholder="Messagem :" wire:model='mensagem'></textarea>
                                            </div>
                                            @error('mensagem')
                                            <span class="text-danger my-3">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" id="submit" name="send" class="btn btn-primary">Enviar mensagem</button>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </form>
                        </div><!--end custom-form-->
                    </div>
                </div>
            </div>
        </div>

</div>
