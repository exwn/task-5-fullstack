<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     */

    public function user_can_be_create_posts()
    {
        $this->withoutExceptionHandling();

        $user =  User::factory()->create();
        $category = Category::factory()->create();
        $post = Post::factory()->create();

        $this->actingAs($user, 'api')
            ->json('POST', '/api/v1/category', $category->toArray());
        $response = $this->actingAs($user, 'api')
            ->json('POST', '/api/v1/post', $post->toArray());

        $response->assertStatus(201);
        // dd($response);
    }

    /**
     * @test
     */

    public function user_can_be_list_all_posts()
    {
        // $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $response = $this->actingAs($user, 'api')
            ->json('GET', '/api/v1/post');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => []
        ]);
    }


    /**
     * @test
     */

    public function user_can_be_show_detail_posts()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $category = Category::factory()->create();
        $post = Post::factory()->create();

        $this->actingAs($user, 'api')
            ->json('POST', '/api/v1/category', $category->toArray());

        $postResponse = $this->actingAs($user, 'api')
            ->json('POST', '/api/v1/post', $post->toArray());

        $newPostId = $postResponse->json('data')['id'];
        $response = $this->actingAs($user, 'api')
            ->json('GET', '/api/v1/post/' . $newPostId);

        $response->assertStatus(200);
        // dd($post->json('data'));
        // dd(($response));
    }


    /**
     * @test
     */

    public function user_can_be_update_posts()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $category = Category::factory()->create();
        $post = Post::factory()->create();
        $payload = [
            "title" => "Percobaan update",
            "content" => "Content terupdate",
            "image" => "image.jpg",
            "category_id" => Category::all()->random()->id
        ];

        $this->actingAs($user, 'api')
            ->json('POST', '/api/v1/category', $category->toArray());

        $postResponse = $this->actingAs($user, 'api')
            ->json('POST', '/api/v1/post', $post->toArray());

        $newPostId = $postResponse->json('data')['id'];
        $response = $this->actingAs($user, 'api')
            ->json('PUT', '/api/v1/post/' . $newPostId, $payload);

        $response->assertStatus(201);
    }


    /**
     * @test
     */

    public function user_can_be_delete_posts()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $category = Category::factory()->create();
        $post = Post::factory()->create();

        $this->actingAs($user, 'api')
            ->json('POST', '/api/v1/category', $category->toArray());

        $postResponse = $this->actingAs($user, 'api')
            ->json('POST', '/api/v1/post', $post->toArray());

        $newPostId = $postResponse->json('data')['id'];
        $response = $this->actingAs($user, 'api')
            ->json('DELETE', '/api/v1/post/' . $newPostId);

        $response->assertStatus(200);
    }
}
