@extends('layouts.app')
@section('title', 'Customer Accounts')
@section('content')
<section class="page-heading"><span class="eyebrow">Account directory</span><h1>Customer Accounts</h1><p class="lead">Customer names and contact details, together in one place.</p></section>
<section class="table-card" aria-labelledby="directory-title">
    <div class="table-heading"><div><h2 id="directory-title">All customers</h2><span class="badge">{{ $customers->count() }} records</span></div><a class="button" href="{{ route('customers.create') }}">Add customer</a></div>
    <div class="table-scroll" role="region" aria-label="Customer records" tabindex="0">
        <table><caption class="sr-only">Customer account directory</caption><thead><tr><th scope="col">ID</th><th scope="col">Full name</th><th scope="col">Email address</th><th scope="col">Phone number</th><th scope="col">Action</th></tr></thead><tbody>
            @forelse ($customers as $customer)
                <tr><td><span class="id-label">{{ $customer->id }}</span></td><td>{{ $customer->full_name }}</td><td>{{ $customer->email }}</td><td>{{ $customer->phone ?: 'Not provided' }}</td><td><a class="text-link" href="{{ route('customers.edit', $customer) }}">Edit</a></td></tr>
            @empty
                <tr><td class="empty" colspan="5">No customers available yet.</td></tr>
            @endforelse
        </tbody></table>
    </div>
</section>
@endsection
