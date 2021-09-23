@extends('layouts.frontend.app')
@section('title', 'Sobre nós')
@section('content')

<section class="other-issue-area pb-5 pt-5" style="background: #f0eff1">
    <div class="container">
        <div class="container row">
            <div class="mr-auto ml-auto conatiner row p-4 col-sm-10 justify-content-start d-flex bg-white" id="sobre">
               <p>
                {!! $sobre !!}

               </p>
            </div>
        </div>
    </div>
</section>
@endsection
@section('banner')
    @if ($images->count() > 0)
        <section class="banner_section">
            <div class="owl-carousel" id="banner_carousel">
                @foreach ($images as $image)
                    <img src="{{ asset('/storage') }}/{{ $image }}" class="img-fluid">
                @endforeach
            </div>
        </section>
    @endif
@endsection

@push('css')
<style>
    #sobre img{
        max-width: 100%;
    }
</style>
@endpush
