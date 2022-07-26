@section('title', "Retiros")
<x-app-layout>
    <div class="row">
         
        <p class="text-uppercase fw-medium text-muted mb-0 pb-2" style="color:black !important">RETIRAR SALDO</p>

        <div class="col-xl-8 col-md-10">
            <!-- card -->
            <form method="POST" action="{{route('finanzas.solicitar')}}" enctype="multipart/form-data">
                @csrf
                <div class="card card-animate">
                    @if (\Session::has('msg'))
                    <div class="alert  {!! \Session::get('clase') !!} m-2">
                        <ul style="" class="p-0 m-0">
                            <li style="list-style: none;">{!! \Session::get('msg') !!}</li>
                        </ul>
                    </div>
                    @endif
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
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="  text-success" data-target="@if (@$balance[0]->saldo) {{number_format($balance[0]->saldo,2)}} @else $ 0.00 @endif">@if (@$balance[0]->saldo) {{'$ '.number_format($balance[0]->saldo,2)}} @else $ 0.00 @endif</span></h4>
                            
                            
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <div class="pb-1">Ingresa el monto</div>
                                    <input type="number" onkeyup="javascript:validarValor(this);" id="monto" name="monto" class="form-control col-12"   value="" placeholder="$ 0.00">
                                    @error('monto')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <div class="invalid-feedback">
                                                        Por favor, ingrese el monto
                                                    </div>
                                </div>
                                <div class="col-6 mb-2">
                                    <div class="pb-1">Forma de pago</div>
                                    <select  id="forma" onchange="javascript:tipoPago(this);" name="forma" class="form-control col-12"   value="">
                                        <option select="0">Seleccione</option>
                                        @foreach ( $formas as $forma )
                                            <option value="{{$forma->id}}">{{$forma->nombre}}</option>
                                        @endforeach
                                    </select>
                                    @error('forma')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
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
                                        
                                        @error('banco')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <div class="invalid-feedback">
                                                            Por favor, ingrese la forma de pago
                                                        </div>
                                    </div>
                                    <div class="col-6 mb-2 ">
                                        <div class="pb-1">Tipo Cuenta</div>
                                        <input type="text" id="tcuenta" name="tcuenta" class="form-control col-12"   value="" placeholder="EJ.: CUENTA AHORROS">
                                        @error('tcuenta')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <div class="invalid-feedback">
                                                            Por favor, ingrese elnúmero de transacción
                                                        </div>
                                    </div>

                                    <div class="col-6 mb-2 ">
                                        <div class="pb-1">Número de cuenta</div>
                                        <input type="number" id="transaccion" name="transaccion" class="form-control col-12"   value="" placeholder="# 121323233">
                                        @error('transaccion')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <div class="invalid-feedback">
                                                            Por favor, ingrese el número de cuenta
                                                        </div>
                                    </div>
                                    <div class="col-6 mb-2 ">
                                        <div class="pb-1">Nombre Titular</div>
                                        <input type="text" id="ntitular" name="ntitular" class="form-control col-12"   value="" placeholder="EJ: JOSÉ PEREZ">
                                        @error('ntitular')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <div class="invalid-feedback">
                                                            Por favor, ingrese el nombre del titular
                                                        </div>
                                    </div>
                                    <div class="col-6 mb-2 ">
                                        <div class="pb-1">Cédula del titular</div>
                                        <input type="text" id="ctitular" name="ctitular" class="form-control col-12"   value="" placeholder="# 0930532611">
                                        @error('transaccion')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
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
                                        
                                        @error('moneda')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <div class="invalid-feedback">
                                                            Por favor, ingrese la moneda
                                                        </div>
                                    </div>
                                    <div class="col-6 mb-2 ">
                                        <div class="pb-1">Red</div>
                                        <input type="text" id="redn" name="redn" class="form-control col-12"   value="" placeholder="">
                                        @error('redn')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <div class="invalid-feedback">
                                                            Por favor, ingrese la red
                                                        </div>
                                    </div>
                                    <div class="col-6 mb-2 ">
                                        <div class="pb-1">Wallet</div>
                                        <input type="number" id="wallet" name="wallet" class="form-control col-12"   value="" placeholder="# 121323233">
                                        @error('transaccion')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <div class="invalid-feedback">
                                                            Por favor, ingrese el wallet
                                                        </div>
                                    </div>
                                </div>
                               
                                <div class="col-6 mb-2 d-none">
                                    <div class="pb-1">Foto / Comprobante</div>
                                    <input type="file" id="archivo" name="archivo" class="form-control col-12"   value="" placeholder="$ 0.00">
                                    @error('archivo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="invalid-feedback">
                                        Por favor, ingrese el monto
                                    </div>
                                </div>
                                <div class="col-6 mb-2">
                                </div>
                                @if (!auth()->user()->cedulafro)
                                    <hr>
                                    <div class="col-12 mb-2">
                                        <span><b>¿Es tu primer retiro?</b></span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div class="pb-1">Foto de tu cédula de frente</div>
                                        <img class="col-12 mb-2" src="/images/cedulafrente.png" />
                                        <input type="file" id="cedulafro" name="cedulafro" class="form-control col-12"   value="" placeholder="$ 0.00">
                                        @error('cedulafro')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="invalid-feedback">
                                            Por favor, ingrese la foto 
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div class="pb-1">Foto del reverso de tu cédula</div>
                                        <img class="col-12 mb-2" src="/images/cedulareverso.png" />
                                        <input type="file" id="cedularev" name="cedularev" class="form-control col-12"   value="" placeholder="$ 0.00">
                                        @error('cedularev')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="invalid-feedback">
                                            Por favor, ingrese la foto 
                                        </div>
                                    </div>
                                @endif
                            </div>
                            
                                                      
                        </div>

                        
                       
                    </div>

                   
                     
                </div><!-- end card body -->
                @method('POST')
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
                                    @php $error=""; $reg=false; @endphp
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
                                                        @if ($transacciones->toArray())  
                                                        @foreach ($transacciones as $transaccion )
                                                             
                                                            @php $reg=true; @$status="" @endphp
                                                            <tr>
                                                                <td>{{$transaccion->id}}</td>
                                                                <td>{{date_format($transaccion->created_at,"Y/m/d H:i:s")}}</td>
                                                                @if ($transaccion->statusret==1) @php $class="text-info"; @$status="PENDIENTE" @endphp @endif
                                                                @if ($transaccion->statusret==2) @php $class="text-success"; @$status="APROBADO" @endphp @endif
                                                                @if ($transaccion->statusret==3) @php $class="text-danger"; @$status="NEGADO" @endphp @endif
                                                                
                                                                <td>
                                                                    <span class="{{$class}}">{{number_format($transaccion->monto,2)}} </span>
                                                                </td>
                                                                <td><span class="{{$class}}">{{$status}}</span></td>
                                                                
                                                        @endforeach
                                                        @else
                                                            @php if($reg==false) { $error='<span class="p-2">No hay transacciones disponibles</span><br><br>'; } @endphp
                                                        @endif
                                                        
                                                       
                                                    </tbody><!-- end tbody -->
                                                </table><!-- end table -->
                                                @php echo $error @endphp
                                            </div>
                                        </div>
                                    </div>
                                    @php $error=""; $reg=false; @endphp
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
                                                        @if ($transacciones->toArray())  
                                                        @php $reg=false; @$status="" @endphp
                                                        @foreach ($transacciones as $transaccion )
                                                            @if ($transaccion->statusret==1)  
                                                            @php $reg=true;  @endphp
                                                            <tr>
                                                                <td>{{$transaccion->id}}</td>
                                                                <td>{{date_format($transaccion->created_at,"Y/m/d H:i:s")}}</td>
                                                                @if ($transaccion->statusret==1) @php $class="text-info"; @$status="PENDIENTE" @endphp @endif
                                                                @if ($transaccion->statusret==2) @php $class="text-success"; @$status="APROBADO" @endphp @endif
                                                                @if ($transaccion->statusret==3) @php $class="text-danger"; @$status="NEGADO" @endphp @endif
                                                                
                                                                <td>
                                                                    <span class="{{$class}}">{{number_format($transaccion->monto,2)}} </span>
                                                                </td>
                                                                <td><span class="{{$class}}">{{$status}}</span></td>
                                                                
                                                                @else
                                                        
                                                            @endif
                                                        @endforeach
                                                        
                                                        @endif
                                                        @php if($reg==false) { $error='<span class="p-2">No hay transacciones disponibles</span><br><br>'; } @endphp
                                                        
                                                       
                                                    </tbody><!-- end tbody -->
                                                </table><!-- end table -->
                                                @php echo $error @endphp
                                            </div>
                                        </div>
                                    </div>
                                    @php $error=""; $reg=false; @endphp
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
                                                        @if ($transacciones->toArray())  
                                                        @foreach ($transacciones as $transaccion )
                                                        @php $reg=true; @$status="" @endphp
                                                            @if ($transaccion->statusret==2)  
                                                            @php $reg=true;  @endphp
                                                            <tr>
                                                                <td>{{$transaccion->id}}</td>
                                                                <td>{{date_format($transaccion->created_at,"Y/m/d H:i:s")}}</td>
                                                                @if ($transaccion->statusret==1) @php $class="text-info"; @$status="PENDIENTE" @endphp @endif
                                                                @if ($transaccion->statusret==2) @php $class="text-success"; @$status="APROBADO" @endphp @endif
                                                                @if ($transaccion->statusret==3) @php $class="text-danger"; @$status="NEGADO" @endphp @endif
                                                                
                                                                <td>
                                                                    <span class="{{$class}}">{{number_format($transaccion->monto,2)}} </span>
                                                                </td>
                                                                <td><span class="{{$class}}">{{$status}}</span></td>
                                                                
                                                                @else
                                                 
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    @php if($reg==false) { $error='<span class="p-2">No hay transacciones disponibles</span><br><br>'; } @endphp       
                                                       
                                                    </tbody><!-- end tbody -->
                                                </table><!-- end table -->
                                                @php echo $error @endphp
                                            </div>
                                        </div>
                                    </div>

                                    @php $error=""; $reg=false; @endphp
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
                                                        @if ($transacciones->toArray())  
                                                        @php $reg=false; @$status="" @endphp
                                                        @foreach ($transacciones as $transaccion )
                                                        @if ($transaccion->statusret==3)  
                                                            @php $reg=true;  @endphp
                                                            <tr>
                                                                <td>{{$transaccion->id}}</td>
                                                                <td>{{date_format($transaccion->created_at,"Y/m/d H:i:s")}}</td>
                                                                @if ($transaccion->statusret==1) @php $class="text-info"; @$status="PENDIENTE" @endphp @endif
                                                                @if ($transaccion->statusret==2) @php $class="text-success"; @$status="APROBADO" @endphp @endif
                                                                @if ($transaccion->statusret==3) @php $class="text-danger"; @$status="NEGADO" @endphp @endif
                                                                
                                                                <td>
                                                                    <span class="{{$class}}">{{number_format($transaccion->monto,2)}} </span>
                                                                </td>
                                                                <td><span class="{{$class}}">{{$status}}</span></td>
                                                               
                                                               
                                                            @endif
                                                        @endforeach
                                                        @endif
                                                        @php if($reg==false) { $error='<span class="p-2">No hay transacciones disponibles</span><br><br>'; } @endphp
                                                        
                                                       
                                                    </tbody><!-- end tbody -->
                                                </table><!-- end table -->
                                                @php echo $error @endphp
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
   
</x-app-layout>
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
    </script>