@extends('plantilla')

@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Búsqueda de Donantes por Tipo de Sangre</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Seleccionar Tipo de Sangre:</label>
                            <select id="tipo_sangre" class="form-control">
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                        <button id="btnBuscar" class="btn btn-primary">Buscar Donantes</button>

                        
                        <a href="/" class="btn btn-default">Volver a Inicio</a>
                    </div>
                </div>
                
                <div id="resultados" class="mt-4" style="display:none;">
                    <h4>Resultados de la Búsqueda:</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nombre Completo</th>
                                
                                <th>Celular</th>
                                <th>Correo</th>
                                <th>Tipo Sangre</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyResultados">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('btnBuscar').addEventListener('click', function() {
    const tipoSangre = document.getElementById('tipo_sangre').value;
    
    fetch('/buscarPorSangre', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ tipo_sangre: tipoSangre })
    })
    .then(response => response.json())
    .then(data => {
        const tbody = document.getElementById('tbodyResultados');
        tbody.innerHTML = '';
        
        if (data.length > 0) {
            data.forEach(donante => {
                const fotoUrl = donante.foto ? '{{ asset("img_donantes") }}/' + donante.foto : '{{ asset("admin/images/img.jpg") }}';
                tbody.innerHTML += `
                    <tr>
                        <td><img src="${fotoUrl}" width="50" height="50" class="img-circle"></td>
                        <td>${donante.nombre_completo}</td>
                        
                        <td>${donante.celular}</td>
                        <td>${donante.correo}</td>
                        <td><span class="badge badge-danger">${donante.tipo_sangre}</span></td>
                    </tr>
                `;
            });
            document.getElementById('resultados').style.display = 'block';
        } else {
            tbody.innerHTML = '<tr><td colspan="6" class="text-center">No se encontraron donantes con este tipo de sangre</td></tr>';
            document.getElementById('resultados').style.display = 'block';
        }
    });
});
</script>
@endsection