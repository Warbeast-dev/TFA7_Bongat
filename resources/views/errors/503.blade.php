@extends('layouts.app')
@section('title', 'Temporarily unavailable')
@section('content')
<section class="page-heading"><span class="eyebrow">503</span><h1>Temporarily unavailable</h1><p class="lead">Please check back shortly.</p><a class="button" href="{{ url('/') }}">Back to home</a></section>
@endsection
