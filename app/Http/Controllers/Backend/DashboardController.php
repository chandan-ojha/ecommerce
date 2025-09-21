<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $user     = Auth::user();
        $roleName = $user->roles->first()->name ?? 'Unknown';

        return Inertia::render('Backend/Dashboard/Index', [
            'title' => 'Dashboard',
            'role'  => $roleName,
        ]);
    }
}
