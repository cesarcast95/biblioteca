@extends("theme.$theme.layout")

@section('titulo')
    Sistema Menús
@endsection

{{-- para llamar la valiación por jquery --}}
@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/menu/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        {{-- Alerta de errores --}}
        @include('includes.form-error')
        @include('includes.mensaje')
        <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Crear Menús</h3>
              <a href="{{route('menu')}}" class="btn btn-info btn-sm pull-right">Listado</a>
            </div>
            <!-- /.box-header -->
            <form action="{{route('guardar_menu')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                    @csrf

                    {{-- Contenido del formulario --}}
                    @include('admin.menu.form')

                <!-- /.box-body -->
                {{-- Botones --}}
                <div class="box-footer">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                    @include('includes.boton-form-crear')
                    </div>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
</div>
@endsection
