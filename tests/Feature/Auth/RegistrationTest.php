<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'address' => 'Carrer Fictici 123',
        'birth_date' => '2000-01-01',
        'phone_number' => '600123456',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard'));
});