<?php
namespace Database\Seeders;
use App\Models\Customer;
use Illuminate\Database\Seeder;
class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            ['full_name' => 'Maria Santos', 'email' => 'maria.santos@example.com', 'phone' => '09170001001'],
            ['full_name' => 'Juan Dela Cruz', 'email' => 'juan.delacruz@example.com', 'phone' => '09170001002'],
            ['full_name' => 'Andrea Reyes', 'email' => 'andrea.reyes@example.com', 'phone' => '09170001003'],
            ['full_name' => 'Paolo Garcia', 'email' => 'paolo.garcia@example.com', 'phone' => '09170001004'],
            ['full_name' => 'Camille Mendoza', 'email' => 'camille.mendoza@example.com', 'phone' => '09170001005'],
        ];
        foreach ($records as $record) {
            Customer::updateOrCreate(['email' => $record['email']], $record);
        }
    }
}
