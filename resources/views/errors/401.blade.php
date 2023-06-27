@extends('errors.layout')
@section('title','Unauthorized')
@section('message','Unauthorized')
@section('code','401')
@section('image','401.svg')
@section('svg')
<img src="{{Vite::asset('resources/errors/svgs/401.svg')}}" alt="Unauthorized" class="h-72 self-center mx-auto">
@endsection
