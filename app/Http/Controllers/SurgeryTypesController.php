<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\SurgeryType;
use App\Models\Surgery;

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

        return Inertia::render('Surgeries/SurgeryTypes/Index', [
            'prophylaxisSurgeryTypes' => $prophylaxisSurgeryTypes,
            'nonProphylaxisSurgeryTypes' => $nonProphylaxisSurgeryTypes,
            'surgeryId' => $surgeryId,
            'color' => $color,
        ]);
    }

    public function create(Request $request, string $surgeryId)
    {
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

        dd("asdsad");

        SurgeryType::create([
            'surgery_id' => $surgeryId,
            'name' => $request->input('name'),
            'prophylaxis' => $request->input('prophylaxis'),
        ]);


        return redirect()->route('surgeries.types.index', ['surgeryId' => $surgeryId]);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
