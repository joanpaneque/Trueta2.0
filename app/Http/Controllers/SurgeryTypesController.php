<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\SurgeryType;
use App\Models\Surgery;
use App\Models\AuditLog;

class SurgeryTypesController extends Controller
{
    public function index(string $surgeryId)
    {
        $prophylaxisSurgeryTypes = SurgeryType::where('surgery_id', $surgeryId)
            ->where('prophylaxis', true)
            ->get();

        $nonProphylaxisSurgeryTypes = SurgeryType::where('surgery_id', $surgeryId)
            ->where('prophylaxis', false)
            ->get();

        $color = Surgery::find($surgeryId)->color;
        $surgery = Surgery::find($surgeryId);
        $surgeryType = SurgeryType::find($surgeryId);

        // AuditLog::create([
        //     'event' => 'Ha accedit al llistat de tipus de cirurgies',
        //     'user' => auth()->user(),
        //     'user_id' => auth()->id()
        // ]);

        return Inertia::render('Surgeries/SurgeryTypes/Index', [
            'prophylaxisSurgeryTypes' => $prophylaxisSurgeryTypes,
            'nonProphylaxisSurgeryTypes' => $nonProphylaxisSurgeryTypes,
            'surgeryId' => $surgeryId,
            'color' => $color,
            'surgery' => $surgery,
            'surgeryType' => $surgeryType
        ]);
    }

    public function create(Request $request, string $surgeryId)
    {

        // AuditLog::create([
        //     'event' => 'Ha accedit a la pàgina de creació de tipus de cirurgies',
        //     'user' => auth()->user(),
        //     'user_id' => auth()->id()
        // ]);

        return Inertia::render('Surgeries/SurgeryTypes/Create', [
            'surgeryId' => $surgeryId,
            'surgery' => Surgery::find($surgeryId),
        ]);
    }

    public function store(Request $request, string $surgeryId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prophylaxis' => 'required|boolean',
        ]);

        SurgeryType::create([
            'surgery_id' => $surgeryId,
            'name' => $request->input('name'),
            'prophylaxis' => $request->input('prophylaxis'),
        ]);

        // AuditLog::create([
        //     'event' => 'Ha creat el tipus de cirurgia ' . $request->input('name') . ' amb profilaxi ' . $request->input('prophylaxis'),
        //     'user' => auth()->user(),
        //     'user_id' => auth()->id()
        // ]);

        return redirect()->route('surgeries.types.index', ['surgery' => $surgeryId]);
    }

    public function show(string $surgeryId, string $surgeryTypeId)
    {

        $surgery = Surgery::find($surgeryId);
        $surgeryType = SurgeryType::find($surgeryTypeId);

        // AuditLog::create([
        //     'event' => 'Ha accedit a la pàgina de detall del tipus de cirurgia ' . $surgeryType->name . ', pero la profilaxi estava desactivada.',
        //     'user' => auth()->user(),
        //     'user_id' => auth()->id()
        // ]);

        return Inertia::render('Surgeries/SurgeryTypes/Show', [
            'surgery' => $surgery,
            'surgeryId' => $surgeryId,
            'surgeryType' => $surgeryType,
            'surgeryTypeId' => $surgeryTypeId
        ]);
    }

    public function edit(string $surgeryId, string $id)
    {
        $surgeryType = SurgeryType::find($id);

        // AuditLog::create([
        //     'event' => 'Ha accedit a la pàgina d\'edició del tipus de cirurgia ' . $surgeryType->name,
        //     'user' => auth()->user(),
        //     'user_id' => auth()->id()
        // ]);

        return Inertia::render('Surgeries/SurgeryTypes/Edit', [
            'surgeryType' => $surgeryType,
            'surgeryTypeId' => $id,
            'surgeryId' => $surgeryId,
        ]);
    }

    public function update(Request $request, string $surgeryId, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prophylaxis' => 'required|boolean',
        ]);

        $surgeryType = SurgeryType::find($id);
        $surgery = Surgery::find($surgeryId);

        $old_values = SurgeryType::find($id);


        $surgeryType->update([
            'name' => $request->input('name'),
            'prophylaxis' => $request->input('prophylaxis'),
        ]);

        AuditLog::create([
            'type' => 'update',
            'description' => 'Ha actualitzat el tipus de cirurgia "' . $old_values->name . '" de la cirurgia ' . $surgery->name,
            'table_name' => 'surgery_types',
            'old_values' => json_encode($old_values),
            'new_values' => $surgeryType,
            'user' => auth()->user(),
            'user_id' => auth()->id()
        ]);

        

        return redirect()->route('surgeries.types.index', ['surgery' => $surgeryId]);
    }

    public function destroy(string $id)
    {
        //
    }
}
