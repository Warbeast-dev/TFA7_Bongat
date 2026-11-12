<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            ['username' => 'msantos', 'full_name' => 'Maria Santos'],
            ['username' => 'jdelacruz', 'full_name' => 'Juan Dela Cruz'],
            ['username' => 'areyes', 'full_name' => 'Andrea Reyes'],
            ['username' => 'pgarcia', 'full_name' => 'Paolo Garcia'],
            ['username' => 'cmendoza', 'full_name' => 'Camille Mendoza'],
        ];
        foreach ($records as $record) {
            User::updateOrCreate(['username' => $record['username']], $record);
        }
    }
}
