<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Donante;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;  // ✅ SOLO UNA VEZ
use Illuminate\Support\Facades\Session; // ✅ SOLO UNA VEZ

class ControllerSistemas extends Controller
{
    // Módulo de Donantes
    public function donantes(){
        $listado = DB::select("SELECT
            donantes.id,
            donantes.ci,
            donantes.nombre,
            donantes.paterno,
            donantes.materno,
            donantes.fecha_nac,
            donantes.correo,
            donantes.celular,
            donantes.tipo_sangre,
            donantes.foto,
            donantes.fecha_reg,
            donantes.estado
            FROM donantes
            WHERE donantes.estado != 'ELIMINADO'");
        
        return view('GestionDonantes.donantes_index', compact('listado'));
    }

    public function nuevoRegistroDonante(){
        return view('GestionDonantes.nuevoRegistroDonante_form');
    }

    public function guardarNuevoDonante(Request $request){
        // Capturar imagen desde cámara (base64)
        $fotoBase64 = $request->post('foto_base64');
        $nombreImagen = '';
        
        if (!empty($fotoBase64)) {
            $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $fotoBase64));
            $nombreImagen = Str::slug(date('ymdHs')) . ".png";
            $ruta = public_path('img_donantes/');
            file_put_contents($ruta . $nombreImagen, $image);
        }

        $obj = new Donante();
        $obj->ci = $request->post('txt_ci');
        $obj->nombre = mb_strtoupper($request->post('txt_nombre'), 'utf-8');
        $obj->paterno = mb_strtoupper($request->post('txt_paterno'), 'utf-8');
        $obj->materno = mb_strtoupper($request->post('txt_materno'), 'utf-8');
        $obj->fecha_nac = $request->post('txt_fecha_nac');
        $obj->correo = $request->post('txt_correo');
        $obj->celular = $request->post('txt_celular');
        $obj->tipo_sangre = $request->post('txt_tipo_sangre');
        $obj->foto = $nombreImagen;
        $obj->fecha_reg = date('Y-m-d');
        $obj->iduser = '1';
        $obj->save();

        return Redirect::to('/donantes');
    }

    public function eliminarDonante($id){
        $obj = Donante::find($id);
        $obj->estado = 'ELIMINADO';
        $obj->save();

        return Redirect::to('/donantes');
    }

    public function estadoDonante($id){
        $valor = DB::table('donantes')->where('id','=',$id)->first();

        if ($valor->estado == 'ACTIVO') {
            $estado = 'INACTIVO';
        } else {
            $estado = 'ACTIVO';
        }
        
        $obj = Donante::find($id);
        $obj->estado = $estado;
        $obj->save();

        return Redirect::to('/donantes');
    }

    public function editarRegistroDonante($id){
        $obj = DB::table('donantes')->where('id','=',$id)->first();
        return view('GestionDonantes.editarRegistroDonante_form', compact('obj'));
    }

    public function guardarEditarDonante(Request $request){
        $id = $request->post('id_donante');
        $foto_actual = $request->post('foto_actual');

        // Capturar nueva imagen desde cámara
        $fotoBase64 = $request->post('foto_base64');
        $nombreImagen = $foto_actual;

        if (!empty($fotoBase64)) {
            // Eliminar imagen anterior si existe
            if (!empty($foto_actual)) {
                $rutaArchivo = public_path('img_donantes/'.$foto_actual);
                if (file_exists($rutaArchivo)) {
                    unlink($rutaArchivo);
                }
            }

            $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $fotoBase64));
            $nombreImagen = Str::slug(date('ymdHs')) . ".png";
            $ruta = public_path('img_donantes/');
            file_put_contents($ruta . $nombreImagen, $image);
        }

        $obj = Donante::find($id);
        $obj->ci = $request->post('txt_ci');
        $obj->nombre = mb_strtoupper($request->post('txt_nombre'), 'utf-8');
        $obj->paterno = mb_strtoupper($request->post('txt_paterno'), 'utf-8');
        $obj->materno = mb_strtoupper($request->post('txt_materno'), 'utf-8');
        $obj->fecha_nac = $request->post('txt_fecha_nac');
        $obj->correo = $request->post('txt_correo');
        $obj->celular = $request->post('txt_celular');
        $obj->tipo_sangre = $request->post('txt_tipo_sangre');
        $obj->foto = $nombreImagen;
        $obj->save();

        return Redirect::to('/donantes');
    }

    // Módulo de Búsqueda por Tipo de Sangre
    public function buscarDonantes(){
        return view('GestionDonantes.buscarDonantes_index');
    }

    public function buscarPorSangre(Request $request){
        $tipo_sangre = $request->post('tipo_sangre');
        
        $donantes = DB::select("SELECT
            donantes.id,
            donantes.ci,
            CONCAT(donantes.nombre, ' ', donantes.paterno, ' ', donantes.materno) as nombre_completo,
            donantes.fecha_nac,
            donantes.celular,
            donantes.correo,
            donantes.tipo_sangre,
            donantes.foto,
            donantes.estado
            FROM donantes
            WHERE donantes.tipo_sangre = ? AND donantes.estado = 'ACTIVO'", [$tipo_sangre]);
        
        return response()->json($donantes);
    }

    // Página de inicio público
    public function inicio(){
        return view('inicio');
    }

    // Búsqueda pública de donantes
    public function buscarDonantesPublico(Request $request){
        $tipo_sangre = $request->tipo_sangre;
        $departamento = $request->departamento;
        $municipio = $request->municipio;
        $zona = $request->zona;
        
        $query = "SELECT
            donantes.tipo_sangre,
            donantes.celular,
            donantes.departamento,
            donantes.municipio,
            donantes.zona
            FROM donantes
            WHERE donantes.estado = 'ACTIVO'";
        
        $params = [];
        
        if ($tipo_sangre) {
            $query .= " AND donantes.tipo_sangre = ?";
            $params[] = $tipo_sangre;
        }
        
        if ($departamento) {
            $query .= " AND donantes.departamento = ?";
            $params[] = $departamento;
        }
        
        if ($municipio) {
            $query .= " AND donantes.municipio = ?";
            $params[] = $municipio;
        }
        
        if ($zona) {
            $query .= " AND donantes.zona LIKE ?";
            $params[] = '%' . $zona . '%';
        }
        
        $donantes = DB::select($query, $params);
        
        return response()->json($donantes);
    }

    // Login para donantes
    public function loginDonante() {
        return view('Donante.login');
    }

    public function autenticarDonante(Request $request) {
    $ci = $request->input('ci');
    $password = $request->input('password'); // Esto será la fecha de nacimiento
    
    $donante = Donante::where('ci', $ci)->first();
    
        if ($donante) {
            // Verificar si la fecha de nacimiento coincide
            $fechaNacFormateada = \Carbon\Carbon::parse($donante->fecha_nac)->format('Y-m-d');
            
            if ($password === $fechaNacFormateada || $password === \Carbon\Carbon::parse($donante->fecha_nac)->format('d/m/Y')) {
                Session::put('donante_id', $donante->id);
                Session::put('donante_nombre', $donante->nombre);
                
                return redirect('/donante/panel');
            }
        }
        
        Session::flash('error', 'CI o fecha de nacimiento incorrectos');
        return redirect('/donante/login');
    }

    public function logoutDonante() {
        $esAdmin = Session::get('es_admin', false);
        
        Session::forget('donante_id');
        Session::forget('donante_nombre');
        Session::forget('es_admin');
        
        if ($esAdmin) {
            return redirect('/donantes');
        }
        
        return redirect('/donante/login');
    }

    // Panel del donante
    public function panelDonante() {
        if (!Session::has('donante_id')) {
            return redirect('/donante/login');
        }
        
        $donante = Donante::find(Session::get('donante_id'));
        return view('Donante.panel', compact('donante'));
    }

    public function actualizarDonante(Request $request) {
        if (!Session::has('donante_id')) {
            return response()->json(['error' => 'No autorizado'], 401);
        }
        
        $donante = Donante::find(Session::get('donante_id'));
        $donante->celular = $request->celular;
        $donante->correo = $request->correo;
        $donante->departamento = $request->departamento;
        $donante->municipio = $request->municipio;
        $donante->zona = $request->zona;
        $donante->direccion = $request->direccion;
        $donante->save();
        
        return response()->json(['success' => 'Datos actualizados correctamente']);
    }

    public function registrarDonacion(Request $request) {
        if (!Session::has('donante_id')) {
            return response()->json(['error' => 'No autorizado'], 401);
        }
        
        $donante = Donante::find(Session::get('donante_id'));
        $donante->ultima_donacion = date('Y-m-d');
        $donante->total_donaciones += 1;
        $donante->save();
        
        return response()->json(['success' => 'Donación registrada correctamente']);
    }


    // Panel del donante para administradores
    // Panel del donante para administradores
    public function panelDonanteAdmin($id) {
        $donante = Donante::find($id);
        
        if (!$donante) {
            return redirect('/donantes')->with('error', 'Donante no encontrado');
        }
        
        // Simular sesión de donante para el administrador
        Session::put('donante_id', $donante->id);
        Session::put('donante_nombre', $donante->nombre);
        Session::put('es_admin', true); // ✅ MARCADO COMO ADMIN
        
        return view('Donante.panel', compact('donante'));
    }
}