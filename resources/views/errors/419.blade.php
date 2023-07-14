
@extends('errors.layout')
@section('title','Page Expired')
@section('message','Page Expired')
@section('code','419')
@section('image','404.svg')
@section('svg')
<img src="{{Vite::asset('resources/errors/svgs/419.svg')}}" alt="Page Expired" class="h-72 self-center mx-auto">
@endsection
