<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\SurgeriesController;

use Inertia\Inertia;

use App\Models\Surgery;
use App\Models\AuditLog;

class DashboardController extends Controller
{
    public function index()
    {
        $surgeries = Surgery::all();

        // AuditLog::create([
        //     'event' => 'Ha accedit al llistat de cirurgies',
        //     'user' => auth()->user(),
        //     'user_id' => auth()->id()
        // ]);

        return Inertia::render('Surgeries/Index', [
            'surgeries' => $surgeries
        ]);
    }
}
