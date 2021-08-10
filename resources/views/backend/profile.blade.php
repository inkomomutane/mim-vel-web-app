@extends('layouts.backend.dashboard')
@section('content')

    <section class="section">
        <h2 class="section-title">Perfil</h2>
        <div class="row container py-2">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    <img alt="image" src="{{ asset('/backend/images/avatar.png') }}"
                        class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Imoveis</div>
                            <div class="profile-widget-item-value">{{ $user->imovels->count() }}</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Agendas</div>
                            <div class="profile-widget-item-value">{{ $user->agendas->count() }}</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Denûncias</div>
                            <div class="profile-widget-item-value">{{ $user->imovels->count() }}</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Messagens</div>
                            <div class="profile-widget-item-value">{{ $user->imovels->count() }}</div>
                        </div>
                    </div>
                </div>
                <div class="profile-widget-description pb-0">
                    <div class="profile-widget-name">{{ $user->name }} <div
                            class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div>Corretor
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                </div>
                <div class="card-footer text-center pt-0">
                    <div class="font-weight-bold mb-2 text-small">Follow Hasan On</div>
                    <a href="#" class="btn btn-social-icon mr-1 btn-facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-social-icon mr-1 btn-twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="btn btn-social-icon mr-1 btn-github"><i class="fab fa-github"></i></a>
                    <a href="#" class="btn btn-social-icon mr-1 btn-instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')
    <script src="{{ asset('backend/js/app.js') }}"></script>
    <script>
        Echo.channel('notification').listen('MessageNotification', function (e) {
           console.log(e.message);
        });
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/app.css') }}">
@endpush
