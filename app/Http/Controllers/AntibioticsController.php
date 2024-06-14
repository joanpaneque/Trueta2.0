<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Inertia\Inertia;

use App\Models\Antibiotic;
use App\Models\AuditLog;

class AntibioticsController extends Controller
{
    public function index()
    {
        $antibiotics = Antibiotic::all();

        return Inertia::render('Antibiotics/Index', [
            'antibiotics' => $antibiotics
        ]);
    }

    public function create()
    {
        return Inertia::render('Antibiotics/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $antibiotic = Antibiotic::create($request->all());

        AuditLog::create([
            'type' => 'create',
            'description' => 'Ha creat l\'antibiòtic ' . $antibiotic->name,
            'table_name' => 'antibiotics',
            'old_values' => null,
            'new_values' => $antibiotic,
            'user' => auth()->user(),
            'user_id' => auth()->id()
        ]);

        return redirect()->route('antibiotics.index');
    }

    public function show(string $id)
    {
        $referer = request()->header('referer');
        if (!$referer) {
            $referer = route('dashboard');
        }

        $antibiotic = Antibiotic::withTrashed()->find($id);

        return Inertia::render('Antibiotics/Show', [
            'antibiotic' => $antibiotic,
            'referer' => $referer
        ]);
    }

    public function edit(string $id)
    {
        $antibiotic = Antibiotic::withTrashed()->find($id);

        $referer = request()->header('referer');

        $deleted = $antibiotic->deleted_at ? true : false;



        return Inertia::render('Antibiotics/Edit', [
            'antibiotic' => $antibiotic,
            'deleted' => $deleted,
            'referer' => $referer
        ]);
    }

    public function update(Request $request, string $id)
    {
        $antibiotic = Antibiotic::withTrashed()->find($id);

        $old_values = $antibiotic->toArray();

        $antibiotic->update($request->all());

        AuditLog::create([
            'type' => 'update',
            'description' => 'Ha actualitzat l\'antibiòtic ' . $antibiotic->name,
            'table_name' => 'antibiotics',
            'old_values' => json_encode($old_values),
            'new_values' => $antibiotic,
            'user' => auth()->user(),
            'user_id' => auth()->id()
        ]);

        return redirect()->route('antibiotics.index');
    }

    public function destroy(string $id)
    {
        $antibiotic = Antibiotic::find($id);

        $old_values = $antibiotic->toArray();

        $antibiotic->delete();

        AuditLog::create([
            'type' => 'delete',
            'description' => 'Ha eliminat l\'antibiòtic ' . $antibiotic->name,
            'table_name' => 'antibiotics',
            'old_values' => json_encode($old_values),
            'new_values' => null,
            'user' => auth()->user(),
            'user_id' => auth()->id()
        ]);

        return redirect()->route('antibiotics.index');
    }
}
