<?php
namespace Database\Factories\Common;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Common\PaymentMode>
 */
class PaymentModeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            [
                'pay_mode'   => 'Cash',
                'status'     => 1,
                'created_by' => 1,
            ],
            [
                'pay_mode'   => 'Bank',
                'status'     => 0,
                'created_by' => 2,
            ],
            [
                'pay_mode'   => 'bkash',
                'status'     => 1,
                'created_by' => 1,
            ],
            [
                'pay_mode'   => 'Nagad',
                'status'     => 1,
                'created_by' => 1,
            ],
        ];
    }
}
