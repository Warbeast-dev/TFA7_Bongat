@extends('layouts.app')
@section('title', 'About')
@section('content')
<section class="page-heading"><span class="eyebrow">About the application</span><h1>A foundation for better records.</h1><p class="lead">POS Foundations keeps customer and user information organized in two straightforward directories.</p></section>
<section class="card-grid">
    <article class="card"><span class="card-number">CUSTOMER ACCOUNTS</span><h2>Contact information at a glance</h2><p>The customer directory brings together full names, email addresses, and phone numbers.</p></article>
    <article class="card"><span class="card-number">USER ACCOUNTS</span><h2>A clear account directory</h2><p>The user directory lists a unique username and full name for each account.</p></article>
</section>
<section class="note"><h2>About this project</h2><p>This educational application demonstrates database-backed account directories. The included records are fictional samples. Sales, checkout, and user sign-in are outside its current scope.</p></section>
@endsection
