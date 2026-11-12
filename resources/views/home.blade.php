@extends('layouts.app')
@section('title', 'Home')
@section('content')
<section class="hero">
    <span class="eyebrow">A clearer view of your accounts</span>
    <h1>Every account.<br>One organized place.</h1>
    <p class="lead">Find customer contact details and browse user accounts from one simple directory.</p>
    <div class="actions"><a class="button" href="{{ route('customers.index') }}">View customers <span aria-hidden="true">&rarr;</span></a><a class="button secondary" href="{{ route('users.index') }}">View users</a></div>
</section>
<section class="card-grid" aria-label="Account directories">
    <a class="card card-link" href="{{ route('customers.index') }}"><span class="card-number">01 / CUSTOMERS</span><h2>People you serve</h2><p>Browse customer names, email addresses, and phone numbers.</p><span class="text-link">Open customer directory &rarr;</span></a>
    <a class="card card-link" href="{{ route('users.index') }}"><span class="card-number">02 / USERS</span><h2>People on your team</h2><p>See usernames and full names in the user account directory.</p><span class="text-link">Open user directory &rarr;</span></a>
</section>
@endsection
