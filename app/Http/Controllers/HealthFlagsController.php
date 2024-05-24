<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\HealthFlag;

class HealthFlagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $surgeryId, string $typeId)
    {
        $healthFlags = HealthFlag::where('surgery_type_id', $typeId)->get(['id', 'name']);
        return Inertia::render('Surgeries/SurgeryTypes/HealthFlags/Index', [
            'healthFlags' => $healthFlags,
            'surgeryId' => $surgeryId,
            'surgeryTypeId' => $typeId,
        ]);
    }

    public function results(Request $request, string $surgeryId, string $typeId)
    {
        $requestedHealthFlags = $request->input('healthFlags');
        $healthFlags = HealthFlag::whereIn('id', $requestedHealthFlags)->get();

        return Inertia::render('Surgeries/SurgeryTypes/HealthFlags/Results/Index', [
            'healthFlags' => $healthFlags,
            'surgeryId' => $surgeryId,
            'surgeryTypeId' => $typeId,
        ]);
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
        return Inertia::render('Surgeries/SurgeryTypes/HealthFlags/Edit', [
            'healthFlag' => $healthFlag,
            'surgeryId' => $surgeryId,
            'surgeryTypeId' => $typeId,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
