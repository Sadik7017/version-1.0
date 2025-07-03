

<!-- Sidebar -->
<div class="sidebar">
  <div>
    <a href="dashboard"><i class="bi bi-house"></i><span> Dashboard</span></a>
    
    <a href="<?php echo e(route('admin.leads.index')); ?>"><i class="bi bi-person-lines-fill"></i><span> Leads</span></a>
    <a href="setting"><i class="bi bi-gear"></i><span> Settings</span></a>
  </div>
  <div>
    <a href="<?php echo e(route('admin.logout')); ?>"><i class="bi bi-box-arrow-right"></i><span> Logout</span></a>
  </div>
</div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div class="dashboard-title">Dashboard</div>
     
    </div>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\LoopLynks2\resources\views/admin/partials/sidebar.blade.php ENDPATH**/ ?>