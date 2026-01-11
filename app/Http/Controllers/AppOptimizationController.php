<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class AppOptimizationController extends Controller
{
    public function optimize()
    {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');

        Artisan::call('config:cache');
        Artisan::call('route:cache');

        return response()->make(
            "Cache cleared<br>" .
            "View cleared<br>" .
            "Config cleared<br>" .
            "Routes cleared<br>" .
            "Config cached<br>" .
            "Routes cached<br>",
            200,
            ['Content-Type' => 'text/html']
        );
    }

    public function migrate()
    {
        Artisan::call('migrate', ['--force' => true]);

        return response()->make(
            "Migrations executed (only pending ones will run).",
            200,
            ['Content-Type' => 'text/html']
        );
    }

    public function storageLink()
    {
        Artisan::call('storage:link');

        return response()->make(
            "Storage link created successfully.",
            200,
            ['Content-Type' => 'text/html']
        );
    }

}
