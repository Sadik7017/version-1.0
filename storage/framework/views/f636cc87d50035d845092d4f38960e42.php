  <div class="sidebar">
  <div>
   <a href="<?php echo e(route('admin.dashboard')); ?>" class="<?php echo e(Route::is('admin.leads.dashboard') ? 'text-primary fw-bold' : ''); ?>">
  <i class="bi bi-house <?php echo e(Route::is('admin.leads.dashboard') ? 'text-primary' : ''); ?>"></i>
  <span> Dashboard</span>
</a>


    <a href="<?php echo e(route('admin.leads.index')); ?>" class="<?php echo e(request()->is('admin/leads*') ? 'text-primary fw-bold' : ''); ?>">
      <i class="bi bi-person-lines-fill <?php echo e(request()->is('admin/leads*') ? 'text-primary' : ''); ?>"></i>
      <span> Leads</span>
    </a>

    <a href="<?php echo e(url('setting')); ?>" class="<?php echo e(request()->is('setting') ? 'text-primary fw-bold' : ''); ?>">
      <i class="bi bi-gear <?php echo e(request()->is('setting') ? 'text-primary' : ''); ?>"></i>
      <span> Settings</span>
    </a>
  </div>
  <div>
    <a href="<?php echo e(route('admin.logout')); ?>">
      <i class="bi bi-box-arrow-right"></i>
      <span> Logout</span>
    </a>
  </div>
</div><?php /**PATH C:\xampp\htdocs\LoopLynks2\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>