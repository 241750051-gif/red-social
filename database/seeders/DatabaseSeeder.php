<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'Carlos Mendoza',
            'email' => 'carlos@example.com',
            'password' => Hash::make('password123'),
        ]);

        $user2 = User::create([
            'name' => 'Elena Rostova',
            'email' => 'elena@example.com',
            'password' => Hash::make('password123'),
        ]);

        Post::create([
            'user_id' => $user1->id,
            'content' => 'El diseño minimalista consiste en eliminar lo innecesario para destacar lo esencial.',
            'type' => 'pensamiento',
        ]);

        Post::create([
            'user_id' => $user2->id,
            'content' => 'Recordatorio: Revisar la arquitectura del sistema antes del despliegue en producción.',
            'type' => 'nota',
        ]);

        Post::create([
            'user_id' => $user1->id,
            'content' => 'Reflexión del día sobre la evolución de las aplicaciones web y la importancia del rendimiento.',
            'type' => 'texto_general',
        ]);
    }
}