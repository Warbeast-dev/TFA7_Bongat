@extends('layouts.app')
@section('title', 'Add User')
@section('content')
<section class="page-heading"><span class="eyebrow">User accounts</span><h1>Add User</h1><p class="lead">Create a user account. The username must be unique.</p></section>
<section class="form-card"><form method="POST" action="{{ route('users.store') }}">@csrf
    @include('users.form', ['submitLabel' => 'Save user', 'showAvatar' => false])
</form></section>
@endsection
