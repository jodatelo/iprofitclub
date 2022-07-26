@section('title', "Usuarios")

<x-app-layout>
    <div class="card card-animate p-3">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Users</h2>
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
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>DNI</th>
                <th>Email</th>
                <th>Cédula F</th>
                <th>Cédula R</th>
                <th width="160px">Actions</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>

                <td>{{ $user->dni }}</td>
                <td>{{ $user->email }}</td>
                <td><img src="{{ url('cedulas/'.$user->cedulafro) }}" style="height: 50px; width: 50px;"></td>
                <td><img src="{{ url('cedulas/'.$user->cedularev) }}" style="height: 50px; width: 50px;"></td>
                <td>
                    <form action="{{ route('usuarios.destroy',$user->id) }}" method="Post">
                        
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {{$users->links()}}
    </div>
</x-app-layout>