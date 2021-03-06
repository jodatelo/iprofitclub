<?php $__env->startSection('title', "Acreditaciones"); ?>
 

<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <a href="<?php echo e(route('acreditaciones.acreditar')); ?>" class="btn btn-success mb-2">
        <i class="fas fa-trash">NUEVA ACREDITACIÓN</i>
    </a>
    <div class="card card-animate p-3">
        
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Acreditaciones</h2>
                </div>
                <!--<div class="pull-right mb-2">
                    <a class="btn btn-success" href="<?php echo e(route('usuarios.index')); ?>">
                        <i class="fa fa-plus"></i> Create User
                    </a>
                </div>-->
            </div>
        </div>
        <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p class="p-0 m-0"><?php echo e($message); ?></p>
        </div>
        <?php endif; ?>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Monto</th>
     
        
                
                <th>Estado</th>
                <th width="160px">Accion</th>
            </tr>
            <?php $__currentLoopData = $compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if( $user->statuscomp==2 ): ?> <?php $class="text-success bg-soft-success "; $estatus="ACREDITADA";   ?>  <?php endif; ?>
                <?php if( $user->statuscomp==3 ): ?> <?php $class="text-danger bg-soft-danger "; $estatus="REVERSADA";   ?>  <?php endif; ?>
                
            <tr>
                <td><?php echo e($user->id); ?></td>
                <td><?php echo e($user->usuario()->email); ?></td>

                <td><?php echo e($user->monto); ?></td>
 
                <td><span class=" p-2 <?php echo e($class); ?>"><?php echo e($estatus); ?> </span></td>
                <td>
                     
                    <?php if( $user->statuscomp==2 ): ?>

                    <form action="<?php echo e(route('acreditaciones.eliminar',$user->id)); ?>" method="Post">
                        
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('POST'); ?>
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash">REVERSAR</i>
                        </button>
                    </form>
                    <?php endif; ?>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <?php echo e($compras->links()); ?>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\iprofitclub\resources\views/acreditaciones/index.blade.php ENDPATH**/ ?>