<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Course::create([
            'title' => 'Python Máster',
            'description' => 'Aprende los fundamentos de Python, desde variables hasta lógica de programación y manejo de datos.',
            'level' => 'Básico',
            'gradient' => 'from-yellow-400 to-blue-600',
            'tag' => 'PYTHON',
        ]);

        \App\Models\Course::create([
            'title' => 'Modern React',
            'description' => 'Domina Hooks, Context API y Redux para crear interfaces de usuario rápidas y escalables.',
            'level' => 'Intermedio',
            'gradient' => 'from-cyan-400 to-blue-700',
            'tag' => 'REACT',
        ]);

        \App\Models\Course::create([
            'title' => 'Laravel Pro',
            'description' => 'Aprende a construir aplicaciones robustas con Laravel, Eloquent ORM y autenticación segura.',
            'level' => 'Avanzado',
            'gradient' => 'from-red-500 to-red-800',
            'tag' => 'LARAVEL',
        ]);

        \App\Models\Course::create([
            'title' => 'Bases de Datos',
            'description' => 'Diseña y optimiza bases de datos relacionales usando SQL y buenas prácticas de normalización.',
            'level' => 'Básico',
            'gradient' => 'from-indigo-500 to-blue-900',
            'tag' => 'SQL',
        ]);

        \App\Models\Course::create([
            'title' => 'JS ES6+',
            'description' => 'Entiende la asincronía, prototipos y las últimas características del estándar ECMAScript.',
            'level' => 'Intermedio',
            'gradient' => 'from-yellow-300 to-yellow-600',
            'tag' => 'JAVASCRIPT',
        ]);

        \App\Models\Course::create([
            'title' => 'Docker & CI/CD',
            'description' => 'Automatiza despliegues y contenedores para desarrollar software de manera ágil y moderna.',
            'level' => 'Avanzado',
            'gradient' => 'from-green-500 to-teal-800',
            'tag' => 'DEVOPS',
        ]);
    }
}
