<?php

namespace App\Http\Controllers;

use App\Models\Coche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CocheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Coche::query();
    
        if ($request->filled('marca')) {
            $query->where('marca', 'like', '%' . $request->marca . '%');
        }
    
        $coches = $query->get();
    
        // Verificar si no se encuentran coches
        $mensaje = null;
        if ($coches->isEmpty()) {
            $mensaje = 'No se encuentra ese coche.';
        }
    
        return view('index', compact('coches', 'mensaje'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'precio' => 'required|numeric',
            'color' => 'required',
        
        ]);
    
        $coche = new Coche($request->except('imagen'));
    
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('coches', 'public');
            $coche->imagen = $imagenPath;
        }
    
        $coche->save();
    
        return redirect()->route('coches.index')->with('success', 'Coche creado exitosamente');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(Coche $coche)
    {
        return view('show', compact('coche'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $coche = Coche::find($id);
        return view('edit', compact('coche'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coche $coche)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'precio' => 'required|numeric',
            'color' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $coche->fill($request->except('imagen'));
    
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($coche->imagen) {
                Storage::disk('public')->delete($coche->imagen);
            }
            $imagenPath = $request->file('imagen')->store('coches', 'public');
            $coche->imagen = $imagenPath;
        }
    
        $coche->save();
    
        return redirect()->route('coches.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Encuentra el coche por su ID y elimínalo
        $coche = Coche::findOrFail($id);
        $coche->delete();
    
        // Redirige después de eliminar
        return redirect()->route('coches.index')->with('success', 'Coche eliminado correctamente');
    }
}
