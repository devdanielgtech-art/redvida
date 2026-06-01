@extends('plantilla')

@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Gestión de Donantes</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <a href="/nuevoRegistroDonante" class="btn btn-success"><i class="fa fa-plus"></i> Nuevo Donante</a>
                <a href="/buscarDonantes" class="btn btn-primary"><i class="fa fa-search"></i> Buscar por Tipo de Sangre</a>
                
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>CI</th>
                            <th>Nombre Completo</th>
                            <th>Tipo Sangre</th>
                            <th>Celular</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listado as $item)
                        <tr>
                            <td>
                                @if($item->foto)
                                    <img src="{{ asset('img_donantes/'.$item->foto) }}" width="50" height="50" class="img-circle">
                                @else
                                    <img src="{{ asset('admin/images/img.jpg') }}" width="50" height="50" class="img-circle">
                                @endif
                            </td>
                            <td>{{ $item->ci }}</td>
                            <td>{{ $item->nombre }} {{ $item->paterno }} {{ $item->materno }}</td>
                            <td><span class="badge badge-danger">{{ $item->tipo_sangre }}</span></td>
                            <td>{{ $item->celular }}</td>
                            <td>
                                @if($item->estado == 'ACTIVO')
                                    <span class="badge badge-success">ACTIVO</span>
                                @else
                                    <span class="badge badge-danger">INACTIVO</span>
                                @endif
                            </td>
                            <td>
                                <a href="/editarRegistroDonante/{{ $item->id }}" class="btn btn-warning btn-sm">Editar</a>
                                <a href="/estadoDonante/{{ $item->id }}" class="btn btn-info btn-sm">
                                    @if($item->estado == 'ACTIVO')
                                        Inactivar
                                    @else
                                        Activar
                                    @endif
                                </a>
                                <a href="/donante/panel-admin/{{ $item->id }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-eye me-1"></i>Ver Registro
                                </a>
                                <a href="/eliminarDonante/{{ $item->id }}" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar?')">
                                    <i class="fas fa-trash me-1"></i>Eliminar
                                </a>
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