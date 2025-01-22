<?php

namespace App\Http\Controllers;

use App\Models\Coche;
use Illuminate\Http\Request;

class CocheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coches = Coche::all();
        return view('index', compact('coches'));
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
        $coche = new Coche();
        $coche->marca = $request->marca;
        $coche->modelo = $request->modelo;
        $coche->precio = $request->precio;
        $coche->color = $request->color;
        $coche->save();
        return redirect()->route('coches.index')->with('success', 'Coche creado con exito');

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
    public function update(Request $request, string $id)
    {

        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'precio' => 'required|numeric',
            'color' => 'required',
        ]);
   $coche = Coche::findOrFail($id);
        $coche->update($request->all());
        return redirect()->route('coches.index')->with('success', 'Coche actualizado con exito');
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
