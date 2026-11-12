@extends('layouts.app')
@section('title', 'Edit Customer')
@section('content')
<section class="page-heading"><span class="eyebrow">Customer accounts</span><h1>Edit Customer</h1><p class="lead">Update the selected customer record.</p></section>
<section class="form-card"><form method="POST" action="{{ route('customers.update', $customer) }}">@csrf @method('PATCH')
    @include('customers.form', ['submitLabel' => 'Update customer'])
</form></section>
@endsection
