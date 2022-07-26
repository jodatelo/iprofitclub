<x-app-layout>
    <div class="row">
         
        <p class="text-uppercase fw-medium text-muted mb-0 pb-2" style="color:black !important">TRANSFERIR SALDO DE TU BILLETERA</p>

        <div class="col-xl-6 col-md-8">
            <!-- card -->
            <form method="POST" action="{{route('finanzas.store')}}" enctype="multipart/form-data">
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
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div class="col-9">
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value text-success" data-target="@if (@$balance[0]->saldo) {{$balance[0]->saldo}} @else $ 0.00 @endif">@if (@$balance[0]->saldo) {{'$ '.$balance[0]->saldo}} @else $ 0.00 @endif</span></h4>
                            <div class="pb-1">Ingresa el correo de la billetera a transferir</div>
                            <input type="mail" id="email" name="email" class="form-control col-10"   value="" placeholder="micorreo@direccion.com">
                            
                        </div>

                        
                       
                    </div>

                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div class="col-9">
                            <div class="pb-1">Ingresa el monto</div>
                            <input type="number" id="monto" onkeyup="javascript:validarValor(this);" name="monto" class="form-control col-10"   value="" placeholder="$ 0.00">
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
                        <i class="fa fa-save"></i>&nbsp;Enviar</button>
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
     </script>
</x-app-layout>