<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     use RefreshDatabase;

     public function setUp(): void{
         parent::setUp();

         $this->user = factory(User::class)->create();
     }

     /** @test */

     public function should_登録ユーザーを認証(){
         $response = $this->json('POST', route('login'),[
             'email'=>$this->user->email,
             'password'=> 'password',

         ]);

         $response
            ->assertStatus(200)
            ->assertJson(['name'=>$this->user->name]);

        $this->assertAuthenticatedAs($this->user);
     }

}
