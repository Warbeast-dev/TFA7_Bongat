<?php
namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
class CustomerController extends Controller
{
    public function index(): View
    {
        $customers = Customer::orderBy('id')->get();
        return view('customers.index', compact('customers'));
    }

    public function create(): View
    {
        return view('customers.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['nullable', 'string', 'max:30'],
        ]);
        Customer::create($validated + ['phone' => $validated['phone'] ?? '']);
        return redirect()->route('customers.index')->with('success', 'Customer account created successfully.');
    }

    public function edit(Customer $customer): View
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer): RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['nullable', 'string', 'max:30'],
        ]);
        $customer->update($validated + ['phone' => $validated['phone'] ?? '']);
        return redirect()->route('customers.index')->with('success', 'Customer account updated successfully.');
    }
}
