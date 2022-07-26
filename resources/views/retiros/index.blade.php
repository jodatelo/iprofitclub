@section('title', "Retiros")

<x-app-layout>
    <div class="content card card-animate p-3">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Retiros</h2>
                </div>
                <!--<div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('usuarios.index') }}">
                        <i class="fa fa-plus"></i> Create User
                    </a>
                </div>-->
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p class="p-0 m-0">{{ $message }}</p>
        </div>
        @endif
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
            @foreach ($retirostrans as $user)
                @if ( $user->statusret==1 ) @php $class="text-primary bg-soft-primary "; $estatus="PENDIENTE";   @endphp  @endif
                @if ( $user->statusret==2 ) @php $class="text-success bg-soft-success "; $estatus="ACEPTADO";   @endphp  @endif
                @if ( $user->statusret==3 ) @php $class="text-danger bg-soft-danger "; $estatus="NEGADO";   @endphp  @endif
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->usuario()->email }}</td>

                <td>{{ $user->monto }}</td>
                <td>T. BANCARIA</td>
                <td>{{ $user->banco }}</td>
                <td>{{ $user->tipocuenta }}</td>
                <td>{{ $user->ncuenta }}</td>
                <td>{{ $user->cedulatit }}</td>
                <td>{{ $user->nombretit }}</td>
                <td><a href="{{ url('cedulas/'.$user->usuario()->cedulafro) }}" target="_blank"><img src="{{ url('cedulas/'.$user->usuario()->cedulafro) }}" style="height: 50px; width: 50px;"></a></td>
                <td><a href="{{ url('cedulas/'.$user->usuario()->cedulafro) }}" target="_blank"><img src="{{ url('cedulas/'.$user->usuario()->cedularev) }}" style="height: 50px; width: 50px;"></a></td>
 
                <td><span class=" p-2 {{$class}}">{{ $estatus }} </span></td>
                <td>
                    @if ( $user->statusret==1 )
                    <div class="row">
                    <form action="{{ route('retiros.aceptar',$user->id) }}" method="post" class="col-6 ">
                        
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-trash">AC</i>
                        </button>
                    </form>
                    <form action="{{ route('retiros.eliminar',$user->id) }}" method="post" class="col-6 ">
                        
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash">EL</i>
                        </button>
                    </form>
                    </div>
                    @endif
                    @if ( $user->statusret==2 )

                    <form action="{{ route('retiros.eliminar',$user->id) }}" method="Post">
                        
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash">REV</i>
                        </button>
                    </form>
                    @endif

                </td>
            </tr>
            @endforeach
        </table>
        </div>
        {{$retirostrans->links()}}
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
                @foreach ($retirosbit as $user)
                    @if ( $user->statusret==1 ) @php $class="text-primary bg-soft-primary "; $estatus="PENDIENTE";   @endphp  @endif
                    @if ( $user->statusret==2 ) @php $class="text-success bg-soft-success "; $estatus="ACEPTADO";   @endphp  @endif
                    @if ( $user->statusret==3 ) @php $class="text-danger bg-soft-danger "; $estatus="NEGADO";   @endphp  @endif
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->usuario()->email }}</td>
    
                    <td>{{ $user->monto }}</td>
                    <td>{{ $user->formap()->nombre }}</td>
                  
                    <td>{{ $user->moneda }}</td>
                    <td>{{ $user->red }}</td>
                    <td>{{ $user->wallet }}</td>
                    <td><a href="{{ url('cedulas/'.$user->usuario()->cedulafro) }}" target="_blank"><img src="{{ url('cedulas/'.$user->usuario()->cedulafro) }}" style="height: 50px; width: 50px;"></a></td>
                    <td><a href="{{ url('cedulas/'.$user->usuario()->cedulafro) }}" target="_blank"><img src="{{ url('cedulas/'.$user->usuario()->cedularev) }}" style="height: 50px; width: 50px;"></a></td>
     
                    <td><span class=" p-2 {{$class}}">{{ $estatus }} </span></td>
                    <td>
                        @if ( $user->statusret==1 )
                        <div class="row">
                        <form action="{{ route('retiros.aceptar',$user->id) }}" method="post" class="col-6 ">
                            
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-trash">AC</i>
                            </button>
                        </form>
                        <form action="{{ route('retiros.eliminar',$user->id) }}" method="post" class="col-6 ">
                            
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash">EL</i>
                            </button>
                        </form>
                        </div>
                        @endif
                        @if ( $user->statusret==2 )

                        <form action="{{ route('retiros.eliminar',$user->id) }}" method="Post">
                            
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash">EL</i>
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
            </div>
            {{$retirostrans->links()}}
    </div>
</x-app-layout>
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
</style>