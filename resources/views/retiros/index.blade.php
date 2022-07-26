@section('title', "Retiros")

<x-app-layout>
    <div class="card card-animate p-3">
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
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Monto</th>
                <th>Banco</th>
                <th># de Cuenta</th>
                <th>Cédula Frente</th>
                <th>Cédula Reverso</th>
                
                <th>Estado</th>
                <th width="160px">Accion</th>
            </tr>
            @foreach ($compras as $user)
                @if ( $user->statusret==1 ) @php $class="text-primary bg-soft-primary "; $estatus="PENDIENTE";   @endphp  @endif
                @if ( $user->statusret==2 ) @php $class="text-success bg-soft-success "; $estatus="ACEPTADO";   @endphp  @endif
                @if ( $user->statusret==3 ) @php $class="text-danger bg-soft-danger "; $estatus="NEGADO";   @endphp  @endif
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->usuario()->email }}</td>

                <td>{{ $user->monto }}</td>
                <td>{{ $user->banco()->nombre }}</td>
                <td>{{ $user->ntransaccion }}</td>
                <td><a href="{{ url('cedulas/'.$user->usuario()->cedulafro) }}" target="_blank"><img src="{{ url('cedulas/'.$user->usuario()->cedulafro) }}" style="height: 50px; width: 50px;"></a></td>
                <td><a href="{{ url('cedulas/'.$user->usuario()->cedulafro) }}" target="_blank"><img src="{{ url('cedulas/'.$user->usuario()->cedularev) }}" style="height: 50px; width: 50px;"></a></td>
 
                <td><span class=" p-2 {{$class}}">{{ $estatus }} </span></td>
                <td>
                    @if ( $user->statusret==1 )
                    <form action="{{ route('retiros.aceptar',$user->id) }}" method="Post">
                        
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-trash">Aceptar</i>
                        </button>
                    </form>
                    @endif
                    <form action="{{ route('retiros.eliminar',$user->id) }}" method="Post">
                        
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash">Eliminar</i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {{$compras->links()}}
    </div>
</x-app-layout>