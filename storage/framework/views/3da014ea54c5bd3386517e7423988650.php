
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="<?php echo e(url('/')); ?>" class="app-brand-link">
      <span class="app-brand-logo demo">
        
        
      </span>
      <span class="app-brand-text demo menu-text fw-bolder ms-2"><?php echo e(config('app.name', 'Laravel')); ?></span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
  <div class="menu-inner-shadow"></div>
  <ul class="menu-inner py-1">
    
    <li class="menu-item <?php echo e(request()->is('dashboard*') ? 'active' : ''); ?>">
      <a href="<?php echo e(route('dashboard')); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Dashboard">Dashboard</div>
      </a>
    </li>

    
    <li class="menu-item <?php echo e(request()->is('templates*') ? 'active' : ''); ?>">
      <a href="<?php echo e(url('/templates')); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-file"></i>
        <div data-i18n="Templates">Templates</div>
      </a>
    </li>

    
    <li class="menu-item <?php echo e(request()->is('kategori*') ? 'active' : ''); ?>">
      <a href="<?php echo e(route('kategori.index')); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-file"></i>
        <div data-i18n="Kategori">Kategori</div>
      </a>
    </li>

    
    <li class="menu-item <?php echo e(request()->is('buku*') ? 'active' : ''); ?>">
      <a href="<?php echo e(route('buku.index')); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-file"></i>
        <div data-i18n="Kategori">Buku</div>
      </a>
    </li>

    
    
  </ul>
</aside><?php /**PATH C:\xamp new 2\php\project-perpustakaan\project-perpustakaan\resources\views/layouts/includes/sidebar.blade.php ENDPATH**/ ?>