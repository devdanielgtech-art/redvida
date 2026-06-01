<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SISTEMA DE INFORMACIÓN WEB PARA LA GESTIÓN Y PROMOCIÓN DE DONACIÓN DE SANGRE - RedVida</title>

    <!-- Bootstrap core CSS local -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <style>
        :root {
            --primary-color: #c62828;
            --secondary-color: #f5f5f5;
            --accent-color: #d32f2f;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
        }
        
        .navbar-redvida {
            background-color: var(--primary-color);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: bold;
            color: white !important;
        }
        
        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            transition: color 0.3s;
        }
        
        .nav-link:hover {
            color: white !important;
        }
        
        .hero-section {
            background: linear-gradient(rgba(198, 40, 40, 0.8), rgba(198, 40, 40, 0.9));
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        
        .search-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 30px;
            margin-top: -50px;
            border: 1px solid #ddd;
        }
        
        .info-section {
            padding: 80px 0;
            background: #f8f9fa;
        }
        
        .blood-type {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-color);
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: bold;
            color: var(--primary-color);
        }
        
        .btn-custom {
            border-radius: 25px;
            padding: 10px 25px;
            font-weight: bold;
        }
        
        .carousel-item img {
            height: 400px;
            object-fit: cover;
        }
        
        .about-section {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-top: 30px;
        }
        
        .section-title {
            color: var(--primary-color);
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        
        .footer {
            background-color: #343a40;
            color: white;
            padding: 30px 0;
            margin-top: 40px;
        }
        
        .info-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            margin-bottom: 15px;
            height: 100%;
        }

        /* Iconos Font Awesome simulados con Unicode */
        .fa {
            display: inline-block;
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            line-height: 1;
            margin-right: 5px;
        }
        
        .fa-tint:before { content: "💧"; }
        .fa-home:before { content: "🏠"; }
        .fa-info-circle:before { content: "ℹ️"; }
        .fa-search:before { content: "🔍"; }
        .fa-hand-holding-heart:before { content: "🫶"; }
        .fa-user:before { content: "👤"; }
        .fa-building:before { content: "🏢"; }
        .fa-heartbeat:before { content: "💓"; }
        .fa-shield-alt:before { content: "🛡️"; }
        .fa-clock:before { content: "⏰"; }
        .fa-user-check:before { content: "✅"; }
        .fa-clipboard-check:before { content: "📋"; }
        .fa-stethoscope:before { content: "🩺"; }
        .fa-map-marker-alt:before { content: "📍"; }
        .fa-bullseye:before { content: "🎯"; }
        .fa-lock:before { content: "🔒"; }
        .fa-map-marker:before { content: "📍"; }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-redvida">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fa fa-tint me-2"></i>
                RedVida - Banco de Sangre
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-home me-1"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#informacion"><i class="fa fa-info-circle me-1"></i> Información</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#buscar-donantes"><i class="fa fa-search me-1"></i> Buscar Donantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#donar"><i class="fa fa-hand-holding-heart me-1"></i> Donar Sangre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/donante/login"><i class="fa fa-user me-1"></i> Soy Donante</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#acerca-de"><i class="fa fa-building me-1"></i> Acerca de</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container body">
        <div class="main_container">

            <!-- Page content -->
            <div class="right_col" role="main" style="margin-left: 0; min-height: 100vh;">

                <!-- Hero Section -->
                <section class="hero-section">
                    <div class="container">
                        <h1 class="display-4" style="font-weight: bold; margin-bottom: 20px;">
                            <i class="fa fa-heartbeat" style="margin-right: 15px;"></i>Donar Sangre Salva Vidas
                        </h1>
                        <p class="lead" style="font-size: 1.5rem; margin-bottom: 30px;">Únete a nuestra comunidad de donantes voluntarios en Bolivia</p>
                        <p class="mb-0">Banco de Sangre Departamental de La Paz - RedVida</p>
                    </div>
                </section>

                <!-- Search Section -->
                <section id="buscar-donantes" class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="search-card">
                                <h3 class="text-center" style="margin-bottom: 30px;">
                                    <i class="fa fa-search" style="margin-right: 10px;"></i>Buscar Donantes por Tipo de Sangre
                                </h3>
                                <form id="searchForm">
                                    <input type="hidden" name="_token" value="">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label">Tipo de Sangre</label>
                                                <select name="tipo_sangre" class="form-control" required>
                                                    <option value="">Seleccionar...</option>
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
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label">Departamento</label>
                                                <select name="departamento" class="form-control" id="departamento">
                                                    <option value="">Todos</option>
                                                    <option value="LA PAZ">La Paz</option>
                                                    <option value="ORURO">Oruro</option>
                                                    <option value="POTOSI">Potosí</option>
                                                    <option value="COCHABAMBA">Cochabamba</option>
                                                    <option value="SANTA CRUZ">Santa Cruz</option>
                                                    <option value="BENI">Beni</option>
                                                    <option value="PANDO">Pando</option>
                                                    <option value="CHUQUISACA">Chuquisaca</option>
                                                    <option value="TARIJA">Tarija</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label">Municipio</label>
                                                <select name="municipio" class="form-control" id="municipio">
                                                    <option value="">Todos</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label">Zona</label>
                                                <input type="text" name="zona" class="form-control" placeholder="Ej: Zona Sur">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center" style="margin-top: 30px;">
                                        <button type="submit" class="btn btn-danger btn-custom">
                                            <i class="fa fa-search" style="margin-right: 8px;"></i>Buscar Donantes
                                        </button>
                                        <a href="/donante/login" class="btn btn-outline-danger btn-custom" style="margin-left: 10px;">
                                            <i class="fa fa-user" style="margin-right: 8px;"></i>Soy Donante
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Results Section -->
                <section class="container" style="margin-top: 50px; display: none;" id="resultsSection">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center" style="margin-bottom: 30px;">Resultados de la Búsqueda</h3>
                            <div id="resultsContainer"></div>
                        </div>
                    </div>
                </section>

                <!-- Information Section -->
                <section id="informacion" class="info-section">
                    <div class="container">
                        <h2 class="text-center section-title">Información sobre Donación de Sangre</h2>
                        <div class="row">
                            <div class="col-md-4" style="margin-bottom: 30px;">
                                <div class="info-card text-center">
                                    <i class="fa fa-shield-alt fa-3x mb-3 text-danger"></i>
                                    <h4>Proceso Seguro</h4>
                                    <p>Todo el material utilizado es estéril y de un solo uso. No hay riesgo de contraer enfermedades.</p>
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-bottom: 30px;">
                                <div class="info-card text-center">
                                    <i class="fa fa-clock fa-3x mb-3 text-danger"></i>
                                    <h4>Tiempo Rápido</h4>
                                    <p>El proceso completo de donación toma aproximadamente 30-45 minutos.</p>
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-bottom: 30px;">
                                <div class="info-card text-center">
                                    <i class="fa fa-user-check fa-3x mb-3 text-danger"></i>
                                    <h4>Requisitos</h4>
                                    <p>Tener entre 18-65 años, pesar más de 50 kg y gozar de buena salud.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row text-center mt-4">
                            <div class="col-md-4" style="margin-bottom: 30px;">
                                <div class="stat-number">5,000+</div>
                                <h5>Donantes Registrados</h5>
                                <p>Personas dispuestas a ayudar</p>
                            </div>
                            <div class="col-md-4" style="margin-bottom: 30px;">
                                <div class="stat-number">15,000+</div>
                                <h5>Vidas Salvadas</h5>
                                <p>Gracias a la donación voluntaria</p>
                            </div>
                            <div class="col-md-4" style="margin-bottom: 30px;">
                                <div class="stat-number">100+</div>
                                <h5>Hospitales Beneficiados</h5>
                                <p>En todo el territorio nacional</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Donation Process Section -->
                <section id="donar" class="container" style="margin: 50px 0;">
                    <div class="row">
                        <div class="col-12 text-center" style="margin-bottom: 50px;">
                            <h2 class="section-title">¿Cómo Donar Sangre?</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-center" style="margin-bottom: 30px;">
                            <div class="info-card">
                                <div class="blood-type"><i class="fa fa-clipboard-check"></i></div>
                                <h5>1. Registro y Evaluación</h5>
                                <p>Completa un formulario y responde preguntas sobre tu salud</p>
                            </div>
                        </div>
                        <div class="col-md-4 text-center" style="margin-bottom: 30px;">
                            <div class="info-card">
                                <div class="blood-type"><i class="fa fa-stethoscope"></i></div>
                                <h5>2. Chequeo Médico</h5>
                                <p>Revisión de signos vitales y nivel de hemoglobina</p>
                            </div>
                        </div>
                        <div class="col-md-4 text-center" style="margin-bottom: 30px;">
                            <div class="info-card">
                                <div class="blood-type"><i class="fa fa-tint"></i></div>
                                <h5>3. Donación</h5>
                                <p>Extracción de sangre que toma 8-10 minutos</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Blood Types Info -->
                <section class="container" style="margin: 50px 0;">
                    <div class="row">
                        <div class="col-12 text-center" style="margin-bottom: 50px;">
                            <h2 class="section-title">Tipos de Sangre y Compatibilidad</h2>
                        </div>
                        <div class="col-md-3 text-center" style="margin-bottom: 30px;">
                            <div class="blood-type">O+</div>
                            <p>36% de la población</p>
                        </div>
                        <div class="col-md-3 text-center" style="margin-bottom: 30px;">
                            <div class="blood-type">A+</div>
                            <p>28% de la población</p>
                        </div>
                        <div class="col-md-3 text-center" style="margin-bottom: 30px;">
                            <div class="blood-type">B+</div>
                            <p>21% de la población</p>
                        </div>
                        <div class="col-md-3 text-center" style="margin-bottom: 30px;">
                            <div class="blood-type">AB+</div>
                            <p>5% de la población</p>
                        </div>
                    </div>
                </section>

                <!-- Carousel Section -->
                <section class="container mt-5">
                    <div class="row">
                        <div class="col-12">
                            <div id="infoCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#infoCarousel" data-bs-slide-to="0" class="active"></button>
                                    <button type="button" data-bs-target="#infoCarousel" data-bs-slide-to="1"></button>
                                    <button type="button" data-bs-target="#infoCarousel" data-bs-slide-to="2"></button>
                                </div>
                                <div class="carousel-inner rounded">
                                    <div class="carousel-item active">
                                        <img src="assets/imagenes/donar-vidas.jpg" class="d-block w-100" alt="Donar salva vidas" style="background-color: #FF6B6B; height: 400px; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px;">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Donar Salva Vidas</h5>
                                            <p>Tu donación puede hacer la diferencia para alguien que lo necesita.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/imagenes/proceso-seguro.jpg" class="d-block w-100" alt="Proceso seguro" style="background-color: #4ECDC4; height: 400px; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px;">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Proceso Seguro</h5>
                                            <p>Todas nuestras donaciones siguen protocolos de seguridad estrictos.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/imagenes/unete-redvida.jpg" class="d-block w-100" alt="Únete a RedVida" style="background-color: #45B7D1; height: 400px; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px;">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Únete a RedVida</h5>
                                            <p>Sé parte de nuestra comunidad de donantes voluntarios.</p>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#infoCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#infoCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- About Section -->
                <section id="acerca-de" class="about-section">
                    <h2 class="section-title text-center">Acerca de RedVida</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <h4><i class="fa fa-heartbeat me-2 text-danger"></i>Nuestra Misión</h4>
                            <p>RedVida es una iniciativa del Banco de Sangre Departamental de La Paz que busca promover y facilitar la donación voluntaria de sangre, asegurando un suministro suficiente y seguro para los pacientes que lo necesitan.</p>
                            
                            <h4 class="mt-4"><i class="fa fa-bullseye me-2 text-danger"></i>Nuestros Objetivos</h4>
                            <ul>
                                <li>Incrementar el número de donantes voluntarios y habituales</li>
                                <li>Garantizar la disponibilidad de sangre y componentes sanguíneos</li>
                                <li>Promover una cultura de donación voluntaria y altruista</li>
                                <li>Implementar sistemas de información para una gestión eficiente</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h4><i class="fa fa-map-marker-alt me-2 text-danger"></i>Banco de Sangre Departamental de La Paz</h4>
                            <p><strong>Dirección:</strong> Av. Saavedra #2234, Zona Miraflores, La Paz - Bolivia</p>
                            <p><strong>Teléfono:</strong> (+591) 71579606</p>
                            <p><strong>Email:</strong> info@redvida.org.bo</p>
                            <p><strong>Horario de atención:</strong><br>
                                Lunes a Viernes: 8:00 - 18:00<br>
                                Sábados: 8:00 - 12:00</p>
                            
                            <h4 class="mt-4"><i class="fa fa-hand-holding-heart me-2 text-danger"></i>Requisitos para Donar</h4>
                            <ul>
                                <li>Tener entre 18 y 65 años</li>
                                <li>Pesar más de 50 kg</li>
                                <li>Gozar de buena salud</li>
                                <li>No haber donado en los últimos 3 meses (hombres) o 4 meses (mujeres)</li>
                                <li>Presentar cédula de identidad</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- Footer -->
                <footer class="footer">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-8 text-center text-md-start">
                                <p style="margin-bottom: 5px;">SISTEMA DE INFORMACIÓN WEB PARA LA GESTIÓN Y PROMOCIÓN DE DONACIÓN DE SANGRE - RedVida</p>
                                <p style="margin-bottom: 5px;">&copy; 2025 Banco de Sangre Departamental de La Paz. Todos los derechos reservados.</p>
                                <p style="margin-bottom: 0;">📞 Contacto: +591 71579606 | ✉️ info@redvida.org.bo</p>
                            </div>
                            <div class="col-md-4 text-center text-md-end" style="margin-top: 15px;">
                                <a href="/login" class="btn btn-outline-light btn-sm">
                                    <i class="fa fa-lock" style="margin-right: 5px;"></i>Acceso Administrativo
                                </a>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- /page content -->
        </div>
    </div>

    <!-- Scripts -->
    <script src="js/bootstrap.bundle.min.js"></script>

    <script>
        // Municipios por departamento
        const municipios = {
            'LA PAZ': ['La Paz', 'El Alto', 'Viacha', 'Achacachi', 'Caranavi', 'Patacamaya'],
            'ORURO': ['Oruro', 'Challapata', 'Huanuni', 'Caracollo', 'Poopó'],
            'POTOSI': ['Potosí', 'Villazón', 'Tupiza', 'Uyuni', 'Llallagua'],
            'COCHABAMBA': ['Cochabamba', 'Quillacollo', 'Sacaba', 'Colcapirhua', 'Vinto'],
            'SANTA CRUZ': ['Santa Cruz', 'Warnes', 'Montero', 'La Guardia', 'Cotoca'],
            'BENI': ['Trinidad', 'Riberalta', 'Guayaramerín', 'San Borja', 'Santa Ana'],
            'PANDO': ['Cobija', 'Porvenir', 'Bella Flor', 'Filadelfia'],
            'CHUQUISACA': ['Sucre', 'Camargo', 'Villa Serrano', 'Padilla', 'Tarabuco'],
            'TARIJA': ['Tarija', 'Yacuiba', 'Bermejo', 'Villamontes', 'Caraparí']
        };

        document.getElementById('departamento').addEventListener('change', function() {
            const municipioSelect = document.getElementById('municipio');
            const departamento = this.value;
            
            municipioSelect.innerHTML = '<option value="">Todos</option>';
            
            if (departamento && municipios[departamento]) {
                municipios[departamento].forEach(municipio => {
                    const option = document.createElement('option');
                    option.value = municipio;
                    option.textContent = municipio;
                    municipioSelect.appendChild(option);
                });
            }
        });

        // Búsqueda de donantes
        document.getElementById('searchForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            // Simulación de búsqueda (en un caso real, esto sería una llamada AJAX)
            const container = document.getElementById('resultsContainer');
            const section = document.getElementById('resultsSection');
            
            // Datos de ejemplo
            const resultadosEjemplo = [
                { tipo_sangre: 'O+', celular: '71234567', municipio: 'La Paz', departamento: 'LA PAZ', zona: 'Zona Sur' },
                { tipo_sangre: 'A+', celular: '71234568', municipio: 'El Alto', departamento: 'LA PAZ', zona: 'Zona Central' },
                { tipo_sangre: 'B+', celular: '71234569', municipio: 'La Paz', departamento: 'LA PAZ', zona: 'Sopocachi' }
            ];
            
            if (resultadosEjemplo.length > 0) {
                let html = '<div class="alert alert-success">Se encontraron <strong>' + resultadosEjemplo.length + '</strong> donantes compatibles</div><div class="row">';
                
                resultadosEjemplo.forEach(donante => {
                    html += `
                        <div class="col-md-6" style="margin-bottom: 15px;">
                            <div class="card">
                                <div class="card-body">
                                    <div style="display: flex; justify-content: space-between; align-items: center;">
                                        <div>
                                            <span class="badge bg-danger" style="font-size: 16px;">${donante.tipo_sangre}</span>
                                        </div>
                                        <div style="text-align: right;">
                                            <strong>Contacto:</strong><br>
                                            <span style="color: #d9534f; font-weight: bold;">${donante.celular}</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div style="color: #666; font-size: 14px;">
                                        <i class="fa fa-map-marker" style="margin-right: 5px;"></i>
                                        ${donante.municipio}, ${donante.departamento}
                                        ${donante.zona ? ' - ' + donante.zona : ''}
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });
                html += '</div>';
                container.innerHTML = html;
            } else {
                container.innerHTML = '<div class="alert alert-warning text-center">No se encontraron donantes con los criterios de búsqueda.</div>';
            }
            
            section.style.display = 'block';
            // Scroll suave a los resultados
            section.scrollIntoView({ behavior: 'smooth' });
        });
    </script>
</body>
</html>