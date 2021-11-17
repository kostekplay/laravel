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

    public function testStoreValid()
    {
        $params = [
            'title' => 'Valid Title',
            'content' => 'Valid at lest 10 characters'
        ];

        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'),'The blog post was created!');
    }

    public function testStoreFail()
    {
        $params = [
            'title' => 'xyz',
            'content' => 'xyz',
        ];

        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');

        $messages = session('errors')->getMessages();
        // dd($messages->getMessages());

        $this->assertEquals($messages['title'][0], 'The title must be at least 5 characters.');
        $this->assertEquals($messages['content'][0], 'The content must be at least 10 characters.');
    }
}
