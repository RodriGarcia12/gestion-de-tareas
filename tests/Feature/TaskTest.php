<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_ReadAllTasks()
    {
        $structure = [
            "*" => [
            "id",
            "title",
            "body",
            "author_id",
            "user_assigned_id",
            "created_at",
            "deleted_at",
            "updated_at"
            ]
        ];

        $response = $this->get('/api/v1/task');

        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonStructure($structure);

    }

    public function test_ReadOneTask()
    {
        $structure = [
            "id",
            "title",
            "body",
            "author_id",
            "user_assigned_id",
            "created_at",
            "deleted_at",
            "updated_at"
        ];

        $response = $this->get('/api/v1/task/1');

        $response->assertStatus(200);
        $response->assertJsonCount(8);
        $response->assertJsonStructure($structure);
        $response->assertJsonFragment([
            "id" => 1,
            "title" => "Tarea con id 1",
            "body" => "Cuerpo de la tarea con id 1 asignado a usuario 1",
            "author_id" => 3,
            "user_assigned_id" => 1
        ]);
    }

    public function test_CreateOneTaskWithoutAuth()
    {
        $structure = [
            "id",
            "title",
            "body",
            "author_id",
            "user_assigned_id",
            "created_at",
            "updated_at"
        ];

        $response = $this->post('/api/v1/task',[
            'title' => "tarea test",
            'body' => "Esta tarea fue creando con un test",
            'author_id' => 3,
            'user_assigned_id' => 1
        ]);

        $response->assertStatus(401);
        
    }

    public function test_UpdateOneTaskWithoutAuth()
    {
        $structure = [
            "id",
            "title",
            "body",
            "author_id",
            "user_assigned_id",
            "created_at",
            "updated_at"
        ];
        $response = $this->put('/api/v1/task/1',[
            'title' => "Tarea 1 modify",
            'body' => "Esta es la tarea 1 y fue modificada con tests",
            'author_id' => 1,
            'user_assigned_id' => 1
        ]);

        $response->assertStatus(401);
        $response->assertJsonCount(1);
    }

    public function test_DeleteOneTaskWithoutAuth()
    {
        $structure = [
            "message"
        ];

        $response = $this->delete('/api/v1/task/1');

        $response->assertStatus(401);
        $response->assertJsonCount(1);
        $response->assertJsonStructure($structure);
    }
}
