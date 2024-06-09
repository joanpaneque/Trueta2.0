<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Inertia\Inertia;

use App\Models\AuditLog;

class AuditLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $page = $request->input('page', 1);
        

        $auditLogs = AuditLog::orderBy('created_at', 'desc')
            ->paginate(10, ['*'], 'page', $page);


        return Inertia::render('AuditLogs/Index', [
            'auditLogs' => $auditLogs
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
        $auditLog = AuditLog::find($id);
        $referer = request()->header('referer');
        return Inertia::render('AuditLogs/Show', [
            'auditLog' => $auditLog,
            'referer' => $referer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
