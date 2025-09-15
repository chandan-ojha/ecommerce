<?php
namespace Database\Seeders;

use App\Models\Common\PaymentMode;
use Database\Factories\Common\PaymentModeFactory;
use Illuminate\Database\Seeder;

class PaymentModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $factory = new PaymentModeFactory();

        foreach ($factory->definition() as $data) {
            PaymentMode::create($data);
        }
    }
}
