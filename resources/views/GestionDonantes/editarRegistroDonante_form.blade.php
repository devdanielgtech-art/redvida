@extends('plantilla')

@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Editar Donante</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="formDonante" action="/guardarEditarDonante" method="POST">
                    @csrf
                    <input type="hidden" name="id_donante" value="{{ $obj->id }}">
                    <input type="hidden" name="foto_actual" value="{{ $obj->foto }}">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>CI:</label>
                                <input type="text" name="txt_ci" class="form-control" value="{{ $obj->ci }}" required>
                            </div>
                            <div class="form-group">
                                <label>Nombre:</label>
                                <input type="text" name="txt_nombre" class="form-control" value="{{ $obj->nombre }}" required>
                            </div>
                            <div class="form-group">
                                <label>Apellido Paterno:</label>
                                <input type="text" name="txt_paterno" class="form-control" value="{{ $obj->paterno }}" required>
                            </div>
                            <div class="form-group">
                                <label>Apellido Materno:</label>
                                <input type="text" name="txt_materno" class="form-control" value="{{ $obj->materno }}" required>
                            </div>
                            <div class="form-group">
                                <label>Fecha Nacimiento:</label>
                                <input type="date" name="txt_fecha_nac" class="form-control" value="{{ $obj->fecha_nac }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Correo:</label>
                                <input type="email" name="txt_correo" class="form-control" value="{{ $obj->correo }}">
                            </div>
                            <div class="form-group">
                                <label>Celular:</label>
                                <input type="number" name="txt_celular" class="form-control" value="{{ $obj->celular }}" required>
                            </div>
                            <div class="form-group">
                                <label>Tipo de Sangre:</label>
                                <select name="txt_tipo_sangre" class="form-control" required>
                                    <option value="A+" {{ $obj->tipo_sangre == 'A+' ? 'selected' : '' }}>A+</option>
                                    <option value="A-" {{ $obj->tipo_sangre == 'A-' ? 'selected' : '' }}>A-</option>
                                    <option value="B+" {{ $obj->tipo_sangre == 'B+' ? 'selected' : '' }}>B+</option>
                                    <option value="B-" {{ $obj->tipo_sangre == 'B-' ? 'selected' : '' }}>B-</option>
                                    <option value="AB+" {{ $obj->tipo_sangre == 'AB+' ? 'selected' : '' }}>AB+</option>
                                    <option value="AB-" {{ $obj->tipo_sangre == 'AB-' ? 'selected' : '' }}>AB-</option>
                                    <option value="O+" {{ $obj->tipo_sangre == 'O+' ? 'selected' : '' }}>O+</option>
                                    <option value="O-" {{ $obj->tipo_sangre == 'O-' ? 'selected' : '' }}>O-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Foto Actual:</label>
                                @if($obj->foto)
                                    <img src="{{ asset('img_donantes/'.$obj->foto) }}" width="100" class="img-thumbnail">
                                @else
                                    <p>Sin foto</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Nueva Foto:</label>
                                <div>
                                    <video id="video" width="300" height="200" autoplay></video>
                                    <canvas id="canvas" width="300" height="200" style="display:none;"></canvas>
                                </div>
                                <button type="button" id="capturarBtn" class="btn btn-primary">Capturar Nueva Foto</button>
                                <img id="fotoPreview" src="" style="display:none; max-width: 300px; margin-top: 10px;">
                                <input type="hidden" name="foto_base64" id="foto_base64">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <a href="/donantes" class="btn btn-default">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Acceso a la cámara
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const capturarBtn = document.getElementById('capturarBtn');
const fotoPreview = document.getElementById('fotoPreview');
const fotoBase64 = document.getElementById('foto_base64');

// Inicializar cámara
navigator.mediaDevices.getUserMedia({ video: true })
    .then(stream => {
        video.srcObject = stream;
    })
    .catch(error => {
        console.error('Error al acceder a la cámara:', error);
        alert('No se pudo acceder a la cámara');
    });

// Capturar foto
capturarBtn.addEventListener('click', () => {
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0);
    
    // Convertir a base64
    const imageData = canvas.toDataURL('image/png');
    fotoBase64.value = imageData;
    fotoPreview.src = imageData;
    fotoPreview.style.display = 'block';
    
    // Detener la cámara después de capturar
    video.srcObject.getTracks().forEach(track => track.stop());
});
</script>
@endsection