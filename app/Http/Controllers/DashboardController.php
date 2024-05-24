<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\SurgeriesController;

use Inertia\Inertia;

use App\Models\Surgery;

class DashboardController extends Controller
{
    public function index()
    {
        $surgeries = Surgery::all();

        return Inertia::render('Surgeries/Index', [
            'surgeries' => $surgeries
        ]);
    }
}
