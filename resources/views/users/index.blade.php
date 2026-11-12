@extends('layouts.app')
@section('title', 'User Accounts')
@section('content')
<section class="page-heading"><span class="eyebrow">Account directory</span><h1>User Accounts</h1><p class="lead">Usernames and full names for your account records.</p></section>
<section class="table-card" aria-labelledby="directory-title">
    <div class="table-heading"><div><h2 id="directory-title">All users</h2><span class="badge">{{ $users->count() }} records</span></div><a class="button" href="{{ route('users.create') }}">Add user</a></div>
    <div class="table-scroll" role="region" aria-label="User records" tabindex="0">
        <table><caption class="sr-only">User account directory</caption><thead><tr><th scope="col">Avatar</th><th scope="col">ID</th><th scope="col">Username</th><th scope="col">Full name</th><th scope="col">Action</th></tr></thead><tbody>
            @forelse ($users as $user)
                <tr><td>@if ($user->avatar)<img class="avatar" src="{{ asset('uploads/'.$user->avatar) }}" alt="Avatar of {{ $user->full_name }}">@else<span class="avatar placeholder" aria-label="No avatar">{{ strtoupper(substr($user->full_name, 0, 1)) }}</span>@endif</td><td><span class="id-label">{{ $user->id }}</span></td><td>{{ $user->username }}</td><td>{{ $user->full_name }}</td><td><a class="text-link" href="{{ route('users.edit', $user) }}">Edit</a></td></tr>
            @empty
                <tr><td class="empty" colspan="5">No users available yet.</td></tr>
            @endforelse
        </tbody></table>
    </div>
</section>
@endsection
