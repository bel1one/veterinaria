<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CitaController extends Controller
{
    public function index(Request $request)
{
    $query = $request->input('search');
    $field = $request->input('field', 'mascota'); // Por defecto, buscar en 'mascota'

    if ($query) {
        $citas = Cita::where($field, 'like', "%$query%")->paginate(10);
    } else {
        $citas = Cita::paginate(10);
    }

    return view('citas.index', compact('citas', 'field', 'query'));
}

public function create(Request $request)
     {
         return view('citas.create');
     }
    public function store(Request $request)
   {
       $request->validate([
           'mascota' => 'required',
           'fecha' => 'required',
           'hora' => ['required', 'date_format:H:i', 'after:05:59', 'before:20:01'],
           'motivo' => 'required',
           'veterinario' => 'required',


       ]);
       try{
           
           DB::beginTransaction();
           $mascota = $request->input('mascota');
           $fecha = $request->input('fecha');
           $hora = $request->input('hora');
           $motivo = $request->input('motivo');
           $veterinario = $request->input('veterinario');
           $observaciones = $request->input('observaciones');


           DB::table('citas')->insert([
               'mascota' => $mascota,
               'fecha' => $fecha,
               'hora' => $hora,
               'motivo' => $motivo,
               'veterinario' => $veterinario,
               'observaciones' => $observaciones,

           ]);
           // Confirmar la transacción
           DB::commit();

           return redirect()->route('citas.index')->with('msn_success', 'Operacion Satisfactoria !!!');
       }
       catch(\Exception $e){
           DB::rollBack();
           $fechaHoraActual = date("Y-m-d H:i:s");
           $mensaje= $fechaHoraActual." Error al añadir producto: ";
           return redirect()->route('citas.create')->with('msn_error', $mensaje .' ' . $e->getMessage());

       }
   }

   
   public function edit($id)
   {
    
       $cita = Cita::findOrFail($id); 
       return view('citas.edit', compact('cita')); 
       
   }

   public function update(Request $request, $id)
   {
   
    
       try {
           DB::beginTransaction();
           $cita = Cita::findOrFail($id); 
           $request->validate([
            'mascota' => 'required',
            'fecha' => 'required',  
             'hora' => 'required', 
            'motivo' => 'required',
            'veterinario' => 'required',
        ]);
           $cita->update([
               'mascota' => $request->input('mascota'),
               'fecha' => $request->input('fecha'),
               'hora' => $request->input('hora'),
               'motivo' => $request->input('motivo'),
               'veterinario' => $request->input('veterinario'),
               'observaciones' => $request->input('observaciones'),
           ]);

           DB::commit();
           return redirect()->route('citas.index')->with('msn_success', 'Cita actualizada con éxito');
       } catch (\Exception $e) {
           DB::rollBack();
           $fechaHoraActual = date("Y-m-d H:i:s");
           $mensaje = $fechaHoraActual . " Error al actualizar cita: ";
           return redirect()->route('citas.edit', $id)->with('msn_error', $mensaje . ' ' . $e->getMessage());
       }
   }
   public function destroy($id)
{
    try {
        DB::beginTransaction();

        $cita = Cita::findOrFail($id);
    
        $cita->delete();
        
        DB::commit();

        return redirect()->route('citas.index')->with('msn_success', 'Cita eliminada correctamente.');
    } catch (\Exception $e) {
        DB::rollBack();
        $fechaHoraActual = date("Y-m-d H:i:s");
        $mensaje = $fechaHoraActual . " Error al eliminar la cita: ";
        return redirect()->route('citas.index')->with('msn_error', $mensaje . ' ' . $e->getMessage());
    }
}

}
