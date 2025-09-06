@extends('errors.layout')
@section('title','Page not found')
@section('message','Page not found')
@section('code','404')
@section('image','404.svg')
@section('svg')
<img src="{{Vite::asset('resources/errors/svgs/404.svg')}}" alt="Page not found" class="h-72 self-center mx-auto">
@endsection
