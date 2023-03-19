<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Console\View\Components\TwoColumnDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
         'name' => 'Test User',
         'email' => 'test@test.com',
         'password' => Hash::make('asdfasdf')
        ]);

        $this->generateEmployees();

        if (isset($this->command)) {
            with(new TwoColumnDetail($this->command->getOutput()))->render(
                'Generate Bearer Token for testing API: ',
                '<fg=yellow;options=bold>' . $user?->createToken('testing')->plainTextToken . '</>'
            );
        }

    }

    public function generateEmployees()
    {
        for ($i = 10; $i > 0; $i--) {
            $employee = \App\Models\Employee::create([
                'full_name' => fake()->name(),
            ]);
            $this->generateWorkTimes($employee);
        }
    }

    public function generateWorkTimes($employee)
    {
        $random_float = function ($min,$max) {
            return round($min + lcg_value() * (abs($max - $min)), 2);
        };

        $date = \Carbon\Carbon::now();
        $date->subDay();
        for ($i = 30; $i > 0; $i--) {
            $workTime = \App\Models\WorkTime::create([
                'employee_id' => $employee->id,
                'status' => \App\Models\WorkTime::STATUS['stop'],
            ]);

            $workTime->value = $random_float(1,8);
            $workTime->created_at = $date;
            $workTime->updated_at = $date;
            $workTime->save();

            $date->subDay();
        }

        $random_float(1,8);
    }
}
