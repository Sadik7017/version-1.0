@extends('layouts.admin')

@section('content')
<!-- Alpine.js (for filter toggle) -->
<script src="//unpkg.com/alpinejs" defer></script>

<div class="bg-white p-6 rounded shadow">
    {{-- Breadcrumb and Create Button --}}
    <div class="flex justify-between items-center mb-4">
        <div class="text-sm text-gray-500">
            <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline">Dashboard</a>
            / <span class="text-gray-700 font-semibold">Leads</span>
        </div>
        <a href="{{ route('admin.leads.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            + Create Lead
        </a>
    </div>

    {{-- Title --}}
    <h2 class="text-2xl font-semibold mb-4">Leads</h2>
</div>

<!-- Leads Toolbar and Filter Drawer -->
<div x-data="{ showFilter: false }" class="relative">
    <div class="flex justify-between gap-2 mt-4 max-md:flex-wrap">
        <!-- Left Side: Search + Filter -->
        <div class="flex items-center gap-x-2 w-full max-md:w-full max-md:justify-between">
            <!-- Search Input -->
            <input type="text" placeholder="Search..."
                   class="w-full max-w-xs px-3 py-2 text-sm border border-gray-300 rounded-[10px] shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />

            <!-- Filter Button -->
            <button type="button" @click="showFilter = true"
                    class="flex items-center gap-1 px-3 py-2 text-sm text-white bg-blue-600 rounded-[10px] hover:bg-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L15 13.414V19a1 1 0 01-1.447.894l-4-2A1 1 0 019 17v-3.586L3.293 6.707A1 1 0 013 6V4z"/>
                </svg>
                <span>Filter</span>
            </button>
        </div>

        <!-- Right Side: Menu Button -->
        <div class="flex items-center max-md:justify-end max-md:w-full">
            <button type="button"
                    class="p-2 rounded-full hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 12h.01M12 12h.01M18 12h.01"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Overlay -->
    <div x-show="showFilter" class="fixed inset-0 bg-black/30 z-40" x-cloak @click="showFilter = false"></div>

    <!-- Filter Drawer -->
    <div x-show="showFilter" x-transition:enter="transition transform duration-300"
         x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
         x-transition:leave="transition transform duration-300"
         x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
         class="fixed right-0 top-0 h-full w-full max-w-sm bg-white border-l border-gray-200 z-50 shadow-xl p-6 overflow-y-auto"
         x-cloak>
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-700">Filters</h3>
            <button @click="showFilter = false" class="text-gray-500 hover:text-gray-700">
                ✕
            </button>
        </div>

        <div class="space-y-4">
            <!-- Status Filter -->
            <div>
                <label class="block text-sm text-gray-600 mb-1">Status</label>
                <select class="w-full px-2 py-1 border rounded text-sm">
                    <option value="">All</option>
                    <option value="open">Open</option>
                    <option value="closed">Closed</option>
                    <option value="pending">Pending</option>
                </select>
            </div>

            <!-- Date Filter -->
            <div>
                <label class="block text-sm text-gray-600 mb-1">Created Date</label>
                <input type="date" class="w-full px-2 py-1 border rounded text-sm" />
            </div>
        </div>

        <div class="flex justify-end gap-2 mt-6">
            <button type="button" class="text-sm text-gray-600 hover:underline"
                    @click="showFilter = false">Cancel</button>
            <button class="bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700">Apply</button>
        </div>
    </div>
</div>

@endsection
