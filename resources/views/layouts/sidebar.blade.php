  <div class="sidebar">
  <div>
   <a href="{{ route('admin.dashboard') }}" class="{{ Route::is('admin.leads.dashboard') ? 'text-primary fw-bold' : '' }}">
  <i class="bi bi-house {{ Route::is('admin.leads.dashboard') ? 'text-primary' : '' }}"></i>
  <span> Dashboard</span>
</a>


    <a href="{{ route('admin.leads.index') }}" class="{{ request()->is('admin/leads*') ? 'text-primary fw-bold' : '' }}">
      <i class="bi bi-person-lines-fill {{ request()->is('admin/leads*') ? 'text-primary' : '' }}"></i>
      <span> Leads</span>
    </a>

    <a href="{{ url('setting') }}" class="{{ request()->is('setting') ? 'text-primary fw-bold' : '' }}">
      <i class="bi bi-gear {{ request()->is('setting') ? 'text-primary' : '' }}"></i>
      <span> Settings</span>
    </a>
  </div>
  <div>
    <a href="{{ route('admin.logout') }}">
      <i class="bi bi-box-arrow-right"></i>
      <span> Logout</span>
    </a>
  </div>
</div>