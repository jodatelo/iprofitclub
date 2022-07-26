<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="row">
         
        <p class="text-uppercase fw-medium text-muted mb-0 pb-2" style="color:black !important">ACREDITACIONES</p>

        <div class="col-xl-9 col-md-10">
            <!-- card -->
            <form method="POST" action="<?php echo e(route('acreditaciones.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card card-animate">
                    <?php if(\Session::has('msg')): ?>
                    <div class="alert  <?php echo \Session::get('clase'); ?> m-2">
                        <ul style="" class="p-0 m-0">
                            <li style="list-style: none;"><?php echo \Session::get('msg'); ?></li>
                        </ul>
                    </div>
                    <?php endif; ?>
                <div class="card-body">
                   
                    <div class="d-flex align-items-end justify-content-between mt-2">
                        <div class="col-9">
                            <div class="pb-1">Seleecione la billetera a acreditar</div>
                            <select id="usuario" name="usuario" class="form-control col-10" >
                                <option value="0">Seleccione el usuario</option>
                                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($usuario->id); ?>"><?php echo e($usuario->email); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            
                        </div>

                        
                       
                    </div>

                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div class="col-9">
                            <div class="pb-1">Ingresa el monto</div>
                            <input type="number" id="monto"   name="monto" class="form-control col-10"   value="" placeholder="$ 0.00">
                            <?php $__errorArgs = ['monto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <div class="invalid-feedback">
                                                Por favor, ingrese el monto
                                            </div>
                        </div>

                        
                       
                    </div>
                     
                </div><!-- end card body -->
                <?php echo method_field('POST'); ?>
                <hr class="m-1">
                <div class="col-12 p-2 text-center">
                    <button type="submit" class="btn btn-xs btn-outline-secondary p-2">
                        <i class="fa fa-save"></i>&nbsp;Acreditar</button>
                        </div>      
                
                   
                         
                   
                </div>
            </div><!-- end card -->
            </form>
        </div><!-- end col -->

       

       <!-- <div class="col-12 pt-4">
            <div class="col-xl-12">
                <h5>Últimos movimientos</h5>
            </div>
        </div>
    -->
   
    </div>
     <script>
      
     </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\iprofitclub\resources\views/acreditaciones/acreditar.blade.php ENDPATH**/ ?>