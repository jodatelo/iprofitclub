<x-app-layout>
    <div class="row">
        

       <!-- <div class="col-12 pt-4">
            <div class="col-xl-12">
                <h5>Últimos movimientos</h5>
            </div>
        </div>
    -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Patrocinios</h4>
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
                                        Disponibles
                                    </span>
                                     
                                </button>
                                <button class="nav-link" id="v-pills-recibidos" data-bs-toggle="pill" data-bs-target="#v-pills-recibidos" type="button" role="tab" aria-controls="v-pills-recibidos" aria-selected="false" data-position="2">
                                    <span class="step-title me-2">
                                        <i class="mdi mdi-arrow-right step-icon me-2"></i>
                                        No Disponibles
                                    </span>
                                     
                                </button>
                            
                            </div>
                            <!-- end nav -->
                        </div> <!-- end col-->
                        <div class="col-lg-6">
                            <div class="px-lg-4">
                                <div class="tab-content">
                                     
                                     
                                    <!-- end tab pane -->
                                    @php $error=""; @endphp
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
                                                        @if ($transacciones)  
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
                                                        @if ($transacciones)  
                                                        @foreach ($transacciones as $transaccion )
                                                            @if ($transaccion->tipo()->nombre=="VENTA" || $transaccion->tipo()->nombre=="POLIZA"  || $transaccion->tipo()->nombre=="TRANSFERENCIA" )  
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
                                                                <td>
                                                                    <span class="{{$class}}">{{number_format($transaccion->valor,2)}} </span>
                                                                </td>
                                                                
                                                            </tr><!-- end tr -->
                                                            @else
                                                                @php $error='<span class="p-2">No hay transacciones disponibles</span><br><br>'; @endphp
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
                                    <div class="tab-pane fade" id="v-pills-recibidos" role="tabpanel" aria-labelledby="v-pills-recibidos">
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
                                                        @if ($transacciones)  
                                                        @foreach ($transacciones as $transaccion )
                                                            @if ($transaccion->tipo()->nombre=="COMPRA" || $transaccion->tipo()->nombre=="SPONSORSHIP"  || $transaccion->tipo()->nombre=="INTERESES" )  
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
                                                                <td>
                                                                    <span class="{{$class}}">{{number_format($transaccion->valor,2)}} </span>
                                                                </td>
                                                                
                                                                @else
                                                                @php $error='<span class="p-2">No hay transacciones disponibles</span><br><br>'; @endphp
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
     
</x-app-layout>