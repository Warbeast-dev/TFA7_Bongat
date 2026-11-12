@extends('layouts.app')
@section('title', 'Page not found')
@section('content')
<section class="page-heading"><span class="eyebrow">404</span><h1>Page not found</h1><p class="lead">The page you are looking for does not exist.</p><a class="button" href="{{ url('/') }}">Back to home</a></section>
@endsection
