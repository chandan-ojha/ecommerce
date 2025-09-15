<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
                'title'       => 'Ball Pen',
                'description' => 'Ball pen for writing',
                'status'      => 1,
                'created_by'  => 1,
            ],
            [
                'title'       => 'Gel Pen',
                'description' => 'Smooth writing gel pen',
                'status'      => 1,
                'created_by'  => 1,
            ],
            [
                'title'       => 'Fountain Pen',
                'description' => 'Modern and premium fountain pen',
                'status'      => 1,
                'created_by'  => 1,
            ],
            [
                'title'       => 'Ink',
                'description' => 'Ink for fountain pens',
                'status'      => 1,
                'created_by'  => 1,
            ],
        ];
    }
}
