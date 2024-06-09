<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Surgery;
use App\Models\AuditLog;

class SurgeriesController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {

        // AuditLog::create([
        //     'event' => 'Ha accedit a la pàgina de creació de cirurgies',
        //     'user' => auth()->user(),
        //     'user_id' => auth()->id()
        // ]);

        return Inertia::render('Surgeries/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:255',
        ]);

        Surgery::create($request->all());

        // AuditLog::create([
        //     'event' => 'Ha creat la cirurgia ' . $request->input('name') . ' amb color ' . $request->input('color'),
        //     'user' => auth()->user(),
        //     'user_id' => auth()->id()
        // ]);

        return redirect()->route('dashboard');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $surgery = Surgery::find($id);

        // AuditLog::create([
        //     'event' => 'Ha accedit a la pàgina d\'edició de la cirurgia ' . $surgery->name,
        //     'user' => auth()->user(),
        //     'user_id' => auth()->id()
        // ]);

        return Inertia::render('Surgeries/Edit', [
            'surgery' => $surgery,
            'surgeryId' => $id,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:255',
        ]);

        $surgery = Surgery::where('id', $id)->first();

        $old_values = $surgery->toArray();

        $surgery->update($request->all());

        AuditLog::create([
            'type' => 'update',
            'description' => 'Ha actualitzat la cirurgia "' . $surgery->name . '"',
            'table_name' => 'surgeries',
            'old_values' => json_encode($old_values),
            'new_values' => $surgery,
            'user' => auth()->user(),
            'user_id' => auth()->id()
        ]);

        return redirect()->route('dashboard');
    }

    public function destroy(string $id)
    {
        //
    }
}
