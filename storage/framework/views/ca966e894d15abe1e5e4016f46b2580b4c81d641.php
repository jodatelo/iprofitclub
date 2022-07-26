<?php $__env->startSection('title', "Mi Equipo"); ?>
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
        

       <!-- <div class="col-12 pt-4">
            <div class="col-xl-12">
                <h5>Últimos movimientos</h5>
            </div>
        </div>
    -->
        <div class="card">
            <div class="card-header">
                <?php if(\Session::has('msg')): ?>
                <div class="alert  <?php echo \Session::get('clase'); ?> m-2">
                    <ul style="" class="p-0 m-0">
                        <li style="list-style: none;"><?php echo \Session::get('msg'); ?></li>
                    </ul>
                </div>
                <?php endif; ?>
                <h4 class="card-title mb-0">Equipo</h4>
            </div><!-- end card header -->
            <div class="card-body form-steps">
                <form class="vertical-navs-step">
                    <div class="row gy-5">
                        <div class="col-lg-3">
                            <div class="nav flex-column custom-nav nav-pills" role="tablist" aria-orientation="vertical">
                                <button class="nav-link" id="v-pills-bill-todos" data-bs-toggle="pill" data-bs-target="#v-pills-todos" type="button" role="tab" aria-controls="v-pills-todos" aria-selected="true" data-position="0">
                                    <span class="step-title me-2">
                                        <i class="mdi mdi-arrow-right step-icon me-2"></i>
                                        Todos
                                    </span>
                                     
                                </button>
                                <button class="nav-link " id="v-pills-bill-enviados" data-bs-toggle="pill" data-bs-target="#v-pills-enviados" type="button" role="tab" aria-controls="v-pills-enviados" aria-selected="false" data-position="1">
                                    <span class="step-title me-2">
                                        <i class="mdi mdi-arrow-right step-icon me-2"></i>
                                        No Disponibles
                                    </span>
                                     
                                </button>
                                <button class="nav-link " id="v-pills-bill-recibidos" data-bs-toggle="pill" data-bs-target="#v-pills-recibidos" type="button" role="tab" aria-controls="v-pills-recibidos" aria-selected="false" data-position="1">
                                    <span class="step-title me-2">
                                        <i class="mdi mdi-arrow-right step-icon me-2"></i>
                                            Disponibles
                                    </span>
                                     
                                </button>

                                <button class="nav-link " id="v-pills-bill-cobrados" data-bs-toggle="pill" data-bs-target="#v-pills-cobrados" type="button" role="tab" aria-controls="v-pills-cobrados" aria-selected="false" data-position="1">
                                    <span class="step-title me-2">
                                        <i class="mdi mdi-arrow-right step-icon me-2"></i>
                                            Cobrados
                                    </span>
                                     
                                </button>
                            
                            </div>
                            <!-- end nav -->
                        </div> <!-- end col-->
                        <div class="col-lg-6">
                            <div class="px-lg-4">
                                <div class="tab-content">
                                     
                                     
                                    <!-- end tab pane -->
                                    <?php $error=""; $disable=""; ?>
                                    <div class="tab-pane fade" id="v-pills-todos" role="tabpanel" aria-labelledby="v-pills-todos">
                                        <div class="text-center pt-4 pb-2">
                                            <div class="table-responsive table-card">
                                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                    <thead class="text-muted table-light">
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Fecha</th>
                                                            <th scope="col">Monto</th>
                                                            <th scope="col">Acción</th>
                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if($patrocinios->toArray()): ?>  
                                                        <?php $__currentLoopData = $patrocinios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patrocinio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e($patrocinio->id); ?></td>
                                                                <td><?php echo e(date_format($patrocinio->created_at,"Y/m/d H:i:s")); ?></td>
                                                                <?php if($patrocinio->statustrans==1): ?> <?php $classtext="text-info"; $class="btn-secondary"; $disable="disabled"; $textbutton="No asignado"; ?> <?php endif; ?>
                                                                <?php if($patrocinio->statustrans==2): ?> <?php $classtext="text-info"; $class="btn-info"; $disable="disabled"; $textbutton="No disponible"; ?> <?php endif; ?>
                                                                <?php if($patrocinio->statustrans==3): ?> <?php $classtext="text-success"; $class="btn-success"; $disable=""; $textbutton="Cobrar"; ?> <?php endif; ?>
                                                                <?php if($patrocinio->statustrans==4): ?> <?php $classtext="text-success"; $class="btn-outline-success"; $disable="disabled"; $textbutton="Cobrado"; ?> <?php endif; ?>
                                                                <td><span class="<?php echo e($classtext); ?>">$ <?php echo e(number_format($patrocinio->valor,2)); ?></span></td>
                                                                <td>
                                                                    <button class="btn btn-xs <?php echo e($class); ?> <?php echo e($disable); ?> p-2"> <?php echo e($textbutton); ?> </button>
                                                                </td>
                                                                
                                                            </tr><!-- end tr -->
                                                             
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <?php $error='<span class="p-2">No hay patrocinios disponibles</span><br><br>'; ?>
                                                        <?php endif; ?>
                                                        
                                                       
                                                    </tbody><!-- end tbody -->
                                                </table><!-- end table -->
                                                <?php echo $error ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $error="" ; ?>

                                    <div class="tab-pane fade" id="v-pills-enviados" role="tabpanel" aria-labelledby="v-pills-enviados">
                                        <div class="text-center pt-4 pb-2">
                                            <div class="table-responsive table-card">
                                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                    <thead class="text-muted table-light">
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Fecha</th>
                                                            <th scope="col">Monto</th>
                                                            <th scope="col">Acción</th>
                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody>
 
                                                        <?php if($patrocinios->toArray() ): ?>  
                                                        <?php $__currentLoopData = $patrocinios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patrocinio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($patrocinio->statustrans==1 || $patrocinio->statustrans==2 ): ?>  
                                                                <?php if((date("Y-m-d",strtotime($patrocinio->created_at."+ 30 days")) > date('Y-m-d') ) ): ?>  
                                                               
                                                                <tr>
                                                                    <td><?php echo e($patrocinio->id); ?></td>
                                                                    <td><?php echo e(date_format($patrocinio->created_at,"Y/m/d H:i:s")); ?></td>
                                                                    <td>$ <?php echo e(number_format($patrocinio->valor,2)); ?></td>
                                                                    <?php if($patrocinio->statustrans==1): ?> <?php $class="text-info"; ?> <?php endif; ?>
                                                                    <?php if($patrocinio->statustrans==2): ?> <?php $class="text-info"; ?> <?php endif; ?>
                                                                    
                                                                    <td>
                                                                        <button class="btn btn-xs btn-secondary p-2" disabled> No Asignado </button>
                                                                    </td>
                                                                    
                                                                </tr><!-- end tr -->
                                                                <?php endif; ?>
                                                            
                                                            <?php else: ?>
                                                                <?php $error='<span class="p-2">No hay patrocinios no disponibles</span><br><br>'; ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <?php $error='<span class="p-2">No hay patrocinios no disponibles</span><br><br>'; ?>
                                                        <?php endif; ?>
                                                        
                                                       
                                                    </tbody><!-- end tbody -->
                                                </table><!-- end table -->
                                                <?php echo $error ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $error="" ; ?>

                                    <div class="tab-pane fade" id="v-pills-recibidos" role="tabpanel" aria-labelledby="v-pills-recibidos">
                                        <div class="text-center pt-4 pb-2">
                                            <div class="table-responsive table-card">
                                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                    <thead class="text-muted table-light">
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Fecha</th>
                                                            <th scope="col">Monto</th>
                                                            <th scope="col">Acción</th>
                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if($patrocinios->toArray() ): ?>  
                                                        <?php $__currentLoopData = $patrocinios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patrocinio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($patrocinio->statustrans==3 || ( $patrocinio->statustrans==1 &&  (date("Y-m-d",strtotime($patrocinio->created_at."+ 30 days")) <= date('Y-m-d') ) ) ): ?>  
                                                            <tr>
                                                                <td><?php echo e($patrocinio->id); ?></td>
                                                                <td><?php echo e(date_format($patrocinio->created_at,"Y/m/d H:i:s")); ?></td>
                                                                <td>$ <?php echo e(number_format($patrocinio->valor,2)); ?></td>
                                                                <?php if($patrocinio->statustrans==3): ?> <?php $class="text-success"; ?> <?php endif; ?>
                                                                 <?php if($patrocinio->statustrans==1 &&  (date("Y-m-d",strtotime($patrocinio->created_at."+ 30 days")) <= date('Y-m-d') ) ): ?> ) <?php $class="btn-success"; ?> <?php endif; ?>
                                                                <td>
                                                                    <a href="<?php echo e(route('patrocinios.cobrar',$patrocinio->id)); ?>" class="btn btn-xs <?php echo e($class); ?> p-2" > Cobrar </a>
                                                                </td>
                                                                
                                                            </tr><!-- end tr -->
                                                            <?php else: ?>
                                                                <?php $error='<span class="p-2">No hay patrocinios disponibles</span><br><br>'; ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <?php $error='<span class="p-2">No hay patrocinios disponibles</span><br><br>'; ?>
                                                        <?php endif; ?>
                                                        
                                                       
                                                    </tbody><!-- end tbody -->
                                                </table><!-- end table -->
                                                <?php echo $error ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-cobrados" role="tabpanel" aria-labelledby="v-pills-cobrados">
                                        <div class="text-center pt-4 pb-2">
                                            <div class="table-responsive table-card">
                                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                    <thead class="text-muted table-light">
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Fecha</th>
                                                            <th scope="col">Monto</th>
                                                            <th scope="col">Acción</th>
                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $error="" ; ?>
                                                        <?php if($patrocinios->toArray() ): ?>  
                                                        <?php $__currentLoopData = $patrocinios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patrocinio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($patrocinio->statustrans==4 ): ?>  
                                                            <tr>
                                                                <td><?php echo e($patrocinio->id); ?></td>
                                                                <td><?php echo e(date_format($patrocinio->created_at,"Y/m/d H:i:s")); ?></td>
                                                                <td>$ <?php echo e(number_format($patrocinio->valor,2)); ?></td>
                                                                <?php if($patrocinio->statustrans==4): ?> <?php $class="btn-outline-success"; ?> <?php endif; ?>
                                                                
                                                                <td>
                                                                    <button class="btn btn-xs <?php echo e($class); ?> p-2" disabled> Cobrado </button>
                                                                </td>
                                                                
                                                            </tr><!-- end tr -->
                                                            <?php else: ?>
                                                                <?php $error='<span class="p-2">No hay patrocinios cobrados</span><br><br>'; ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <?php $error='<span class="p-2">No hay patrocinios cobrados</span><br><br>'; ?>
                                                        <?php endif; ?>
                                                        
                                                       
                                                    </tbody><!-- end tbody -->
                                                </table><!-- end table -->
                                                <?php echo $error ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end tab pane -->
                                </div>
                                <!-- end tab content -->
                            </div>
                        </div>
                        <!-- end col -->

                         
                    </div>
                    <!-- end row -->
                </form>
            </div>
        </div>
    </div>
<script>
window.onload=function() {
    document.getElementById("v-pills-bill-todos").click();
    }
</script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\iprofitclub\resources\views/patrocinio/index.blade.php ENDPATH**/ ?>