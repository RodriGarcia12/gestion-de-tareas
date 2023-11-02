<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => '1',
            'name' => 'Pedro',
            'email' => 'pedrito@gmail.com',
            'password' => Hash::make('password')
        ]);

       User::create([
            'id' => '2',
            'name' => 'Franco',
            'email' => 'franquito@gmail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'id' => '3',
            'name' => 'Rodrigo',
            'email' => 'rodri@gmail.com',
            'password' => Hash::make('1234')
        ]);

        Task::create([
            'id' => '1',
            'title' => 'Tarea con id 1',
            'body' => 'Cuerpo de la tarea con id 1 asignado a usuario 1',
            'author_id' => '3',
            'user-assigned_id' => '1'
        ]);
    }
}
