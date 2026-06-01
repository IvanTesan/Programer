<?php

use App\Models\Course;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows guests to view the courses catalog', function () {
    $response = $this->get(route('products.index'));

    $response->assertStatus(200);
});

it('redirects guests to login when attempting to view course details', function () {
    $course = Course::create([
        'title' => 'Test Course',
        'description' => 'Test Description',
        'level' => 'Básico',
        'gradient' => 'from-blue-500 to-indigo-500',
        'tag' => 'JS',
    ]);

    $response = $this->get(route('products.show', $course->id));

    $response->assertRedirect(route('login'));
});

it('allows logged-in users to view course details', function () {
    $user = User::factory()->create();
    $course = Course::create([
        'title' => 'Test Course',
        'description' => 'Test Description',
        'level' => 'Básico',
        'gradient' => 'from-blue-500 to-indigo-500',
        'tag' => 'JS',
    ]);

    $response = $this->actingAs($user)->get(route('products.show', $course->id));

    $response->assertStatus(200);
});
