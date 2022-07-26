@section('title', "Acreditaciones")
 

<x-app-layout>
    <a href="{{route('acreditaciones.acreditar')}}" class="btn btn-success mb-2">
        <i class="fas fa-trash">ACREDITAR</i>
    </a>
    <div class="card card-animate p-3">
        
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Acreditaciones</h2>
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
     
        
                
                <th>Estado</th>
                <th width="160px">Accion</th>
            </tr>
            @foreach ($compras as $user)
                @if ( $user->statuscomp==1 ) @php $class="text-success bg-soft-success "; $estatus="ACREDITADA";   @endphp  @endif
                @if ( $user->statuscomp==2 ) @php $class="text-danger bg-soft-danger "; $estatus="REVERSADA";   @endphp  @endif
                
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->usuario()->email }}</td>

                <td>{{ $user->monto }}</td>
 
                <td><span class=" p-2 {{$class}}">{{ $estatus }} </span></td>
                <td>
                    @if ( $user->statuscomp==2 )
                    <form action="{{ route('retiros.aceptar',$user->id) }}" method="Post">
                        
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-trash">ACREDITAR</i>
                        </button>
                    </form>
                    @endif
                    @if ( $user->statuscomp==1 )

                    <form action="{{ route('retiros.eliminar',$user->id) }}" method="Post">
                        
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash">REVERSAR</i>
                        </button>
                    </form>
                    @endif

                </td>
            </tr>
            @endforeach
        </table>
        {{$compras->links()}}
    </div>
</x-app-layout>