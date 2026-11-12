@extends('layouts.app')
@section('title', 'Something went wrong')
@section('content')
<section class="page-heading"><span class="eyebrow">500</span><h1>Something went wrong</h1><p class="lead">Please try again later.</p><a class="button" href="{{ url('/') }}">Back to home</a></section>
@endsection
