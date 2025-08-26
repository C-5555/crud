<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Storage; 

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['empleados']=Empleado::get();
        return view ('empleado.index',$datos); 

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('empleado.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $valided =$request->validate([
            'status' => 'sometimes|boolean'
        ]);

       //$datos_empleado = $request->all();
       
        $datos_empleado = new Empleado; 
        //$datos_empleado = $request->except('_token');
        //$datos_empleado->status = $request ->boolean('status');
        
        
       //dd ( $datos_empleado->nombre = $request->nombre);
        $datos_empleado->nombre = $request->nombre;
        $datos_empleado->apellido_paterno =$request->apellido_paterno;
        $datos_empleado->apellido_materno =$request->apellido_materno;
        $datos_empleado->correo=$request->correo;
          
        //dd($request -> all()); 
        
        $datos_empleado->status = true;

        if($request->hasFile('foto')){
            $datos_empleado ['foto']=$request->file('foto')->store('uploads', 'public');
        } else {
            $datos_empleado->foto= null;
        }
        $datos_empleado->save();


        //Empleado::insert($datos_empleado);

       // return response()->json($datos_empleado);
       return redirect('empleado')->with('mensaje', 'Empleado agregado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $empleado= Empleado::findOrfail($id);
        return view ('empleado.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $empleado=Empleado::findOrFail($id );
        return view ('empleado.edit', compact('empleado') ); 

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datos_empleado = $request->except(['_token','_method']);

        if($request->hasFile('foto'))
        {
            $empleado=Empleado::findOrFail($id);

            Storage::delete('public/'.$empleado->foto);

            $datos_empleado ['foto']=$request->file('foto')->store('uploads', 'public');
        }
 
        Empleado::where( 'id','=',$id)->update($datos_empleado);

        $empleado=Empleado::findOrFail($id);
        return redirect('empleado')->with('mensaje', 'Empleado editado con éxito'); 

    }


/*     public function restore($id)
    {
        $empleado=Empleado::onlyTrashed()->find($id);
        $empleado->restore();   
        return redirect('empleado')->with('mensaje','Empleado restaurado');
    }
    
    public function forceDelete($id)
    {
        $empleado=Empleado::onlyTrashed()->find($id);
        $empleado->forceDelete();
        return redirect('empleado')->with('mensaje','Empleado borrado permanentemente');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $empleado=Empleado::findOrFail($id);
    $empleado->status=false;
    $empleado->save();
    
    

    
    return redirect('empleado')->with('mensaje','Empleado desactivado');
    }
}
