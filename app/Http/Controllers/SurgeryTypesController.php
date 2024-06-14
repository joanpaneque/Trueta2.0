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


        $surgeryTypes = SurgeryType::where('surgery_id', $surgeryId)->get();

        $color = Surgery::find($surgeryId)->color;
        $surgery = Surgery::find($surgeryId);
        $surgeryType = SurgeryType::find($surgeryId);
        $surgeries = Surgery::all();

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
            'surgeryType' => $surgeryType,
            'surgeries' => $surgeries,
            'surgeryTypes' => $surgeryTypes
        ]);
    }

    public function create(Request $request, string $surgeryId)
    {

        $surgeries = Surgery::all();
        $surgeryTypes = SurgeryType::where('surgery_id', $surgeryId)->get();

        return Inertia::render('Surgeries/SurgeryTypes/Create', [
            'surgeryId' => $surgeryId,
            'surgery' => Surgery::find($surgeryId),
            'surgeries' => $surgeries,
            'surgeryTypes' => $surgeryTypes
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

        $surgeries = Surgery::all();
        $surgeryTypes = SurgeryType::where('surgery_id', $surgeryId)->get();

        return Inertia::render('Surgeries/SurgeryTypes/Show', [
            'surgery' => $surgery,
            'surgeryId' => $surgeryId,
            'surgeryType' => $surgeryType,
            'surgeryTypeId' => $surgeryTypeId,
            'surgeries' => $surgeries,
            'surgeryTypes' => $surgeryTypes
        ]);
    }

    public function edit(string $surgeryId, string $id)
    {
        $surgeryType = SurgeryType::find($id);

        $surgeries = Surgery::all();
        $surgeryTypes = SurgeryType::where('surgery_id', $surgeryId)->get();

        return Inertia::render('Surgeries/SurgeryTypes/Edit', [
            'surgeryType' => $surgeryType,
            'surgeryTypeId' => $id,
            'surgeryId' => $surgeryId,
            'surgeries' => $surgeries,
            'surgeryTypes' => $surgeryTypes
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
        $surgeryType = SurgeryType::where('id', $id)->first();

        $old_values = $surgeryType;

        $surgeryType->delete();

        AuditLog::create([
            'type' => 'delete',
            'description' => 'Ha eliminat el tipus de cirurgia "' . $surgeryType->name . '"',
            'table_name' => 'surgery_types',
            'old_values' => json_encode($old_values),
            'new_values' => null,
            'user' => auth()->user(),
            'user_id' => auth()->id()
        ]);

        return redirect()->route('surgeries.types.index', ['surgery' => $surgeryType->surgery_id]);
    }
}
