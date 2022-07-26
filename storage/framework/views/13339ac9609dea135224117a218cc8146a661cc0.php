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
    <div class="row">
         
        <p class="text-uppercase fw-medium text-muted mb-0 pb-2" style="color:black !important">RETIRAR SALDO</p>

        <div class="col-xl-8 col-md-10">
            <!-- card -->
            <form method="POST" action="<?php echo e(route('finanzas.solicitar')); ?>" enctype="multipart/form-data">
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
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="text-uppercase fw-medium text-muted mb-0">Monto disponible</p>
                        </div>
                        <div class="flex-shrink-0">
                           
                        </div>
                    </div>
                    
                    
                    <div class="d-flex align-items-end justify-content-between mt-2">
                        
                        
                        <div class="col-12">
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="  text-success" data-target="<?php if(@$balance[0]->saldo): ?> <?php echo e(number_format($balance[0]->saldo,2)); ?> <?php else: ?> $ 0.00 <?php endif; ?>"><?php if(@$balance[0]->saldo): ?> <?php echo e('$ '.number_format($balance[0]->saldo,2)); ?> <?php else: ?> $ 0.00 <?php endif; ?></span></h4>
                            
                            
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <div class="pb-1">Ingresa el monto</div>
                                    <input type="number" onkeyup="javascript:validarValor(this);" id="monto" name="monto" class="form-control col-12"   value="" placeholder="$ 0.00">
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
                                <div class="col-6 mb-2">
                                    <div class="pb-1">Forma de pago</div>
                                    <select  id="forma" onchange="javascript:tipoPago(this);" name="forma" class="form-control col-12"   value="">
                                        <option select="0">Seleccione</option>
                                        <?php $__currentLoopData = $formas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forma): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($forma->id); ?>"><?php echo e($forma->nombre); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['forma'];
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
                                                        Por favor, ingrese la forma de pago
                                                    </div>
                                </div>
                               
                                <div class="row d-none" id="dvTransferencia">
                                    <div class="p-1">
                                        <hr>
                                        </div>
                                    <div class="col-6 mb-2">
                                        <div class="pb-1">Banco de transferencia</div>
                                        <input type="text" id="banco" name="banco" class="form-control col-12"   value="" placeholder="EJ.: BANCO PICHINCHA">
                                        
                                        <?php $__errorArgs = ['banco'];
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
                                                            Por favor, ingrese la forma de pago
                                                        </div>
                                    </div>
                                    <div class="col-6 mb-2 ">
                                        <div class="pb-1">Tipo Cuenta</div>
                                        <input type="text" id="tcuenta" name="tcuenta" class="form-control col-12"   value="" placeholder="EJ.: CUENTA AHORROS">
                                        <?php $__errorArgs = ['tcuenta'];
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
                                                            Por favor, ingrese elnúmero de transacción
                                                        </div>
                                    </div>

                                    <div class="col-6 mb-2 ">
                                        <div class="pb-1">Número de cuenta</div>
                                        <input type="number" id="transaccion" name="transaccion" class="form-control col-12"   value="" placeholder="# 121323233">
                                        <?php $__errorArgs = ['transaccion'];
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
                                                            Por favor, ingrese el número de cuenta
                                                        </div>
                                    </div>
                                    <div class="col-6 mb-2 ">
                                        <div class="pb-1">Nombre Titular</div>
                                        <input type="text" id="ntitular" name="ntitular" class="form-control col-12"   value="" placeholder="EJ: JOSÉ PEREZ">
                                        <?php $__errorArgs = ['ntitular'];
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
                                                            Por favor, ingrese el nombre del titular
                                                        </div>
                                    </div>
                                    <div class="col-6 mb-2 ">
                                        <div class="pb-1">Cédula del titular</div>
                                        <input type="text" id="ctitular" name="ctitular" class="form-control col-12"   value="" placeholder="# 0930532611">
                                        <?php $__errorArgs = ['transaccion'];
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
                                                            Por favor, ingrese la cédula del titular
                                                        </div>
                                    </div>
                                </div>
                                <div class="row d-none" id="dvCripto">
                                    <div class="p-1">
                                        <hr>
                                        </div>
                                    <div class="col-6 mb-2">
                                        <div class="pb-1">Moneda</div>
                                        <input type="text" id="moneda" name="moneda" class="form-control col-12"   value="" placeholder="EJ.: DOLAR">
                                        
                                        <?php $__errorArgs = ['moneda'];
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
                                                            Por favor, ingrese la moneda
                                                        </div>
                                    </div>
                                    <div class="col-6 mb-2 ">
                                        <div class="pb-1">Red</div>
                                        <input type="text" id="redn" name="redn" class="form-control col-12"   value="" placeholder="">
                                        <?php $__errorArgs = ['redn'];
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
                                                            Por favor, ingrese la red
                                                        </div>
                                    </div>
                                    <div class="col-6 mb-2 ">
                                        <div class="pb-1">Wallet</div>
                                        <input type="number" id="wallet" name="wallet" class="form-control col-12"   value="" placeholder="# 121323233">
                                        <?php $__errorArgs = ['transaccion'];
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
                                                            Por favor, ingrese el wallet
                                                        </div>
                                    </div>
                                </div>
                               
                                <div class="col-6 mb-2 d-none">
                                    <div class="pb-1">Foto / Comprobante</div>
                                    <input type="file" id="archivo" name="archivo" class="form-control col-12"   value="" placeholder="$ 0.00">
                                    <?php $__errorArgs = ['archivo'];
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
                                <div class="col-6 mb-2">
                                </div>
                                <?php if(!auth()->user()->cedulafro): ?>
                                    <hr>
                                    <div class="col-12 mb-2">
                                        <span><b>¿Es tu primer retiro?</b></span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div class="pb-1">Foto de tu cédula de frente</div>
                                        <img class="col-12 mb-2" src="/images/cedulafrente.png" />
                                        <input type="file" id="cedulafro" name="cedulafro" class="form-control col-12"   value="" placeholder="$ 0.00">
                                        <?php $__errorArgs = ['cedulafro'];
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
                                            Por favor, ingrese la foto 
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div class="pb-1">Foto del reverso de tu cédula</div>
                                        <img class="col-12 mb-2" src="/images/cedulareverso.png" />
                                        <input type="file" id="cedularev" name="cedularev" class="form-control col-12"   value="" placeholder="$ 0.00">
                                        <?php $__errorArgs = ['cedularev'];
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
                                            Por favor, ingrese la foto 
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                                                      
                        </div>

                        
                       
                    </div>

                   
                     
                </div><!-- end card body -->
                <?php echo method_field('POST'); ?>
                <hr class="m-1">
                <div class="col-12 p-2 text-center">
                    <button type="submit" class="btn btn-xs btn-outline-secondary p-2">
                        <i class="fa fa-save"></i>&nbsp;Solicitar</button>
                        </div>      
                
                   
                         
                   
                </div>
            </div><!-- end card -->
            </form>
        </div><!-- end col -->

       
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Retiros</h4>
            </div><!-- end card header -->
            <div class="card-body form-steps">
                <form class="vertical-navs-step">
                    <div class="row gy-5">
                        <div class="col-lg-3">
                            <div class="nav flex-column custom-nav nav-pills" role="tablist" aria-orientation="vertical">
                                <button class="nav-link" id="v-pills-bill-todos" data-bs-toggle="pill" data-bs-target="#v-pills-todos" type="button" role="tab" aria-controls="v-pills-todos" aria-selected="true" data-position="0">
                                    <span class="step-title me-2">
                                        <i class="mdi mdi-arrow-right step-icon me-2"></i>
                                        TODOS
                                    </span>
                                     
                                </button>
                                <button class="nav-link " id="v-pills-bill-enviados" data-bs-toggle="pill" data-bs-target="#v-pills-enviados" type="button" role="tab" aria-controls="v-pills-enviados" aria-selected="false" data-position="1">
                                    <span class="step-title me-2">
                                        <i class="mdi mdi-arrow-right step-icon me-2"></i>
                                        PENDIENTES
                                    </span>
                                     
                                </button>
                                <button class="nav-link " id="v-pills-bill-compras" data-bs-toggle="pill" data-bs-target="#v-pills-compras" type="button" role="tab" aria-controls="v-pills-compras" aria-selected="false" data-position="1">
                                    <span class="step-title me-2">
                                        <i class="mdi mdi-arrow-right step-icon me-2"></i>
                                        ACREDITADOS
                                    </span>
                                     
                                </button>
                                <button class="nav-link " id="v-pills-bill-ventas" data-bs-toggle="pill" data-bs-target="#v-pills-ventas" type="button" role="tab" aria-controls="v-pills-ventas" aria-selected="false" data-position="1">
                                    <span class="step-title me-2">
                                        <i class="mdi mdi-arrow-right step-icon me-2"></i>
                                        NEGADOS
                                    </span>
                                     
                                </button>
                          
                            </div>
                            <!-- end nav -->
                        </div> <!-- end col-->
                        <div class="col-lg-6">
                            <div class="px-lg-4">
                                <div class="tab-content">
                                     
                                     
                                    <!-- end tab pane -->
                                    <?php $error=""; $reg=false; ?>
                                    <div class="tab-pane fade" id="v-pills-todos" role="tabpanel" aria-labelledby="v-pills-todos">
                                        <div class="text-center pt-4 pb-2">
                                            <div class="table-responsive table-card">
                                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                    <thead class="text-muted table-light">
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Fecha</th>
                                                            <th scope="col">Monto</th>
                                                            <th scope="col">Estatus</th>
                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if($transacciones->toArray()): ?>  
                                                        <?php $__currentLoopData = $transacciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                             
                                                            <?php $reg=true; @$status="" ?>
                                                            <tr>
                                                                <td><?php echo e($transaccion->id); ?></td>
                                                                <td><?php echo e(date_format($transaccion->created_at,"Y/m/d H:i:s")); ?></td>
                                                                <?php if($transaccion->statusret==1): ?> <?php $class="text-info"; @$status="PENDIENTE" ?> <?php endif; ?>
                                                                <?php if($transaccion->statusret==2): ?> <?php $class="text-success"; @$status="APROBADO" ?> <?php endif; ?>
                                                                <?php if($transaccion->statusret==3): ?> <?php $class="text-danger"; @$status="NEGADO" ?> <?php endif; ?>
                                                                
                                                                <td>
                                                                    <span class="<?php echo e($class); ?>"><?php echo e(number_format($transaccion->monto,2)); ?> </span>
                                                                </td>
                                                                <td><span class="<?php echo e($class); ?>"><?php echo e($status); ?></span></td>
                                                                
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <?php if($reg==false) { $error='<span class="p-2">No hay transacciones disponibles</span><br><br>'; } ?>
                                                        <?php endif; ?>
                                                        
                                                       
                                                    </tbody><!-- end tbody -->
                                                </table><!-- end table -->
                                                <?php echo $error ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $error=""; $reg=false; ?>
                                    <div class="tab-pane fade" id="v-pills-enviados" role="tabpanel" aria-labelledby="v-pills-enviados">
                                        <div class="text-center pt-4 pb-2">
                                            <div class="table-responsive table-card">
                                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                    <thead class="text-muted table-light">
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Fecha</th>
                                                            <th scope="col">Monto</th>
                                                            <th scope="col">Estatus</th>
                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if($transacciones->toArray()): ?>  
                                                        <?php $reg=false; @$status="" ?>
                                                        <?php $__currentLoopData = $transacciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($transaccion->statusret==1): ?>  
                                                            <?php $reg=true;  ?>
                                                            <tr>
                                                                <td><?php echo e($transaccion->id); ?></td>
                                                                <td><?php echo e(date_format($transaccion->created_at,"Y/m/d H:i:s")); ?></td>
                                                                <?php if($transaccion->statusret==1): ?> <?php $class="text-info"; @$status="PENDIENTE" ?> <?php endif; ?>
                                                                <?php if($transaccion->statusret==2): ?> <?php $class="text-success"; @$status="APROBADO" ?> <?php endif; ?>
                                                                <?php if($transaccion->statusret==3): ?> <?php $class="text-danger"; @$status="NEGADO" ?> <?php endif; ?>
                                                                
                                                                <td>
                                                                    <span class="<?php echo e($class); ?>"><?php echo e(number_format($transaccion->monto,2)); ?> </span>
                                                                </td>
                                                                <td><span class="<?php echo e($class); ?>"><?php echo e($status); ?></span></td>
                                                                
                                                                <?php else: ?>
                                                        
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                        <?php endif; ?>
                                                        <?php if($reg==false) { $error='<span class="p-2">No hay transacciones disponibles</span><br><br>'; } ?>
                                                        
                                                       
                                                    </tbody><!-- end tbody -->
                                                </table><!-- end table -->
                                                <?php echo $error ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $error=""; $reg=false; ?>
                                    <div class="tab-pane fade" id="v-pills-compras" role="tabpanel" aria-labelledby="v-pills-compras">
                                        <div class="text-center pt-4 pb-2">
                                            <div class="table-responsive table-card">
                                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                    <thead class="text-muted table-light">
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Fecha</th>
                                                            <th scope="col">Monto</th>
                                                            <th scope="col">Estatus</th>
                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if($transacciones->toArray()): ?>  
                                                        <?php $__currentLoopData = $transacciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php $reg=true; @$status="" ?>
                                                            <?php if($transaccion->statusret==2): ?>  
                                                            <?php $reg=true;  ?>
                                                            <tr>
                                                                <td><?php echo e($transaccion->id); ?></td>
                                                                <td><?php echo e(date_format($transaccion->created_at,"Y/m/d H:i:s")); ?></td>
                                                                <?php if($transaccion->statusret==1): ?> <?php $class="text-info"; @$status="PENDIENTE" ?> <?php endif; ?>
                                                                <?php if($transaccion->statusret==2): ?> <?php $class="text-success"; @$status="APROBADO" ?> <?php endif; ?>
                                                                <?php if($transaccion->statusret==3): ?> <?php $class="text-danger"; @$status="NEGADO" ?> <?php endif; ?>
                                                                
                                                                <td>
                                                                    <span class="<?php echo e($class); ?>"><?php echo e(number_format($transaccion->monto,2)); ?> </span>
                                                                </td>
                                                                <td><span class="<?php echo e($class); ?>"><?php echo e($status); ?></span></td>
                                                                
                                                                <?php else: ?>
                                                 
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                    <?php if($reg==false) { $error='<span class="p-2">No hay transacciones disponibles</span><br><br>'; } ?>       
                                                       
                                                    </tbody><!-- end tbody -->
                                                </table><!-- end table -->
                                                <?php echo $error ?>
                                            </div>
                                        </div>
                                    </div>

                                    <?php $error=""; $reg=false; ?>
                                    <div class="tab-pane fade" id="v-pills-ventas" role="tabpanel" aria-labelledby="v-pills-ventas">
                                        <div class="text-center pt-4 pb-2">
                                            <div class="table-responsive table-card">
                                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                    <thead class="text-muted table-light">
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Fecha</th>
                                                            <th scope="col">Monto</th>
                                                            <th scope="col">Estatus</th>
                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if($transacciones->toArray()): ?>  
                                                        <?php $reg=false; @$status="" ?>
                                                        <?php $__currentLoopData = $transacciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($transaccion->statusret==3): ?>  
                                                            <?php $reg=true;  ?>
                                                            <tr>
                                                                <td><?php echo e($transaccion->id); ?></td>
                                                                <td><?php echo e(date_format($transaccion->created_at,"Y/m/d H:i:s")); ?></td>
                                                                <?php if($transaccion->statusret==1): ?> <?php $class="text-info"; @$status="PENDIENTE" ?> <?php endif; ?>
                                                                <?php if($transaccion->statusret==2): ?> <?php $class="text-success"; @$status="APROBADO" ?> <?php endif; ?>
                                                                <?php if($transaccion->statusret==3): ?> <?php $class="text-danger"; @$status="NEGADO" ?> <?php endif; ?>
                                                                
                                                                <td>
                                                                    <span class="<?php echo e($class); ?>"><?php echo e(number_format($transaccion->monto,2)); ?> </span>
                                                                </td>
                                                                <td><span class="<?php echo e($class); ?>"><?php echo e($status); ?></span></td>
                                                               
                                                               
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                        <?php if($reg==false) { $error='<span class="p-2">No hay transacciones disponibles</span><br><br>'; } ?>
                                                        
                                                       
                                                    </tbody><!-- end tbody -->
                                                </table><!-- end table -->
                                                <?php echo $error ?>
                                            </div>
                                        </div>
                                    </div>
                                     
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
   
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<script>
    window.onload=function() {
        document.getElementById("v-pills-bill-todos").click();
        }

        function validarValor(obj)
{
//console.log(document.getElementById("valor").value);
//console.log('<?=$balance[0]->saldo ?>');

var saldomax='<?=@$balance[0]->saldo ?>';
var val=document.getElementById("monto").value;
val=parseFloat(val)
saldomax=parseFloat(saldomax)

if (val>saldomax)
{
    document.getElementById("monto").value=saldomax ;
}
}
function tipoPago(id)
{
    if (document.getElementById("forma").value==1){
        document.getElementById("dvCripto").style="display:none !important;"
        document.getElementById("dvTransferencia").style="display:flex !important;"
    }
    if (document.getElementById("forma").value==2){
        document.getElementById("dvTransferencia").style="display:none !important;"
        document.getElementById("dvCripto").style="display:flex !important;"
    }
}
    </script><?php /**PATH C:\xampp\htdocs\iprofitclub\resources\views/finanzas/compra.blade.php ENDPATH**/ ?>