<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;
   
    /** @test */
    public function ユーザー登録画面にアクセスしてユーザー登録画面が表示される()
    {
        $response = $this->get(route('register'));
        $response->assertStatus(200)->assertViewIs('auth.register');
    }

    /** @test */
    public function ユーザー登録に成功した後は投稿一覧画面が表示される()
    {
        $response = $this->post(route('register'), [
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => 'test1234',
            'password_confirmation' => 'test1234'
        ]);
        $response->assertRedirect(route('posts.index'));
    }
}
