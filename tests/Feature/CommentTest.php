<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Comment;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_page_loads()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /** @test */
    public function a_comment_can_be_added() {
        $this->withoutExceptionHandling();
        $response = $this->post('/api/comments', [
            "name" => "Someone Laykyu",
            "comment" => "It's suppose to be like you"
        ]);

        $response->assertOk();
        $this->assertCount(1, Comment::all());
    }

    /** @test */
    public function a_comment_field_is_required() {
        // $this->withoutExceptionHandling();

        $response = $this->post('/api/comments', [
            "name" => "",
            "comment" => "It's suppose to be like you"
        ]);

        $response->assertSessionHasErrors('name');

        $response = $this->post('/api/comments', [
            "name" => "Someone Laykyu",
            "comment" => ""
        ]);

        $response->assertSessionHasErrors('comment');
    }

    /** @test */
    public function comment_listing_returns() {
        $this->a_comment_can_be_added();

        $response = $this->get('/api/comments');

        $response->assertOk();

        $this->assertDatabaseHas('comments', [
            'name' => 'Someone Laykyu'
        ]);
    }
}
