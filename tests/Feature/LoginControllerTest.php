<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function ログイン画面のURLにアクセスしてログイン画面が表示される()
    {
        $response = $this->get(route('login'));
        $response->assertStatus(200)->assertViewIs('auth.login');
    }

    /** @test */
    public function 登録したemailアドレスとパスワードでログインできる()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password'  => bcrypt('test1234')
        ]);
        $response = $this->post(route('login'), [
            'email'    => 'test@example.com',
            'password'  => 'test1234'
        ]);
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function 登録したのと違うメールアドレスではログインできない()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password'  => bcrypt('test1234')
        ]);
        $response = $this->post(route('login'), [
            'email'    => 'te@example.com',
            'password'  => 'test1234'
        ]);
        $this->assertGuest();
    }

    /** @test */
    public function 登録したのと違うパスワードではログインできない()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password'  => bcrypt('test1234')
        ]);
        $response = $this->post(route('login'), [
            'email'    => 'test@example.com',
            'password'  => 'test5678'
        ]);
        $this->assertGuest();
    }

    /** @test */
    public function ログアウトすると認証状態が解除される()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post(route('logout'));
        $this->assertGuest();
    }
}
