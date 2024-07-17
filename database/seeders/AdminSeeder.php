<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@petiko.com',
            'password' => Hash::make('petiko123'),
            'is_admin' => true
        ]);


        $this->printConsoleMessage();
    }

    private function printConsoleMessage(): void
    {
        $message = "|----------------------------------|\n| E-mail: admin@petiko.com\n| Senha: petiko123\n|----------------------------------|";
        $this->command->getOutput()->writeln("<info>$message</info>");
    }
}
