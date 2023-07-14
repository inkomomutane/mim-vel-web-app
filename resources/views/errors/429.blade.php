
@extends('errors.layout')
@section('title','Too Many Requests')
@section('message','Too Many Requests')
@section('code','429')
@section('image','503.svg')
@section('svg')
<img src="{{Vite::asset('resources/errors/svgs/429.svg')}}" alt="Too Many Requests" class="h-72 self-center mx-auto">
@endsection
