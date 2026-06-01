@extends('plantilla')

@php
    $esAdmin = Session::get('es_admin', false);
@endphp

@section('contenido')

<div class="row">
    <div class="col-md-4">
        <!-- Perfil del Donante -->
        <div class="x_panel">
            <div class="x_title">
                <h2>Mi Perfil</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content text-center">
                @if($donante->foto)
                    <img src="{{ asset('img_donantes/'.$donante->foto) }}" 
                         class="img-circle img-thumbnail" width="150" height="150">
                @else
                    <img src="{{ asset('admin/images/img.jpg') }}" 
                         class="img-circle img-thumbnail" width="150" height="150">
                @endif
                
                <h3 class="mt-3">{{ $donante->nombre }} {{ $donante->paterno }}</h3>
                <p class="text-muted">CI: {{ $donante->ci }}</p>
                
                <div class="mt-3">
                    <span class="badge badge-danger p-2 fs-6">{{ $donante->tipo_sangre }}</span>
                </div>
                
                <div class="mt-4">
                    @if($esAdmin)
                        <a href="/donantes" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-arrow-left me-1"></i>Volver al Panel Admin
                 ah       </a>
                    @else
                        <a href="/donante/logout" class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-sign-out-alt me-1"></i>Cerrar Sesión
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Estadísticas de Donación -->
        <!-- Estadísticas de Donación -->
        <div class="x_panel">
            <div class="x_title">
                <h2>Mis Donaciones</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="text-center">
                    <div class="stat-number text-danger">{{ $donante->total_donaciones }}</div>
                    <h5>Total de Donaciones</h5>
                    
                    @if($donante->ultima_donacion)
                    <p class="text-muted">
                        <strong>Última donación:</strong><br>
                        {{ \Carbon\Carbon::parse($donante->ultima_donacion)->format('d/m/Y') }}
                    </p>
                    @else
                    <p class="text-muted">Aún no has realizado donaciones</p>
                    @endif
                    
                    <!-- SOLO MOSTRAR BOTÓN SI ES ADMIN -->
                    


                    @if(request()->path() == 'donante/panel-admin/1' || 
                        request()->path() == 'donante/panel-admin/2' || 
                        request()->path() == 'donante/panel-admin/3' ||
                        str_contains(request()->path(), 'donante/panel-admin/'))
                    <button class="btn btn-success btn-sm" onclick="registrarDonacion()">
                        <i class="fas fa-tint me-1"></i>Registrar Donación
                    </button>
                    @endif
                </div>
            </div>
        </div>


    </div>

    <div class="col-md-8">
        <!-- Información Personal -->
        <div class="x_panel">
            <div class="x_title">
                <h2>Mis Datos Personales</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="formDatosPersonales">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nombre Completo</label>
                                <input type="text" class="form-control" 
                                       value="{{ $donante->nombre }} {{ $donante->paterno }} {{ $donante->materno }}" 
                                       readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fecha de Nacimiento</label>
                                <input type="text" class="form-control" 
                                       value="{{ \Carbon\Carbon::parse($donante->fecha_nac)->format('d/m/Y') }}" 
                                       readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Celular *</label>
                                <input type="text" name="celular" class="form-control" 
                                       value="{{ $donante->celular }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Correo Electrónico *</label>
                                <input type="email" name="correo" class="form-control" 
                                       value="{{ $donante->correo }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tipo de Sangre</label>
                                <input type="text" class="form-control" 
                                       value="{{ $donante->tipo_sangre }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Estado</label>
                                <input type="text" class="form-control" 
                                       value="{{ $donante->estado }}" readonly>
                            </div>
                        </div>
                    </div>
                    
                    <h5 class="mt-4">Ubicación</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Departamento</label>
                                <select name="departamento" class="form-select">
                                    <option value="LA PAZ" {{ $donante->departamento == 'LA PAZ' ? 'selected' : '' }}>La Paz</option>
                                    <option value="ORURO" {{ $donante->departamento == 'ORURO' ? 'selected' : '' }}>Oruro</option>
                                    <option value="POTOSI" {{ $donante->departamento == 'POTOSI' ? 'selected' : '' }}>Potosí</option>
                                    <option value="COCHABAMBA" {{ $donante->departamento == 'COCHABAMBA' ? 'selected' : '' }}>Cochabamba</option>
                                    <option value="SANTA CRUZ" {{ $donante->departamento == 'SANTA CRUZ' ? 'selected' : '' }}>Santa Cruz</option>
                                    <option value="BENI" {{ $donante->departamento == 'BENI' ? 'selected' : '' }}>Beni</option>
                                    <option value="PANDO" {{ $donante->departamento == 'PANDO' ? 'selected' : '' }}>Pando</option>
                                    <option value="CHUQUISACA" {{ $donante->departamento == 'CHUQUISACA' ? 'selected' : '' }}>Chuquisaca</option>
                                    <option value="TARIJA" {{ $donante->departamento == 'TARIJA' ? 'selected' : '' }}>Tarija</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Municipio *</label>
                                <input type="text" name="municipio" class="form-control" 
                                       value="{{ $donante->municipio }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Zona/Barrio</label>
                                <input type="text" name="zona" class="form-control" 
                                       value="{{ $donante->zona }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Dirección</label>
                        <input type="text" name="direccion" class="form-control" 
                               value="{{ $donante->direccion }}">
                    </div>
                    
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Actualizar Mis Datos
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Historial de Donaciones -->
        <div class="x_panel">
            <div class="x_title">
                <h2>Mi Historial de Donaciones</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @if($donante->total_donaciones > 0)
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Has realizado <strong>{{ $donante->total_donaciones }}</strong> donación(es) en total.
                    </div>
                    
                    @if($donante->ultima_donacion)
                    <div class="card bg-light">
                        <div class="card-body">
                            <h6>Última Donación</h6>
                            <p class="mb-1">
                                <strong>Fecha:</strong> 
                                {{ \Carbon\Carbon::parse($donante->ultima_donacion)->format('d/m/Y') }}
                            </p>
                            <p class="mb-0">
                                <strong>Hace:</strong> 
                                {{ \Carbon\Carbon::parse($donante->ultima_donacion)->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                    @endif
                @else
                    <div class="alert alert-warning text-center">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Aún no has registrado ninguna donación.
                        <br>
                        <small>Cuando realices tu primera donación, aparecerá aquí tu historial.</small>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
// Actualizar datos personales
document.getElementById('formDatosPersonales').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('/donante/actualizar', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        alert(data.success);
    })
    .catch(error => {
        alert('Error al actualizar datos');
    });
});

// Registrar donación



</script>
@if($esAdmin)
<script>
// Registrar donación (SOLO PARA ADMINS)
function registrarDonacion() {
    if (!confirm('¿Confirmas que este donante realizó una donación hoy?')) {
        return;
    }
    
    fetch('/donante/registrar-donacion', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({})
    })
    .then(response => response.json())
    .then(data => {
        alert(data.success);
        location.reload();
    })
    .catch(error => {
        alert('Error al registrar donación');
    });
}
</script>
@endif
@endsection