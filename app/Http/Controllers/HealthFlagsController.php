<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\HealthFlag;
use App\Models\SurgeryType;
use App\Models\Surgery;
use App\Models\Antibiotic;
use App\Models\AuditLog;

class HealthFlagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $surgeryId, string $typeId)
    {
        $surgery = Surgery::find($surgeryId);
        $surgeryType = SurgeryType::find($typeId);

        if (!$surgeryType->prophylaxis) {
            return redirect()->route('surgeries.types.show', ['surgery' => $surgeryId, 'type' => $typeId]);
        }

        $healthFlags = HealthFlag::where('surgery_type_id', $typeId)->get(['id', 'name']);

        // AuditLog::create([
        //     'event' => 'Ha accedit a la llista de condicions de salut de la cirurgia ' . $surgery->name . ' - ' . $surgeryType->name,
        //     'user' => auth()->user(),
        //     'user_id' => auth()->id()
        // ]);

        return Inertia::render('Surgeries/SurgeryTypes/HealthFlags/Index', [
            'healthFlags' => $healthFlags,
            'surgeryId' => $surgeryId,
            'surgeryTypeId' => $typeId,
            'surgery' => $surgery,
            'surgeryType' => $surgeryType
        ]);
    }

    public function results(Request $request, string $surgeryId, string $typeId)
    {
        $requestedHealthFlags = $request->input('healthFlags');
        $healthFlags = HealthFlag::whereIn('id', $requestedHealthFlags)->get();

        $antibiotics = Antibiotic::all(['id', 'name', 'description']);

        $surgery = Surgery::find($surgeryId);
        $surgeryType = SurgeryType::find($typeId);

        // AuditLog::create([
        //     'event' => 'Ha accedit als resultats de la cirurgia ' . $surgery->name . ' - ' . $surgeryType->name . ' amb les següents condicions de salut: ' . implode(', ', $healthFlags->pluck('name')->toArray()),
        //     'user' => auth()->user(),
        //     'user_id' => auth()->id()
        // ]);

        return Inertia::render('Surgeries/SurgeryTypes/HealthFlags/Results/Index', [
            'healthFlags' => $healthFlags,
            'surgeryId' => $surgeryId,
            'surgeryTypeId' => $typeId,
            'antibiotics' => $antibiotics,
            'surgery' => $surgery,
            'surgeryType' => $surgeryType
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, string $surgeryId, string $typeId)
    {
        $surgeryType = SurgeryType::find($typeId);
        $surgery = Surgery::find($surgeryId);
        $antibiotics = Antibiotic::all(['id', 'name']);

        // AuditLog::create([
        //     'event' => 'Ha accedit a la creació d\'una nova condició de salut per a la cirurgia ' . $surgery->name . ' - ' . $surgeryType->name,
        //     'user' => auth()->user(),
        //     'user_id' => auth()->id()
        // ]);

        return Inertia::render('Surgeries/SurgeryTypes/HealthFlags/Create', [
            'surgeryId' => $surgeryId,
            'surgeryTypeId' => $typeId,
            'surgeryType' => $surgeryType,
            'surgery' => $surgery,
            'antibiotics' => $antibiotics,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $surgeryId, string $typeId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        HealthFlag::create([
            'surgery_type_id' => $typeId,
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        // AuditLog::create([
        //     'event' => 'Ha creat una nova condició de salut per a la cirurgia ' . Surgery::find($surgeryId)->name . ' - ' . SurgeryType::find($typeId)->name . ' amb nom ' . $request->input('name') . ' i descripció ' . $request->input('description'),
        //     'user' => auth()->user(),
        //     'user_id' => auth()->id()
        // ]);

        return redirect()->route('surgeries.types.flags.index', ['surgery' => $surgeryId, 'type' => $typeId]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $surgeryId, string $typeId, string $id)
    {
        $healthFlag = HealthFlag::findOrFail($id);

        $antibiotics = Antibiotic::all(['id', 'name']);

        $surgery = Surgery::find($surgeryId);
        $surgeryType = SurgeryType::find($typeId);

        // AuditLog::create([
        //     'event' => 'Ha accedit a l\'edició de la condició de salut ' . $healthFlag->name . ' de la cirurgia ' . $surgery->name . ' - ' . $surgeryType->name,
        //     'user' => auth()->user(),
        //     'user_id' => auth()->id()
        // ]);

        return Inertia::render('Surgeries/SurgeryTypes/HealthFlags/Edit', [
            'healthFlag' => $healthFlag,
            'surgeryId' => $surgeryId,
            'surgeryTypeId' => $typeId,
            'antibiotics' => $antibiotics,
            'surgery' => $surgery,
            'surgeryType' => $surgeryType
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $surgeryId, string $typeId, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $healthFlag = HealthFlag::findOrFail($id);

        $old_values = HealthFlag::findOrFail($id);
        
        $healthFlag->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        AuditLog::create([
            'type' => 'update',
            'description' => 'Ha actualitzat la condició de salut "' . $old_values->name . '" de la cirurgia ' . Surgery::find($surgeryId)->name . ' - ' . SurgeryType::find($typeId)->name,
            'table_name' => 'health_flags',
            'old_values' => json_encode($old_values->toArray()),
            'new_values' => $healthFlag,
            'user' => auth()->user(),
            'user_id' => auth()->id()
        ]);


        return redirect()->route('surgeries.types.flags.index', ['surgery' => $surgeryId, 'type' => $typeId]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
