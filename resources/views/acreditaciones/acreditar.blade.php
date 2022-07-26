<x-app-layout>
    <div class="row">
         
        <p class="text-uppercase fw-medium text-muted mb-0 pb-2" style="color:black !important">ACREDITACIONES</p>

        <div class="col-xl-9 col-md-10">
            <!-- card -->
            <form method="POST" action="{{route('acreditaciones.store')}}" enctype="multipart/form-data">
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
                   
                    <div class="d-flex align-items-end justify-content-between mt-2">
                        <div class="col-9">
                            <div class="pb-1">Seleecione la billetera a acreditar</div>
                            <select id="usuario" name="usuario" class="form-control col-10" >
                                <option value="0">Seleccione el usuario</option>
                                @foreach ( $usuarios as $usuario )
                                            <option value="{{$usuario->id}}">{{$usuario->email}}</option>
                                        @endforeach
                            </select>
                            
                        </div>

                        
                       
                    </div>

                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div class="col-9">
                            <div class="pb-1">Ingresa el monto</div>
                            <input type="number" id="monto"   name="monto" class="form-control col-10"   value="" placeholder="$ 0.00">
                            @error('monto')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="invalid-feedback">
                                                Por favor, ingrese el monto
                                            </div>
                        </div>

                        
                       
                    </div>
                     
                </div><!-- end card body -->
                @method('POST')
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
</x-app-layout>