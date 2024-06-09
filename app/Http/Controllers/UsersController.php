<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Inertia\Inertia;

use App\Models\User;

class UsersController extends Controller
{
    public function index() {
        $userRequests = User::where('request', true)->get();
        $userRegistrations = User::where('request', false)->where('registered', true)->where('deactivated', false)->get();
        $userDeactivations = User::where('request', false)->where('deactivated', true)->get();

        return Inertia::render('Users/Index', [
            'userRequests' => $userRequests,
            'userRegistrations' => $userRegistrations,
            'userDeactivations' => $userDeactivations
        ]);
    }

    public function register(string $id) {
        $user = User::find($id);
        $user->register();
        return redirect()->route('users.index');
    }

    public function deactivate(string $id) {
        $user = User::find($id);
        $user->deactivate();
        return redirect()->route('users.index');
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
