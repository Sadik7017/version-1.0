@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded-[10px] shadow">

    {{-- Breadcrumb --}}
    <div class="flex justify-between items-center mb-4">
        <div class="text-sm text-gray-500">
            <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline">Dashboard</a> /
            <a href="{{ route('admin.leads.index') }}" class="text-blue-600 hover:underline">Leads</a> /
            <span class="text-gray-700 font-semibold">Create Lead</span>
        </div>
        <a href="{{ route('admin.leads.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-[10px] shadow">
            Save
        </a>
    </div>

    {{-- Title --}}
    <h2 class="text-2xl font-semibold mb-4">Create Lead</h2>

</div>

{{-- Tab Navigation --}}
<div class="mb-6 bg-white p-4 rounded-[10px] shadow border border-gray-200">
    <ul class="flex space-x-4 text-sm font-medium text-gray-500" id="tabs">
        <li>
            <button class="tab-btn active-tab text-blue-600 border-b-2 border-blue-600 py-2 px-4" data-tab="details">
                Details
            </button>
        </li>
        <li>
            <button class="tab-btn py-2 px-4 hover:text-blue-600" data-tab="contact">
                Contact Person
            </button>
        </li>
        <li>
            <button class="tab-btn py-2 px-4 hover:text-blue-600" data-tab="products">
                Products
            </button>
        </li>
    </ul>
</div>

{{-- Tab Content Container --}}
<div class="space-y-6">

    {{-- Details Tab --}}
    <div class="tab-content bg-white p-6 rounded-[10px] shadow border border-gray-200" id="tab-details">
        <p class="text-lg font-semibold mb-4">Details</p>
        <div class="grid md:grid-cols-2 gap-4">

            {{-- Title --}}
            <div>
                <label for="title" class="block mb-1 text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title" placeholder="Title"
                    class="w-full rounded-[10px] border border-gray-300 px-3 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Lead Value --}}
            <div>
                <label for="lead_value" class="block mb-1 text-sm font-medium text-gray-700">Lead Value ($)</label>
                <input type="text" id="lead_value" name="lead_value" placeholder="Lead Value"
                    class="w-full rounded-[10px] border border-gray-300 px-3 py-2 text-sm shadow-sm">
            </div>

            {{-- Description --}}
            <div class="md:col-span-2">
                <label for="description" class="block mb-1 text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="3"
                    class="w-full rounded-[10px] border border-gray-300 px-3 py-2 text-sm shadow-sm"></textarea>
            </div>

            {{-- Source --}}
            <div>
                <label for="lead_source_id" class="block mb-1 text-sm font-medium text-gray-700">Source</label>
                <select id="lead_source_id" name="lead_source_id"
                    class="w-full rounded-[10px] border border-gray-300 px-3 py-2 text-sm shadow-sm">
                    <option value="1" selected>Email</option>
                    <option value="2">Web</option>
                    <option value="3">Web Form</option>
                    <option value="4">Phone</option>
                </select>
            </div>

            {{-- Type --}}
            <div>
                <label for="lead_type_id" class="block mb-1 text-sm font-medium text-gray-700">Type</label>
                <select id="lead_type_id" name="lead_type_id"
                    class="w-full rounded-[10px] border border-gray-300 px-3 py-2 text-sm shadow-sm">
                    <option value="1" selected>New Business</option>
                    <option value="2">Existing Business</option>
                    <option value="3">Service Business</option>
                    <option value="4">Small Market Business</option>
                </select>
            </div>

            {{-- Expected Close Date --}}
            <div>
                <label for="expected_close_date" class="block mb-1 text-sm font-medium text-gray-700">Expected Close Date</label>
                <input type="date" id="expected_close_date" name="expected_close_date"
                    class="w-full rounded-[10px] border border-gray-300 px-3 py-2 text-sm shadow-sm">
            </div>

            {{-- Sales Owner --}}
            <div>
                <label for="user_id" class="block mb-1 text-sm font-medium text-gray-700">Sales Owner</label>
                <select id="user_id" name="user_id"
                    class="w-full rounded-[10px] border border-gray-300 px-3 py-2 text-sm shadow-sm">
                    <option value="1">Example</option>
                    <option value="2">Custom Admin</option>
                </select>
            </div>
        </div>
    </div>

    {{-- Contact Person Tab --}}
    <div class="tab-content bg-white p-6 rounded-[10px] shadow border border-gray-200 hidden" id="tab-contact">
        <p class="text-lg font-semibold mb-4">Information About the Contact Person</p>
        <div class="grid md:grid-cols-2 gap-4">

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Name</label>
                <input type="text" placeholder="Click to Add"
                    class="w-full rounded-[10px] border border-gray-300 px-3 py-2 text-sm shadow-sm">
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                <input type="email" placeholder="Work Email"
                    class="w-full rounded-[10px] border border-gray-300 px-3 py-2 text-sm shadow-sm">
                <button type="button" class="mt-2 text-blue-600 text-sm">Add More</button>
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Contact Number</label>
                <input type="text" placeholder="Work Number"
                    class="w-full rounded-[10px] border border-gray-300 px-3 py-2 text-sm shadow-sm">
                <button type="button" class="mt-2 text-blue-600 text-sm">Add More</button>
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Organization</label>
                <input type="text" placeholder="Click to Add"
                    class="w-full rounded-[10px] border border-gray-300 px-3 py-2 text-sm shadow-sm">
            </div>
        </div>
    </div>

    {{-- Products Tab --}}
    <div class="tab-content bg-white p-6 rounded-[10px] shadow border border-gray-200 hidden" id="tab-products">
        <p class="text-lg font-semibold mb-4">Information About the Products</p>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-3 py-2 border">Product Name</th>
                        <th class="px-3 py-2 border">Quantity</th>
                        <th class="px-3 py-2 border">Price</th>
                        <th class="px-3 py-2 border">Amount</th>
                        <th class="px-3 py-2 border">Action</th>
                    </tr>
                </thead>
                <tbody id="product-rows">
                    <tr>
                        <td class="border px-3 py-2"><input type="text" class="w-full border rounded-[10px] px-2 py-1" placeholder="Product Name"></td>
                        <td class="border px-3 py-2"><input type="number" class="w-full border rounded-[10px] px-2 py-1" placeholder="0"></td>
                        <td class="border px-3 py-2"><input type="number" class="w-full border rounded-[10px] px-2 py-1" placeholder="$0.00"></td>
                        <td class="border px-3 py-2"><input type="number" class="w-full border rounded-[10px] px-2 py-1" placeholder="$0.00"></td>
                        <td class="border px-3 py-2">
                            <button type="button" class="text-red-600 text-sm">Remove</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="button" id="add-product" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-[10px] text-sm">Add More</button>
        </div>
    </div>
</div>

{{-- JS for Tabs & Product Calculation --}}
<script>
    // Tabs
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const target = button.getAttribute('data-tab');

            tabButtons.forEach(btn => btn.classList.remove('text-blue-600', 'border-b-2', 'border-blue-600'));
            button.classList.add('text-blue-600', 'border-b-2', 'border-blue-600');

            tabContents.forEach(content => content.classList.add('hidden'));
            document.getElementById('tab-' + target).classList.remove('hidden');
        });
    });

    // Add Product Row
    document.getElementById('add-product').addEventListener('click', () => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td class="border px-3 py-2"><input type="text" class="w-full border rounded-[10px] px-2 py-1" placeholder="Product Name"></td>
            <td class="border px-3 py-2"><input type="number" class="w-full border rounded-[10px] px-2 py-1 quantity" placeholder="0"></td>
            <td class="border px-3 py-2"><input type="number" class="w-full border rounded-[10px] px-2 py-1 price" placeholder="$0.00"></td>
            <td class="border px-3 py-2"><input readonly class="w-full border rounded-[10px] px-2 py-1 amount" placeholder="$0.00"></td>
            <td class="border px-3 py-2"><button type="button" class="remove-row text-red-600 text-sm">Remove</button></td>
        `;
        document.getElementById('product-rows').appendChild(row);
    });

    // Remove product row
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-row')) {
            e.target.closest('tr').remove();
        }
    });

    // Calculate amount
    document.addEventListener('input', function (e) {
        if (e.target.classList.contains('quantity') || e.target.classList.contains('price')) {
            const row = e.target.closest('tr');
            const qty = parseFloat(row.querySelector('.quantity')?.value || 0);
            const price = parseFloat(row.querySelector('.price')?.value || 0);
            const amount = qty * price;
            row.querySelector('.amount').value = amount.toFixed(2);
        }
    });
</script>
@endsection
