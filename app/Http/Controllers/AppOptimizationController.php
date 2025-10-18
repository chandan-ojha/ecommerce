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
        Artisan::call('migrate:status');
        $output = Artisan::output();

        if (strpos($output, 'No') !== false) {
            Artisan::call('migrate', ['--force' => true]);

            return response()->make(
                "Migrations run successfully!",
                200,
                ['Content-Type' => 'text/html']
            );
        }

        return response()->make(
            "Nothing to migrate.",
            200,
            ['Content-Type' => 'text/html']
        );
    }

}
