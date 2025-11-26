
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="<?php echo e(url('/')); ?>" class="app-brand-link">
      <span class="app-brand-logo demo">
        
        
      </span>
      <h4>PAUL PATTON</h4>
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

    
    <li class="menu-item <?php echo e(request()->is('pengarang*') ? 'active' : ''); ?>">
      <a href="<?php echo e(route('pengarang.index')); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user-voice"></i>
        <div data-i18n="Pengarang">Pengarang</div>
      </a>
    </li>

    
    <li class="menu-item <?php echo e(request()->is('kategori*') ? 'active' : ''); ?>">
      <a href="<?php echo e(route('kategori.index')); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-category"></i>
        <div data-i18n="Kategori">Kategori</div>
      </a>
    </li>

    
    <li class="menu-item <?php echo e(request()->is('buku*') ? 'active' : ''); ?>">
      <a href="<?php echo e(route('buku.index')); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-book"></i>
        <div data-i18n="Buku">Buku</div>
      </a>
    </li>

    
    <li class="menu-item <?php echo e(request()->is('peminjaman*') ? 'active' : ''); ?>">
      <a href="<?php echo e(route('peminjaman.index')); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-book-bookmark"></i>
        <div data-i18n="Peminjaman">Peminjaman</div>
      </a>
    </li>

    
    
  </ul>
</aside><?php /**PATH C:\xamp new 2\php\project-perpustakaan\project-perpustakaan\resources\views/layouts/includes/sidebar.blade.php ENDPATH**/ ?>