@extends('website.layouts.website')
@section('content')
<section class="section bg-facebook-darken">
    @foreach ($posts as $item)
{{$item}}
    @endforeach
    {{$posts->links()}}
</section>
@endsection
