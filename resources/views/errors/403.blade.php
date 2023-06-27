@extends('errors.layout')
@section('title','Forbidden')
@section('message','Forbidden')
@section('code','403')
@section('image','403.svg')

@section('svg')
<img src="{{Vite::asset('resources/errors/svgs/403.svg')}}" alt="Forbidden" class="h-72 self-center mx-auto">
@endsection
