
@extends('errors.layout')
@section('title','Service Unavailable')
@section('message','Service Unavailable')
@section('code','503')
@section('image','503.svg')
@section('svg')
<img src="{{Vite::asset('resources/errors/svgs/503.svg')}}" alt="Service Unavailable" class="h-72 self-center mx-auto">
@endsection
