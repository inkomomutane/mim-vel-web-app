<div>

    <div class="container-fluid p-0">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible show fade" role="alert"
            style="border-left: 5px solid darkgreen;">
            <div class="alert-body">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ session('success') }}</strong>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible show fade" role="alert"
            style="border-left: 5px solid rgb(100, 0, 0);">
            <div class="alert-body">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ session('success') }}</strong>
            </div>
        </div>
    @endif
        <div class="card">
            <div class="row g-0">
                <div class="col-12 col-lg-12 col-xl-12">
                    <div class="py-2 px-4 border-bottom  d-lg-block">
                        <div class="d-flex align-items-center py-1">
                            <div class="flex-grow-1 ps-3">
                                <h4 class="text-muted fw-bold"> 
                                    Messagens</h4>
                            </div>
                        </div>
                    </div>

                <div class="position-relative">

                    <div class="chat-messages p-4">
                        @foreach ($agendas as $agenda)
                            <div class="chat-message-left pb-4">
                                <div>
                                    <img src="{{ asset('backend/img/avatar.svg') }}" alt="{{ $agenda->nome_do_cliente }}"
                                        srcset="" class="rounded-circle me-1 mr-4" width="35"><a
                                        class="text-muted strong text-nowrap mt-2 "
                                        href="tel:{{ $agenda->contacto }}"><strong>{{ $agenda->contacto }}</strong></a>
                                    <div class="text-muted small text-nowrap mt-2 ">
                                        <strong>{{ date_format($agenda->created_at, 'j m Y h:m a') }}</strong>
                                    </div>
                                    <div
                                        class="card shadow-none flex-shrink-1 @if ($agenda->is_readed) bg-light @else bg-warning-light @endif rounded py-2 px-3 ms-3">
                                        <div class="card-header px-4 pt-4">
                                            <div class="card-actions float-end">
                                                <div class="dropdown position-relative">
                                                    <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                                        @svg('radix-dots-vertical', 'feather')
                                                    </a>
                                                    <div
                                                        class="dropdown-menu dropdown-menu-end p-2 shadow-xl rounded-3 border border-3 border-info">
                                                        <a class="dropdown-item rounded-3 p-2"
                                                            wire:click='change({{ $agenda->id }})'>Marcar como Lida</a>
                                                        <a class="dropdown-item rounded-3 p-2"
                                                            href="tel:{{ $agenda->contacto }}">Ligar</a>
                                                        <a class="dropdown-item rounded-3 p-2"
                                                            href="sms:{{ $agenda->contacto }}">Enviar Sms</a>
                                                        <a class="dropdown-item rounded-3 p-2"
                                                            href="mailto:{{ $agenda->email }}?subject=Resposta a mensagem
                                                        &cc=Support@mimovel.com
                                                        &body={{ $agenda->mensagem }}\n R: "
                                                            target="blank">Responder Por email</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="card-title mb-0">
                                                @if ($agenda->is_readed)
                                                    <span class="badge bg-success mx-3">Lida</span>
                                                @else
                                                    <span class="badge bg-warning mx-3">Não Lida</span>
                                                @endif{{ ucfirst($agenda->nome_do_cliente) }}
                                            </h5>

                                        </div>
                                        <div class="card-body px-4 pt-2 pb-1">
                                            <p>{{ $agenda->mensagem }}.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="flex-grow-0 py-3 px-4 border-top row w-100">
                        <div class="input-group row w-100">
                            {{ $agendas->links() }}
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

</div>
