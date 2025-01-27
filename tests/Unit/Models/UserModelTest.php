<?php

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('creates a salt when creating a new user', function () {
    $user = new User([
        'name' => 'Test',
        'email' => 'test@getinput.co',
    ]);

    $user->password = Hash::make('secret');
    $user->save();

    $this->assertNotNull($user->salt);
});
