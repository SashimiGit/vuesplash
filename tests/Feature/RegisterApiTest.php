<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class RegisterApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function should_新しいユーザーを作成(){
        $data = [
            'name' => 'vuesplash user',
            'email' => 'dummy@email.com',
            'password' => 'test1234',
            'password_confirmation' => 'test1234'
        ];

        $response = $this->json('POST', route('register'),$data);

        $user = User::first();
        $this->assertEquals($data['name'], $user->name);

        $response ->assertStatus(201)->assertJson(['name'=>$user->name]);
        

    }
}
