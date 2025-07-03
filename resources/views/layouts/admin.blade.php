<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    ::-webkit-scrollbar {
      width: 6px;
    }
    ::-webkit-scrollbar-thumb {
      background-color: #ccc;
      border-radius: 10px;
    }
    .dark-mode {
      background-color: #1f2937;
      color: #f9fafb;
    }
  </style>
</head>
<body class="bg-gray-100 text-gray-800 h-screen overflow-hidden transition-colors duration-300">

<!-- Header -->
<nav class="fixed top-0 left-0 right-0 z-50 flex justify-between items-center px-6 py-4 bg-white shadow h-16">
  <div class="flex items-center gap-2">
    <img src="https://www.shutterstock.com/image-vector/july-3-2023-vector-illustration-600nw-2326749515.jpg" alt="Logo" class="h-8" />
    <span class="text-lg font-semibold">Looplynk</span>
  </div>

  <div class="flex items-center gap-2 w-1/2">
    <div class="relative w-full">
      <span class="absolute left-3 top-2.5 text-gray-400"><i class="bi bi-search"></i></span>
      <input
        type="text"
        placeholder="Mega Search"
        class="w-full pl-10 pr-4 py-2 border rounded-[40px] shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
    </div>
    <button class="bg-blue-500 text-white px-3 py-2 rounded-[40px] hover:bg-blue-600">
      <i class="bi bi-plus-lg"></i>
    </button>
  </div>

  <div class="flex items-center gap-4">
    <div class="relative">
      <i class="bi bi-bell text-xl cursor-pointer"></i>
      <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">3</span>
    </div>

    <!-- Dark Mode Toggle -->
    <button id="darkToggle" class="text-xl">
      <i class="bi bi-moon"></i>
    </button>

    <div class="rounded-full bg-pink-500 text-white font-bold w-8 h-8 flex items-center justify-center">
      {{ strtoupper(Auth::guard('admin')->user()->name[0]) }}
    </div>
  </div>
</nav>

<!-- Sidebar + Main Content -->
<div class="flex pt-16 h-full">
  <!-- Sidebar -->
  <aside class="fixed top-16 left-0 w-64 h-[calc(100%-4rem)] bg-white shadow overflow-y-auto hover:overflow-y-scroll p-4 flex flex-col justify-between" id="sidebar">
    <div class="space-y-2">
      <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 p-2 rounded {{ request()->is('admin/dashboard') ? 'text-blue-600 font-bold bg-blue-50' : 'hover:bg-gray-100' }}">
        <i class="bi bi-house"></i><span>Dashboard</span>
      </a>
      <a href="{{ route('admin.leads.index') }}" class="flex items-center gap-2 p-2 rounded {{ request()->is('admin/leads*') ? 'text-blue-600 font-bold bg-blue-50' : 'hover:bg-gray-100' }}">
        <i class="bi bi-person-lines-fill"></i><span>Leads</span>
      </a>
      <a href="{{ url('setting') }}" class="flex items-center gap-2 p-2 rounded {{ request()->is('setting') ? 'text-blue-600 font-bold bg-blue-50' : 'hover:bg-gray-100' }}">
        <i class="bi bi-gear"></i><span>Settings</span>
      </a>
    </div>

    <div>
      <a href="{{ route('admin.logout') }}" class="flex items-center gap-2 p-2 rounded hover:bg-red-100 text-red-600">
        <i class="bi bi-box-arrow-right"></i><span>Logout</span>
      </a>
    </div>
  </aside>

  <!-- Main Content Area -->
  <main class="ml-64 flex-1 h-[calc(100%-4rem)] overflow-y-auto p-6">
    @yield('content')

    <!-- Chart Placeholder -->
    {{-- <canvas id="leadsChart" class="mt-10 bg-white p-4 rounded-lg shadow"></canvas> --}}
  </main>
</div>

<!-- JavaScript -->
<!-- Charts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const labels = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];

  new Chart(document.getElementById("wonRevenueChart"), {
    type: "line",
    data: {
      labels,
      datasets: [{
        label: "Won",
        data: [0, 0, 0, 0, 0, 0, 0],
        borderColor: "green",
        backgroundColor: "rgba(0, 128, 0, 0.1)",
        tension: 0.4
      }]
    },
    options: { responsive: true, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } }
  });

  new Chart(document.getElementById("lostRevenueChart"), {
    type: "line",
    data: {
      labels,
      datasets: [{
        label: "Lost",
        data: [0, 0, 0, 0, 0, 0, 0],
        borderColor: "red",
        backgroundColor: "rgba(255, 0, 0, 0.1)",
        tension: 0.4
      }]
    },
    options: { responsive: true, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } }
  });

  const juneLabels = Array.from({ length: 30 }, (_, i) => `${i + 1} June`);
  const leadsData = Array(30).fill().map(() => (Math.random() * 0.9 + 0.1).toFixed(2));

  new Chart(document.getElementById("leadsChart"), {
    type: "line",
    data: {
      labels: juneLabels,
      datasets: [{
        label: "Leads",
        data: leadsData,
        borderColor: "#0d6efd",
        backgroundColor: "rgba(13, 110, 253, 0.1)",
        fill: true,
        tension: 0.4,
        pointRadius: 2
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { display: false } },
      scales: {
        y: {
          beginAtZero: true,
          min: 0,
          max: 1,
          ticks: {
            stepSize: 0.1,
            callback: value => value.toFixed(1)
          }
        },
        x: {
          ticks: { maxRotation: 90, minRotation: 45 }
        }
      }
    }
  });

</script>

</body>
</html>
