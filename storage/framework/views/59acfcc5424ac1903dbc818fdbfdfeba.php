<?php $__env->startSection('content'); ?>
<h3 class="text-2xl font-bold mb-4">Dashboard</h3>

<!-- Revenue Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
  <div class="bg-white p-4 rounded-[10px] shadow text-green-600">
    <h5 class="text-xs font-semibold">Won Revenue</h5>
    <div class="text-xl font-bold text-green-600">$0.00 <span class="text-xs font-semibold text-green-500">↑ 0%</span></div>
    <canvas id="wonRevenueChart" height="100"></canvas>
  </div>

  <div class="bg-white p-4 rounded-[10px] shadow text-red-600">
    <h5 class="text-xs font-semibold">Lost Revenue</h5>
    <div class="text-xl font-bold text-red-500">$0.00 <span class="text-xs font-semibold text-green-500">↑ 0%</span></div>
    <canvas id="lostRevenueChart" height="100"></canvas>
  </div>
</div>

<!-- KPIs -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
  <div class="bg-white p-4 rounded-[10px] shadow">
    <h5 class="text-sm font-semibold">Average Lead Value </h5>
    <div class="text-xl font-bold dark:text-gray-300">$0.00 <span class="text-xs font-semibold text-green-500">↑ 0%</span></div>
  </div>
  <div class="bg-white p-4 rounded-[10px] shadow">
    <h5 class="text-sm font-semibold">Average Leads Per Day</h5>
    <div class="text-xl font-bold dark:text-gray-300">0 <span class="text-xs font-semibold text-green-500">↑ 0%</span></div>
  </div>
  <div class="bg-white p-4 rounded-[10px] shadow">
    <h5 class="text-sm font-semibold">Total Leads</h5>
    <div class="text-xl font-bold dark:text-gray-300">0 <span class="text-xs font-semibold text-green-500">↑ 0%</span></div>
  </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
  <div class="bg-white p-4 rounded-[10px] shadow">
    <h5 class="text-sm font-semibold">Total Quotations</h5>
    <div class="text-xl font-bold dark:text-gray-300">0 <span class="text-xs font-semibold text-green-500">↑ 0%</span></div>
  </div>
  <div class="bg-white p-4 rounded-[10px] shadow">
    <h5 class="text-sm font-semibold">Total Persons</h5>
    <div class="text-xl font-bold dark:text-gray-300">0 <span class="text-xs font-semibold text-green-500">↑ 0%</span></div>
  </div>
  <div class="bg-white p-4 rounded-[10px] shadow">
    <h5 class="text-sm font-semibold">Total Organizations</h5>
    <div class="text-xl font-bold dark:text-gray-300">0 <span class="text-xs font-semibold text-green-500">↑ 0%</span></div>
  </div>
</div>

<!-- Leads Chart -->
<div class="bg-white p-6 rounded-[10px] shadow">
  <h4 class="text-xl font-bold mb-4">📊 Leads Chart</h4>
  <canvas id="leadsChart" height="150"></canvas>

  <div class="flex justify-center gap-6 mt-4">
    <div class="flex items-center gap-2">
      <span class="w-4 h-4 bg-blue-600 inline-block rounded-sm"></span>
      <span>Cold Leads</span>
    </div>
    <div class="flex items-center gap-2">
      <span class="w-4 h-4 bg-yellow-400 inline-block rounded-sm"></span>
      <span>Hot Leads</span>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\LoopLynks2\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>