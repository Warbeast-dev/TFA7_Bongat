@extends('layouts.app')
@section('title', 'Add Customer')
@section('content')
<section class="page-heading"><span class="eyebrow">Customer accounts</span><h1>Add Customer</h1><p class="lead">Create a customer record. Required fields are marked.</p></section>
<section class="form-card"><form method="POST" action="{{ route('customers.store') }}">@csrf
    @include('customers.form', ['submitLabel' => 'Save customer'])
</form></section>
@endsection
