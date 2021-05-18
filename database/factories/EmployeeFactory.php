<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $model->define(App\Models\Employee::class, function (Faker $faker) {
           
        // });

        return [
            'emp_name' => $this->faker->name,
            'salary'   => $this->faker->numberBetween($min = 5000, $max = 90000),
            'job_description'=> $this->faker->paragraph
        ];
    }
}
