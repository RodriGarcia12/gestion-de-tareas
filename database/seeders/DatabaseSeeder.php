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
        Task::create([
            'id' => '1',
            'title' => 'Tarea con id 1',
            'body' => 'Cuerpo de la tarea con id 1 asignado a usuario 1',
            'state' => 'Asignada',
            'author_id' => '3',
            'user_assigned_id' => '1'
        ]);
    }
}
