<x-app-layout>
    <div class="row">
         

        <div class="col-xl-5 col-md-6">
            <!-- card -->
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
                            <p class="text-uppercase fw-medium text-muted mb-0">Mi balance</p>
                        </div>
                        <div class="flex-shrink-0">
                            <h5 class="text-muted fs-14 mb-0">
                                +0.00 %
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div class="col-9">
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value" data-target="@if (@$balance->saldo) {{$balance->saldo}} @else 0.00 @endif">@if (@$balance->saldo) {{$balance->saldo}} @else 0.00 @endif</span></h4>
                            
                            <input type="text" class="form-control col-10" id="basiInput" value="http://127.0.0.1:8000/register/{{auth()->user()->email}}" disabled>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-soft-primary rounded fs-3">
                                <i class="bx bx-wallet text-primary"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end card body -->
                <hr class="m-1">
                <div class="col-12 p-2 text-center">
                    <a class="btn btn-xs btn-outline-primary p-2" href="{{ route('finanzas.enviar') }}">
                        Enviar
                    </a>&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-xs btn-outline-primary p-2" target="_blank" href="https://api.whatsapp.com/send?phone=50761741514&text=Deseo%20comprar%20coins%20para%20mi%20cuenta%20iProfit">
                        Comprar
                    </a>
                         
                   
                </div>
            </div><!-- end card -->
          
        </div><!-- end col -->

       

       <!-- <div class="col-12 pt-4">
            <div class="col-xl-12">
                <h5>Últimos movimientos</h5>
            </div>
        </div>
    -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Últimos movimientos</h4>
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
                                        PÓLIZAS
                                    </span>
                                     
                                </button>
                                <button class="nav-link " id="v-pills-bill-compras" data-bs-toggle="pill" data-bs-target="#v-pills-compras" type="button" role="tab" aria-controls="v-pills-compras" aria-selected="false" data-position="1">
                                    <span class="step-title me-2">
                                        <i class="mdi mdi-arrow-right step-icon me-2"></i>
                                        COMPRAS
                                    </span>
                                     
                                </button>
                                <button class="nav-link " id="v-pills-bill-ventas" data-bs-toggle="pill" data-bs-target="#v-pills-ventas" type="button" role="tab" aria-controls="v-pills-ventas" aria-selected="false" data-position="1">
                                    <span class="step-title me-2">
                                        <i class="mdi mdi-arrow-right step-icon me-2"></i>
                                        VENTAS
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
                                                            <th scope="col">Tipo</th>
                                                            <th scope="col">Monto</th>
                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $class=""; @endphp
                                                        @if ($transacciones->toArray())  
                                                        @foreach ($transacciones as $transaccion )
                                                            <tr>
                                                                <td>{{$transaccion->id}}</td>
                                                                <td>{{date_format($transaccion->created_at,"Y/m/d H:i:s")}}</td>
                                                                <td>{{$transaccion->tipo()->nombre}}</td>
                                                                @if ($transaccion->tipo()->nombre=="COMPRA") @php $class="text-success"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="VENTA") @php $class="text-danger"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="POLIZA") @php $class="text-danger"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="SPONSORSHIP") @php $class="text-success"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="TRANSFERENCIA") @php $class="text-danger"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="INTERESES") @php $class="text-success"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="ENVIO") @php $class="text-danger"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="RECIBIDO") @php $class="text-success"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="INVERSION POLIZA") @php $class="text-success"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="GANANCIA POLIZA") @php $class="text-success"; @endphp @endif
                                                                <td>
                                                                    <span class="{{$class}}">{{number_format($transaccion->valor,2)}} </span>
                                                                </td>
                                                                
                                                            </tr><!-- end tr -->
                                                             
                                                        @endforeach
                                                        @else
                                                            @php $error='<span class="p-2">No hay transacciones disponibles</span><br><br>'; @endphp
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
                                                            <th scope="col">Tipo</th>
                                                            <th scope="col">Monto</th>
                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $error=""; $reg=false; @endphp
                                                        @if ($transacciones->toArray())  
                                                        @foreach ($transacciones as $transaccion )
                                                            @if ($transaccion->tipo()->nombre=="VENTA" || $transaccion->tipo()->nombre=="POLIZA"  || $transaccion->tipo()->nombre=="TRANSFERENCIA" )  
                                                            @php $reg=true; @endphp
                                                            <tr>
                                                                <td>{{$transaccion->id}}</td>
                                                                <td>{{date_format($transaccion->created_at,"Y/m/d H:i:s")}}</td>
                                                                <td>{{$transaccion->tipo()->nombre}}</td>
                                                                @if ($transaccion->tipo()->nombre=="COMPRA") @php $class="text-success"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="VENTA") @php $class="text-danger"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="POLIZA") @php $class="text-danger"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="SPONSORSHIP") @php $class="text-success"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="TRANSFERENCIA") @php $class="text-danger"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="INTERESES") @php $class="text-success"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="ENVIO") @php $class="text-danger"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="RECIBIDO") @php $class="text-success"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="INVERSION POLIZA") @php $class="text-success"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="GANANCIA POLIZA") @php $class="text-success"; @endphp @endif

                                                                <td>
                                                                    <span class="{{$class}}">{{number_format($transaccion->valor,2)}} </span>
                                                                </td>
                                                                
                                                            </tr><!-- end tr -->
                                                           @endif
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
                                    <div class="tab-pane fade" id="v-pills-ventas" role="tabpanel" aria-labelledby="v-pills-ventas">
                                        <div class="text-center pt-4 pb-2">
                                            <div class="table-responsive table-card">
                                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                    <thead class="text-muted table-light">
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Fecha</th>
                                                            <th scope="col">Tipo</th>
                                                            <th scope="col">Monto</th>
                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($transacciones->toArray())  
                                                        @foreach ($transacciones as $transaccion )
                                                            @if ($transaccion->tipo()->nombre=="VENTA")  
                                                            @php $reg=true; @endphp
                                                            <tr>
                                                                <td>{{$transaccion->id}}</td>
                                                                <td>{{date_format($transaccion->created_at,"Y/m/d H:i:s")}}</td>
                                                                <td>{{$transaccion->tipo()->nombre}}</td>
                                                                @if ($transaccion->tipo()->nombre=="COMPRA") @php $class="text-success"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="VENTA") @php $class="text-danger"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="POLIZA") @php $class="text-danger"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="SPONSORSHIP") @php $class="text-success"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="TRANSFERENCIA") @php $class="text-danger"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="INTERESES") @php $class="text-success"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="ENVIO") @php $class="text-danger"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="RECIBIDO") @php $class="text-success"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="INVERSION POLIZA") @php $class="text-success"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="GANANCIA POLIZA") @php $class="text-success"; @endphp @endif
                                                                <td>
                                                                    <span class="{{$class}}">{{number_format($transaccion->valor,2)}} </span>
                                                                </td>
                                                                
                                                                @else
                                                                @php $error='<span class="p-2">No hay transacciones disponibles</span><br><br>'; @endphp
                                                            @endif
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
                                    <div class="tab-pane fade" id="v-pills-compras" role="tabpanel" aria-labelledby="v-pills-compras">
                                        <div class="text-center pt-4 pb-2">
                                            <div class="table-responsive table-card">
                                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                    <thead class="text-muted table-light">
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Fecha</th>
                                                            <th scope="col">Tipo</th>
                                                            <th scope="col">Monto</th>
                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($transacciones->toArray())  
                                                        @foreach ($transacciones as $transaccion )
                                                            @if ($transaccion->tipo()->nombre=="COMPRA" || $transaccion->tipo()->nombre=="SPONSORSHIP"  || $transaccion->tipo()->nombre=="INTERESES" )  
                                                            @php $reg=true; @endphp
                                                            <tr>
                                                                <td>{{$transaccion->id}}</td>
                                                                <td>{{date_format($transaccion->created_at,"Y/m/d H:i:s")}}</td>
                                                                <td>{{$transaccion->tipo()->nombre}}</td>
                                                                @if ($transaccion->tipo()->nombre=="COMPRA") @php $class="text-success"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="VENTA") @php $class="text-danger"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="POLIZA") @php $class="text-danger"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="SPONSORSHIP") @php $class="text-success"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="TRANSFERENCIA") @php $class="text-danger"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="INTERESES") @php $class="text-success"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="INVERSION POLIZA") @php $class="text-success"; @endphp @endif
                                                                @if ($transaccion->tipo()->nombre=="GANANCIA POLIZA") @php $class="text-success"; @endphp @endif
                                                                <td>
                                                                    <span class="{{$class}}">{{number_format($transaccion->valor,2)}} </span>
                                                                </td>
                                                                
                                                                @else
                                                                @php if($reg==false) { $error='<span class="p-2">No hay transacciones disponibles</span><br><br>'; } @endphp
                                                            @endif
                                                        @endforeach
                                                        @else
                                                            @php $error='<span class="p-2">No hay transacciones disponibles</span><br><br>'; @endphp
                                                        @endif
                                                        
                                                       
                                                    </tbody><!-- end tbody -->
                                                </table><!-- end table -->
                                                @php echo $error @endphp
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
</x-app-layout>