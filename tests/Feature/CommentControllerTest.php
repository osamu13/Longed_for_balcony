<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class CommentControllerTest extends TestCase
{
    use RefreshDatabase;

    /** 
     * storeメソッド
     * 
     * @test */
    public function コメントを投稿し保存する()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $post = Post::factory()->create([
            'user_id'=>$user->id
        ]);
        $comment = Comment::factory()->create([
            'post_id'=>$post->id,
            'user_id'=>$user->id
        ]);
        $data = [
            'content'=>$comment->content, 
            'user_id'=>$comment->user_id,
            'post_id'=>$comment->post_id
        ];
        $response = $this->post(route('comments.store'), $data);
        $this->assertDatabaseHas('comments',[
            'content'=>$comment->content, 
            'user_id'=>$comment->user_id,
            'post_id'=>$comment->post_id
        ]);
    } 

    /** 
     * destroyメソッド
     * 
     * @test */
    public function コメントの削除処理完了後は投稿詳細画面に遷移する()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);
        $comment = Comment::factory()->create([
            'post_id'=>$post->id,
            'user_id'=>$user->id
        ]);
        $response = $this->delete(route('comments.destroy', $comment->id));
        $response->assertRedirect(route('posts.show', $comment->post_id));
    }
}
