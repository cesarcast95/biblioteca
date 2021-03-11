
@extends("theme.$theme.layout")
@section('titulo')
    Usuarios
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensaje')
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Usuarios</h3>
                <a href="{{route('crear_usuario')}}" class="btn btn-success btn-sm pull-right">Crear usuarios</a>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Nombre </th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$data->usuario}}</td>
                                <td>{{$data->nombre}}</td>
                                <td>{{$data->email}}</td>
                                <td>
                                    {{-- loop, si es la última iteración pone el nombre
                                        si no es la última pondrá el nombre, la coma y los demás
                                        roles que tenga asignados --}}
                                    @foreach ($data->roles as $rol)
                                        {{$loop->last ? $rol->nombre : $rol->nombre . ', '}}
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route("editar_usuario", ['id' => $data->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route("eliminar_usuario",  ['id' => $data->id])}}" class="d-inline form-eliminar" method="POST">
                                        @csrf @method("delete")
                                        <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro"><i class="fa fa-times-circle text-danger"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
