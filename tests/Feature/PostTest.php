<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_NoBlogPostWhenDataBaseEmpty()
    {
        $response = $this->get('/posts');
        $response->assertSeeText('No posts found!');
    }

    public function test_OneBlogPost()
    {
        //Arange
        $post = new BlogPost();
        $post->title = 'New Test Title';
        $post->content = 'New Test Comment!';
        $post->save();

        // Act
        $response = $this->get('/posts');

        // Assert
        $response->assertSeeText('New Test Title');

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'New Test Title'
        ]);
    }
}
