<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class EquipmentController extends Controller
{  public function index()
    {
        // List all resources
        $equipments = Equipment::all();
        return view('equipments.index', ['equipments' => $equipments]);
    }

    public function create()
    {
        // Show the create resource form
        return view('equipments.create');
    }

    public function store(Request $request)
    {
        // Store a new resource in the database
        try {

            $request->validate([
                'name' => 'string|min:3',
                'description' => 'required|string|min:3',
                'quantity' => 'integer|min:1'

            ]);
            $equipment = new Equipment;
            $equipment->name = $request->name;
            $equipment->description = $request->description;
            $equipment->quantity = $request->quantity;
            $equipment->save();

            return redirect()->route('equipments.index');
        } catch (ValidationException $e) {
            return redirect()->route('equipments.create')->withErrors($e->validator->errors())->withInput();
        }
    }

    public function show($id)
    {
        // Display a specific resource
        try {
        $equipment = Equipment::findOrFail($id);
        return view('equipments.show', ['equipment' => $equipment]);
    } catch (ModelNotFoundException $e) {
        return redirect()->route('equipments.index')->with('error', 'Matériel non Trouvé.');;
    }
    }

    public function edit($id)
    {
        // Show the edit resource form
        try {
            $equipment = Equipment::findOrFail($id);
            return view('equipments.edit', ['equipment' => $equipment]);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('equipments.index')->with('error', 'Matériel non Trouvé.');;
        }
    
    }

    public function update(Request $request, $id)
    {
        try {
            $equipment = Equipment::findOrFail($id);
        
            $request->validate([
                'name' => 'string|min:3',
                'description' => 'required|string|min:3',
                'quantity' => 'integer|min:1'

            ]);
            $equipment->name = $request->name;
            $equipment->description = $request->description; 
            $equipment->quantity = $request->quantity;


            $equipment->update();
            return redirect()->route('equipments.index')->with('success', 'Equipment mise à jour avec succès');
        } catch (ValidationException $e) {
            return redirect()->route('equipments.create')->withErrors($e->validator->errors())->withInput();
        }

        // Update a specific resource in the database

    }

    public function destroy($id)
    {
        // Delete a specific resource from the database
        try {
            $equipment = Equipment::findOrFail($id);
            $equipment->delete();
            return redirect()->route('equipments.index')->with('success', 'Equipment supprimé avec succès');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('equipments.index')->with('error', 'Matériel non Trouvé.');;
        }
    
    }
}
