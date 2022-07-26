<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('assets/images/logo-sm.png')); ?>" alt="" height="27">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('assets/images/logo-dark.png')); ?>" alt="" height="27">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('assets/images/logo-sm.png')); ?>" alt="" height="27">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('assets/images/logo-light.png')); ?>" alt="" height="27">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span><?php echo app('translator')->get('translation.menu'); ?></span></li>
                <li class="nav-item">
                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="nav-link menu-link" href="#side-<?php echo e($menu->id); ?>" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="<?php echo e($menu->icono); ?>"></i> <span><?php echo e($menu->nombre); ?></span>
                    </a>
              
                        <?php if(@$menu->submenu()): ?>
                            <div class="collapse menu-dropdown" id="side-<?php echo e($menu->id); ?>">
                                <ul class="nav nav-sm flex-column">
                                <?php $__currentLoopData = $menu->submenu(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <a href="<?php echo e($submenu->link); ?>" class="nav-link"><?php echo e($submenu->nombre); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                      
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
                </li> <!-- end Dashboard Menu -->
                <?php if(auth()->user()->isAdmin==1): ?>
                <li class="menu-title"><span>ADMIN</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#side-adminuser" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="las la-user-tie "></i> <span>Usuarios</span>
                    </a>
                    <div class="collapse menu-dropdown" id="side-adminuser">
                        <ul class="nav nav-sm flex-column">
                         
                            <li class="nav-item">
                                <a href="/usuarios" class="nav-link">Usuarios</a>
                            </li>
                         
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#side-admincompra" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="las la-dollar-sign"></i> <span>Movimientos</span>
                    </a>
                    <div class="collapse menu-dropdown" id="side-admincompra">
                        <ul class="nav nav-sm flex-column">
                         
                            <li class="nav-item">
                                <a href="/retiros" class="nav-link">Sol. retiros</a>
                            </li>
                         
                        </ul>
                    </div>
                    <div class="collapse menu-dropdown" id="side-admincompra">
                        <ul class="nav nav-sm flex-column">
                         
                            <li class="nav-item">
                                <a href="/acreditaciones" class="nav-link">Acreditaciones</a>
                            </li>
                         
                        </ul>
                    </div>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
<?php /**PATH C:\xampp\htdocs\iprofitclub\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>