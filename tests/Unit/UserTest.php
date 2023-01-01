<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_create_user(){
        $user = User::create([
            'name' => 'ahmad',
            'email' => 'ahmadbagusmasudi@gmail.com',
            'password' => 'password'
        ]);

        $this->assertTrue($user->email == 'ahmadbagusmasudi@gmail.com');
    }

    public function test_check_if_user_exist(){
        $this->assertDatabaseHas('users', [
            'email' => 'ahmadbagusmasudi@gmail.com'
        ]);
    }
}
