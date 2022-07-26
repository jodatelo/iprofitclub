<?php $__env->startSection('title', "Retiros"); ?>

<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="content card card-animate p-3">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Retiros</h2>
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
        <div class="table-responsive">
        <table class="table table-bordered table-responsive w-100 d-block d-md-table">
            <tr>
                <th width="60px">ID</th>
                <th>Usuario</th>
                <th>Monto</th>
                <th>Tipo</th>
                <th>Banco</th>
                <th>Tipo de Cta</th>
                <th># de Cta</th>
                <th>Nombre Titular</th>
                <th>Cédula Titular</th>
                <th>Cédula Frente</th>
                <th>Cédula Reverso</th>
                
                <th width="120px">Estado</th>
                <th  width="130px">Accion</th>
            </tr>
            <?php $__currentLoopData = $retirostrans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if( $user->statusret==1 ): ?> <?php $class="text-primary bg-soft-primary "; $estatus="PENDIENTE";   ?>  <?php endif; ?>
                <?php if( $user->statusret==2 ): ?> <?php $class="text-success bg-soft-success "; $estatus="ACEPTADO";   ?>  <?php endif; ?>
                <?php if( $user->statusret==3 ): ?> <?php $class="text-danger bg-soft-danger "; $estatus="NEGADO";   ?>  <?php endif; ?>
            <tr>
                <td><?php echo e($user->id); ?></td>
                <td><?php echo e($user->usuario()->email); ?></td>

                <td><?php echo e($user->monto); ?></td>
                <td>T. BANCARIA</td>
                <td><?php echo e($user->banco); ?></td>
                <td><?php echo e($user->tipocuenta); ?></td>
                <td><?php echo e($user->ncuenta); ?></td>
                <td><?php echo e($user->cedulatit); ?></td>
                <td><?php echo e($user->nombretit); ?></td>
                <td><a href="<?php echo e(url('cedulas/'.$user->usuario()->cedulafro)); ?>" target="_blank"><img src="<?php echo e(url('cedulas/'.$user->usuario()->cedulafro)); ?>" style="height: 50px; width: 50px;"></a></td>
                <td><a href="<?php echo e(url('cedulas/'.$user->usuario()->cedulafro)); ?>" target="_blank"><img src="<?php echo e(url('cedulas/'.$user->usuario()->cedularev)); ?>" style="height: 50px; width: 50px;"></a></td>
 
                <td><span class=" p-2 <?php echo e($class); ?>"><?php echo e($estatus); ?> </span></td>
                <td>
                    <?php if( $user->statusret==1 ): ?>
                    <div class="row">
                    <form action="<?php echo e(route('retiros.aceptar',$user->id)); ?>" method="post" class="col-6 ">
                        
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('POST'); ?>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-trash">AC</i>
                        </button>
                    </form>
                    <form action="<?php echo e(route('retiros.eliminar',$user->id)); ?>" method="post" class="col-6 ">
                        
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('POST'); ?>
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash">EL</i>
                        </button>
                    </form>
                    </div>
                    <?php endif; ?>
                    <?php if( $user->statusret==2 ): ?>

                    <form action="<?php echo e(route('retiros.eliminar',$user->id)); ?>" method="Post">
                        
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('POST'); ?>
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash">REV</i>
                        </button>
                    </form>
                    <?php endif; ?>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        </div>
        <?php echo e($retirostrans->links()); ?>

        <div class="p-2"> 
            <hr>
        </div>
        <div class="table-responsive mt-2">
            <table class="table table-bordered table-responsive w-100 d-block d-md-table">
                <tr>
                    <th width="60px">ID</th>
                    <th>Usuario</th>
                    <th>Monto</th>
                    <th>Tipo</th>
                    <th>Moneda</th>
                    <th>Red</th>
                    <th>Wallet</th>
                    <th>Cédula Frente</th>
                    <th>Cédula Reverso</th>
                    
                    <th  width="120px">Estado</th>
                    <th>Accion</th>
                </tr>
                <?php $__currentLoopData = $retirosbit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if( $user->statusret==1 ): ?> <?php $class="text-primary bg-soft-primary "; $estatus="PENDIENTE";   ?>  <?php endif; ?>
                    <?php if( $user->statusret==2 ): ?> <?php $class="text-success bg-soft-success "; $estatus="ACEPTADO";   ?>  <?php endif; ?>
                    <?php if( $user->statusret==3 ): ?> <?php $class="text-danger bg-soft-danger "; $estatus="NEGADO";   ?>  <?php endif; ?>
                <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->usuario()->email); ?></td>
    
                    <td><?php echo e($user->monto); ?></td>
                    <td><?php echo e($user->formap()->nombre); ?></td>
                  
                    <td><?php echo e($user->moneda); ?></td>
                    <td><?php echo e($user->red); ?></td>
                    <td><?php echo e($user->wallet); ?></td>
                    <td><a href="<?php echo e(url('cedulas/'.$user->usuario()->cedulafro)); ?>" target="_blank"><img src="<?php echo e(url('cedulas/'.$user->usuario()->cedulafro)); ?>" style="height: 50px; width: 50px;"></a></td>
                    <td><a href="<?php echo e(url('cedulas/'.$user->usuario()->cedulafro)); ?>" target="_blank"><img src="<?php echo e(url('cedulas/'.$user->usuario()->cedularev)); ?>" style="height: 50px; width: 50px;"></a></td>
     
                    <td><span class=" p-2 <?php echo e($class); ?>"><?php echo e($estatus); ?> </span></td>
                    <td>
                        <?php if( $user->statusret==1 ): ?>
                        <div class="row">
                        <form action="<?php echo e(route('retiros.aceptar',$user->id)); ?>" method="post" class="col-6 ">
                            
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('POST'); ?>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-trash">AC</i>
                            </button>
                        </form>
                        <form action="<?php echo e(route('retiros.eliminar',$user->id)); ?>" method="post" class="col-6 ">
                            
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('POST'); ?>
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash">EL</i>
                            </button>
                        </form>
                        </div>
                        <?php endif; ?>
                        <?php if( $user->statusret==2 ): ?>

                        <form action="<?php echo e(route('retiros.eliminar',$user->id)); ?>" method="Post">
                            
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('POST'); ?>
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash">EL</i>
                            </button>
                        </form>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            </div>
            <?php echo e($retirostrans->links()); ?>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
 <style>
table.table-responsive{
        display: block;
        overflow: scroll;
    }


.table-responsive {
    overflow: hidden;
    padding: 0px;
    margin: 0px;
    table-layout: fixed;
    width: 100%;
    display: table;
}
</style><?php /**PATH C:\xampp\htdocs\iprofitclub\resources\views/retiros/index.blade.php ENDPATH**/ ?>