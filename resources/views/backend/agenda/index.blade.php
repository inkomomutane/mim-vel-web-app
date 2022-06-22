<!-- file:///C:/Users/USER/Documents/Workspace/Web/copiedSites/adminkit/demo.adminkit.io/pages-chat.html -->
@extends('backend.layouts.app')
@section('title', 'Agendas')
@section('content')
    <main>


        @livewire('agenda')

    </main>
@endsection
@push('css')
    <style>
        .chat-messages {
            display: flex;
            flex-direction: column;
            max-height: 60vh;
            overflow-y: scroll;
        }
    </style>
@endpush
