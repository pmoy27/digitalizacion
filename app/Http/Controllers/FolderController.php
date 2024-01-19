<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Obtener las carpetas asociadas al usuario
        $folders = Folder::where('id_propietario', $userId)->get();

        // Otros procesamientos o lógica que desees realizar

        // Retornar la vista con las carpetas
        return view('archivos.file', [
            'folders' => $folders,
        ]);
    }
    public function AgregarFolder(Request $request)
    {
        // Suponiendo que ya has obtenido el usuario propietario (puedes ajustar esto según tu lógica)
        $propietario = User::find(1);

        $folder = new Folder();
        $folder->nombre = $request->input('name');
        $folder->id_propietario = $propietario;


        // Establecer la relación con el usuario propietario
        $folder->owner()->associate($propietario);

        // Guardar el folder
        $folder->save();
        return redirect()->back();
        //return response()->json(['message' => 'Datos insertados correctamente'], 200);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Folder $folder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Folder $folder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Folder $folder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Folder $folder)
    {
        //
    }
}
