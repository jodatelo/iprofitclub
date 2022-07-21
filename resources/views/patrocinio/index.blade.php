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
                @if (\Session::has('msg'))
                <div class="alert  {!! \Session::get('clase') !!} m-2">
                    <ul style="" class="p-0 m-0">
                        <li style="list-style: none;">{!! \Session::get('msg') !!}</li>
                    </ul>
                </div>
                @endif
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
                                    @php $error=""; $disable=""; @endphp
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
                                                        @if ($patrocinios->toArray())  
                                                        @foreach ($patrocinios as $patrocinio )
                                                            <tr>
                                                                <td>{{$patrocinio->id}}</td>
                                                                <td>{{date_format($patrocinio->created_at,"Y/m/d H:i:s")}}</td>
                                                                @if ($patrocinio->statustrans==1) @php $classtext="text-info"; $class="btn-secondary"; $disable="disabled"; $textbutton="No asignado"; @endphp @endif
                                                                @if ($patrocinio->statustrans==2) @php $classtext="text-info"; $class="btn-info"; $disable="disabled"; $textbutton="No disponible"; @endphp @endif
                                                                @if ($patrocinio->statustrans==3) @php $classtext="text-success"; $class="btn-success"; $disable=""; $textbutton="Cobrar"; @endphp @endif
                                                                @if ($patrocinio->statustrans==4) @php $classtext="text-success"; $class="btn-outline-success"; $disable="disabled"; $textbutton="Cobrado"; @endphp @endif
                                                                <td><span class="{{$classtext}}">$ {{number_format($patrocinio->valor,2)}}</span></td>
                                                                <td>
                                                                    <button class="btn btn-xs {{$class}} {{$disable}} p-2"> {{$textbutton}} </button>
                                                                </td>
                                                                
                                                            </tr><!-- end tr -->
                                                             
                                                        @endforeach
                                                        @else
                                                            @php $error='<span class="p-2">No hay patrocinios disponibles</span><br><br>'; @endphp
                                                        @endif
                                                        
                                                       
                                                    </tbody><!-- end tbody -->
                                                </table><!-- end table -->
                                                @php echo $error @endphp
                                            </div>
                                        </div>
                                    </div>
                                    @php $error="" ; @endphp

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
 
                                                        @if ($patrocinios->toArray() )  
                                                        @foreach ($patrocinios as $patrocinio )
                                                            @if ($patrocinio->statustrans==1 || $patrocinio->statustrans==2 )  
                                                                @if ((date("Y-m-d",strtotime($patrocinio->created_at."+ 30 days")) > date('Y-m-d') ) )  
                                                               
                                                                <tr>
                                                                    <td>{{$patrocinio->id}}</td>
                                                                    <td>{{date_format($patrocinio->created_at,"Y/m/d H:i:s")}}</td>
                                                                    <td>$ {{number_format($patrocinio->valor,2)}}</td>
                                                                    @if ($patrocinio->statustrans==1) @php $class="text-info"; @endphp @endif
                                                                    @if ($patrocinio->statustrans==2) @php $class="text-info"; @endphp @endif
                                                                    
                                                                    <td>
                                                                        <button class="btn btn-xs btn-secondary p-2" disabled> No Asignado </button>
                                                                    </td>
                                                                    
                                                                </tr><!-- end tr -->
                                                                @endif
                                                            
                                                            @else
                                                                @php $error='<span class="p-2">No hay patrocinios no disponibles</span><br><br>'; @endphp
                                                            @endif
                                                        @endforeach
                                                        @else
                                                            @php $error='<span class="p-2">No hay patrocinios no disponibles</span><br><br>'; @endphp
                                                        @endif
                                                        
                                                       
                                                    </tbody><!-- end tbody -->
                                                </table><!-- end table -->
                                                @php echo $error @endphp
                                            </div>
                                        </div>
                                    </div>
                                    @php $error="" ; @endphp

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
                                                        @if ($patrocinios->toArray() )  
                                                        @foreach ($patrocinios as $patrocinio )
                                                            @if ($patrocinio->statustrans==3 || ( $patrocinio->statustrans==1 &&  (date("Y-m-d",strtotime($patrocinio->created_at."+ 30 days")) <= date('Y-m-d') ) ) )  
                                                            <tr>
                                                                <td>{{$patrocinio->id}}</td>
                                                                <td>{{date_format($patrocinio->created_at,"Y/m/d H:i:s")}}</td>
                                                                <td>$ {{number_format($patrocinio->valor,2)}}</td>
                                                                @if ($patrocinio->statustrans==3) @php $class="text-success"; @endphp @endif
                                                                 @if ($patrocinio->statustrans==1 &&  (date("Y-m-d",strtotime($patrocinio->created_at."+ 30 days")) <= date('Y-m-d') ) ) ) @php $class="btn-success"; @endphp @endif
                                                                <td>
                                                                    <a href="{{route('patrocinios.cobrar',$patrocinio->id)}}" class="btn btn-xs {{$class}} p-2" > Cobrar </a>
                                                                </td>
                                                                
                                                            </tr><!-- end tr -->
                                                            @else
                                                                @php $error='<span class="p-2">No hay patrocinios disponibles</span><br><br>'; @endphp
                                                            @endif
                                                        @endforeach
                                                        @else
                                                            @php $error='<span class="p-2">No hay patrocinios disponibles</span><br><br>'; @endphp
                                                        @endif
                                                        
                                                       
                                                    </tbody><!-- end tbody -->
                                                </table><!-- end table -->
                                                @php echo $error @endphp
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
                                                        @php $error="" ; @endphp
                                                        @if ($patrocinios->toArray() )  
                                                        @foreach ($patrocinios as $patrocinio )
                                                            @if ($patrocinio->statustrans==4 )  
                                                            <tr>
                                                                <td>{{$patrocinio->id}}</td>
                                                                <td>{{date_format($patrocinio->created_at,"Y/m/d H:i:s")}}</td>
                                                                <td>$ {{number_format($patrocinio->valor,2)}}</td>
                                                                @if ($patrocinio->statustrans==4) @php $class="btn-outline-success"; @endphp @endif
                                                                
                                                                <td>
                                                                    <button class="btn btn-xs {{$class}} p-2" disabled> Cobrado </button>
                                                                </td>
                                                                
                                                            </tr><!-- end tr -->
                                                            @else
                                                                @php $error='<span class="p-2">No hay patrocinios cobrados</span><br><br>'; @endphp
                                                            @endif
                                                        @endforeach
                                                        @else
                                                            @php $error='<span class="p-2">No hay patrocinios cobrados</span><br><br>'; @endphp
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