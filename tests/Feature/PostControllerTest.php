<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function ログインしていない場合は投稿一覧のURLにアクセスしてもログイン画面が表示される()
    {
        $response = $this->get(route('posts.index'));
        $response->assertRedirect('login');
    } 

    /** 
     * indexメソッド
     * 
     * @test */
    public function 投稿一覧のURLにアクセスして投稿一覧画面が表示される()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('posts.index'));
        $response->assertStatus(200)->assertViewIs('posts.index');
    }
    
    /** 
     * createメソッド
     * 
     * @test */
    public function 投稿作成のURLにアクセスして投稿画面が表示される()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('posts.create'));
        $response->assertStatus(200)->assertViewIs('posts.create');
    }

    /** 
     * storeメソッド
     * 
     * @test */
    public function データを投稿し保存する()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $post = Post::factory()->create([
            'user_id' => $user->id
        ]);
        $data = [
            'title'=>$post->title, 
            'image'=>$post->image, 
            'content'=>$post->content, 
            'user_id' => $post->user_id
        ];
        $response = $this->post(route('posts.store'), $data);
        $this->assertDatabaseHas('posts',[
            'title'=>$post->title, 
            'image'=>$post->image, 
            'content'=>$post->content,
            'user_id' => $post->user_id
        ]);
    }

    /**
     * showメソッド 
     * 
     * @test */
    public function 詳細画面のURLにアクセスして投稿の詳細画面が表示される()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);
        $response = $this->get(route('posts.show', $post->id));
        $response->assertStatus(200)->assertViewIs('posts.show');
    }

    /**
     * showメソッド
     * 
     *  @test */
    public function 存在しない投稿の詳細を表示させようとするとエラー画面が表示される()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get(route('posts.show', 1000000));
        $response->assertStatus(404);
    }

    /** 
     * showメソッド
     * 
     * @test */
    public function 詳細画面には特定の投稿が表示される()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);
        $post = Post::find($post->id);
        $response = $this->get(route('posts.show', $post->id));
        $response->assertViewHas('post', $post);
    }

    /** 
     * editメソッド
     * 
     * @test */
    public function 編集画面のURLにアクセスして投稿編集画面が表示される()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);
        $response = $this->get(route('posts.edit', $post->id));
        $response->assertStatus(200)->assertViewIs('posts.edit');
    }
    
    /** 
     * uploadメソッド
     * 
     * @test */
    public function データを更新した後は投稿の一覧画面に遷移する()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);
        $data = [
            'title'=>$post->title, 
            'image'=>$post->image, 
            'content'=>$post->content, 
            'user_id' => $post->user_id
        ];
        $response = $this->put(route('posts.update', $post->id), $data);
        $response->assertRedirect('posts');
    }

    /** 
     * destroyメソッド
     * 
     * @test */
    public function 投稿の削除処理完了後は投稿一覧画面に遷移する()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);
        $response = $this->delete(route('posts.destroy', $post->id));
        $response->assertRedirect('posts');
    }

}
