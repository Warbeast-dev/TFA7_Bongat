@extends('layouts.app')
@section('title', 'Edit User')
@section('content')
<section class="page-heading"><span class="eyebrow">User accounts</span><h1>Edit User</h1><p class="lead">Update account details or upload a display-ready profile picture.</p></section>
<section class="form-card"><form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">@csrf @method('PATCH')
    @include('users.form', ['submitLabel' => 'Update user', 'showAvatar' => true])
</form></section>
@endsection
