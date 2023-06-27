
@extends('errors.layout')
@section('title','Server Error')
@section('message','Server Error')
@section('code','500')
@section('image','503.svg')
@section('svg')
<img src="{{Vite::asset('resources/errors/svgs/500.svg')}}" alt="Server Error" class="h-72 self-center mx-auto">
@endsection
